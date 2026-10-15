<?php

require_once 'boot.php';
//PRINT_R($_SESSION);
$azure = new \Bytecode\Opera\Model\Azure();
$user = new Bytecode\Opera\Model\User();
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !isset($_GET['code'])) {
    $authorizationUrl = $azure->GetAuthURL();
    // The OAuth library automaticaly generates a state value that we can
    // validate later. We just save it for now.
    $azure->RefreshState();
    $_SESSION['state'] = $azure->GetState();
    header('Location: ' . $authorizationUrl);
    //  echo $authorizationUrl;
    exit();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['code'])) {
    // Validate the OAuth state parameter
    if (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['state'])) {
        unset($_SESSION['state']);
        exit('State value does not match the one initially sent');
    }
    // With the authorization code, we can retrieve access tokens and other data.
    try {
        // Get an access token using the authorization code grant
        $azure->SetCode($_GET['code']);
        $azure->RefreshPrimaryToken();
        $accessToken = $azure->GetToken();
        // echo $accessToken;
        // The id token is a JWT token that contains information about the user
        // It's a base64 coded string that has a header, payload and signature
        $idToken = $accessToken->getValues()['id_token'];

        $decodedAccessTokenPayload = base64_decode(
                explode('.', $idToken)[1]
        );
        $jsonAccessTokenPayload = json_decode($decodedAccessTokenPayload, true);
        // The following user properties are needed in the next page

        $username = explode("@", $jsonAccessTokenPayload['preferred_username']);
        $u = $user->GetUserByUN($username[0]);
        // Check in Database if user exist
        if ($u != NULL ) { //&& count($u) > 0
            
            $_SESSION['access_token'] = $accessToken->getToken();
            $_SESSION['preferred_username'] = $jsonAccessTokenPayload['preferred_username'];
            $_SESSION['given_name'] = $jsonAccessTokenPayload['name'];
            $reftoken = $azure->GetToken()->getRefreshToken();
            $azure->SetRefreshToken($username[0]);
            $_SESSION['refresh_token'] = $reftoken;
            $_SESSION['user'] = array(
                "UserID" => $u->UserID,
                "DisplayName" => $u->DisplayName,
                "Username" => $u->Username,
                "Title" => $u->Title,
                "Department" => $u->Department,
                'given_name' => $jsonAccessTokenPayload['name']
                    
                    );
            isset ($_SESSION['LastURI']) ? header("Location:https://".$_SESSION['LastURI']) : header("Location:index.php?");
            
        }

        //$azure->Get();
        //header('Location: sendmail.php');
        //print_r($_SESSION);
        exit();
    } catch (League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
        echo 'Something went wrong, couldn\'t get tokens: ' . $e->getMessage();
    }
}


