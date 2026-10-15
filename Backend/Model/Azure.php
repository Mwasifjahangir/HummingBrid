<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bytecode\Opera\Model;

class Azure extends Model {

    private $request;
    private $provider;
    private $redirecturi = CONFIG['AZURE']['REDIRECTURI'];
    private $clientid = CONFIG['AZURE']['CLIENTID'];
    private $secret = CONFIG['AZURE']['SECRET'];
    private $authurl = CONFIG['AZURE']['AUTHURL'];
    private $tokenurl = CONFIG['AZURE']['TOKENURL'];
    private $scopes = CONFIG['AZURE']['SCOPES'];
    private $code;
    private $state;
    private $token;

    public function __construct() {
        parent::__construct();
        $this->request = new \GuzzleHttp\Client();
        $this->provider = new \League\OAuth2\Client\Provider\GenericProvider([
            'clientId' => $this->clientid,
            'clientSecret' => $this->secret,
            'redirectUri' => $this->redirecturi,
            'urlAuthorize' => $this->authurl,
            'urlAccessToken' => $this->tokenurl,
            'urlResourceOwnerDetails' => '',
            'scopes' => $this->scopes,
            'accessType' => 'offline',
            'domain_hint' => 'freshdelmonte.com'
        ]);
        echo "clientid: " . $this->clientid . ' &nbsp; ' . $this->secret;
    }

    public function GetAuthURL() {
        $authorizationUrl = $this->provider->getAuthorizationUrl(array('domain_hint' => 'freshdelmonte.com' ));
        //echo $authorizationUrl;
        return $authorizationUrl;
    }

    public function RefreshState() {
        $this->state = $this->provider->getState();
    }

    public function GetState() {
        return $this->state;
    }

    public function SetCode($code) {
        $this->code = $code;
    }

    public function SetRefreshToken($username) {
        $u = new \Bytecode\Opera\Model\User();
        $u->SetRefreshToken($username, $this->GetToken()->getRefreshToken());
    }

    public function RefreshPrimaryToken() {
        $this->token = $this->provider->getAccessToken('authorization_code', [
            'code' => $this->code
        ]);
    }

    /**
     * Get Access token using Refresh TOken
     */
    public function RefreshAccessToken($username) {
        $u = new \Bytecode\Opera\Model\User();
        $rt = $u->GetUserRefreshToken($username);
        $grant = new \League\OAuth2\Client\Grant\RefreshToken();
        $token = $this->provider->getAccessToken($grant, ['refresh_token' => $rt]);
        $this->token = $token;
    }

    public function GetToken() {
        return $this->token;
    }

    public function GetProfilePicture($username) {
        $this->RefreshAccessToken($username);
        return $this->Get('photo/$value', true);
    }

    public function Get($endpoint, $binary = false) {
        $curl = curl_init();
        //json_encode($body);
		$url = 'https://graph.microsoft.com/beta/me/' . $endpoint;
        curl_setopt_array(
                $curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            //   CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $this->GetToken(),
                'Content-Type: application/json;' .
                'odata.metadata=minimal;' .
                'odata.streaming=true'
            ),
            /* CURLOPT_POSTFIELDS => $body, */
            CURLOPT_FAILONERROR => false
                )
        );

        // The following curl options can be used in development to debug the code.
        // Option to disable certificate verification. Do not use on production env.
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // Option to set a proxy for curl to use.
        // Useful if you want to review traffic with a tool like Fiddler.
        // curl_setopt($curl, CURLOPT_PROXY, '127.0.0.1:8888');
        // Send the request & save response to a variable
        $response = curl_exec($curl);
        $info = curl_getinfo($curl);
        //var_dump(json_decode($response));
        // Check for errors
        if (curl_errno($curl)) {
            throw new \RuntimeException(curl_error($curl));
        }
        // Check for errors
        if ($info['http_code'] >= 400) {
            $response = json_decode($response, true);
			var_dump($response);
			var_dump($curl);
			
            $message = $info['http_code'] . ": " . curl_error($curl);
            throw new \RuntimeException($message);
            //var_dump($response);
        }

        // Close request and clear some resources
        curl_close($curl);
        if ($binary == true) {
            $ret = $response;
        } else {
            $ret = json_decode($response);
        }

        return $ret;
    }

}
