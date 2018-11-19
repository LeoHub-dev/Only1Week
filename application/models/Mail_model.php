<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail_model extends CI_Model {

	public $to;
    public $from = "support@only1week.es";
    public $from_name = "Only1Week - Soporte";
	public $subject;
    public $message;

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
        

        $config = Array(   
            'protocol' => 'smtp',
            'smtp_host' => 'mail.only1week.es',
            'smtp_port' => 25,
            'smtp_user' => 'support@only1week.es',
            'smtp_pass' => 'only1week123',
            'smtp_timeout' => '30', //in seconds 
            'smtp_keepalive' => true,  
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );

        /*$config = Array(      
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );*/
        
        $this->load->library('email',$config);


        
	}

	/**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function setTo($email)
    {
        $this->to = $email;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }


	public function sendMail_None($type = "general")
	{

        $this->email->from($this->from, $this->from_name);
        $this->email->to($this->to);

        if($type == "general")
        {
            $this->email->subject($this->subject);
            $message_html = $this->load->view('mails/general_mail_format',$this->message,TRUE);
            $this->email->message($message_html);
        }

        if($type == "emailconfirm")
        {
            $this->email->subject($this->subject);
            $message_html = $this->load->view('mails/confirm_mail_format',$this->message,TRUE);
            $this->email->message($message_html);
        }

        if($type == "button")
        {
            $this->email->subject($this->subject);
            $message_html = $this->load->view('mails/button_mail_format',$this->message,TRUE);
            $this->email->message($message_html);
        }

        if($this->email->send())
        {
            return TRUE;
        }

        return FALSE;
        
        
	}

    public function sendMail($type = "general")
    {
        return;
    }

}
?>