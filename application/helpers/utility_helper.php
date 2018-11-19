<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function asset_url()
{
   return base_url().'assets/';
}

function myHash($value)
{
    $hashed_value = sha1(md5(md5(sha1($value."leohub923")))); 
    return $hashed_value;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function response_good($response_title, $response_text, $extra = array())
{
	echo json_encode(array('response' => true, 'response_title' => $response_title, 'response_text' => $response_text) + $extra);
}

function response_bad($errors)
{
	echo json_encode(array('response' => false, 'errors' => $errors));
}

function getUserName($id)
{
    $CI =& get_instance();
    $CI->db->select('username');
    $CI->db->where('id_user',$id);
    $query = $CI->db->get('auth_users',1);

    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row)
        {
            echo $row->username;
        }
    }
    else
    {
        echo 'No encontrado';
    }      
}

?>