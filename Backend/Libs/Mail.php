<?php

namespace Bytecode\Opera\Libs;

class Mail {

    protected $user = 'DMHbird@freshdelmonte.com';
    protected $pass = 'XAR208sXm!g2i4&M';
    // protected $host = 'smtp.office365.com';
    // protected $port = '587';
     protected $host = '10.54.160.105';
    protected $port = '25';
    protected $transport;
    protected $mailer;
    protected $spoolerdir = './Cache/MailSpool';
    protected $spool;

    public function __construct() {
           $this->transport = new \Swift_SmtpTransport($this->host, $this->port);
            // $this->transport = \Swift_SmtpTransport::newInstance($this->host, $this->port); //, 'tls'
                // ->setUsername($this->user)
                // ->setPassword($this->pass); 
            // $this->spool = new \Swift_FileSpool($this->spoolerdir);
            // $this->transport = new \Swift_SpoolTransport($this->spool);
            $this->mailer = new \Swift_Mailer($this->transport);
    }

    public function CreateMessage($subject, $to, $body) {
        // DUMMY TEST
        // $to = "akamil@freshdelmonte.com";

        if (!is_array($to)) {
            $mto = array();
            $mto[] = $to;
        } else {
            $mto = $to;
        }


        $message = new \Swift_Message();

                // Give the message a subject
                $message->setSubject($subject)

                // Set the From address with an associative array
                ->setFrom(array('DMHbird@freshdelmonte.com' => 'Delmonte Portal'))

                // Set the To addresses with an associative array
                ->setTo($mto)

                // Give it a body
                ->setBody($body, 'text/html');
        return $message;
    }

    public function Send($message) {
		try{
			$result = $this->mailer->send($message);
			 return $result;
		}
		catch (\Swift_TransportException $e){
			throw $e;
		}
        return $result;
    }

    public function ProcessSpool() {
        // $transport = \Swift_SmtpTransport::newInstance($this->host, $this->port, 'tls')
        //         ->setUsername($this->user)
        //         ->setPassword($this->pass);
        $transport = new \Swift_SmtpTransport($this->host, $this->port);


        $spooled = $this->transport->getSpool();
		try{
			$spooled->flushQueue($transport);
		}
		catch (\Swift_TransportException $e){
			throw $e;
		}
    }

}
