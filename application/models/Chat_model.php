<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat_model extends CI_Model {

    public $from;
    public $message;

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
        
	}

    public function setFrom($from)
    {
        $this->from = $from;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function sendMessage()
    {
        $data = array(
           'message' => $this->message,
           'from_msg' => $this->from,
           'datetime' => date('Y-m-d H:i:s')
        );

        $query = $this->db->insert('chat',$data); 
        return TRUE;
    }

    public function getChat()
    {
        $this->db->select('username, id_user, from_msg, chat.datetime, message');
        $this->db->join('auth_users', 'auth_users.id_user = chat.from_msg', 'left');

        $query = $this->db->get('chat');

        $chat = NULL;

        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $chat[] = $row;
            }
        }

        return $chat;


    }

}
?>