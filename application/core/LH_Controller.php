<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LH_Controller extends CI_Controller
{
	public $scope;

    public function __construct()
    {
        parent::__construct();

        /*header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

        //$this->session->sess_destroy();

        $sess_array = $this->session->all_userdata();
        foreach($sess_array as $key =>$val)
        {
            if($key!='site_lang')
            {
                $this->session->unset_userdata($key);
            }
        }*/

        //redirect('/working' ,'refresh');

        


        
        $warning = $this->session->userdata('super_warning') + 1;
        $this->session->set_userdata('super_warning',$warning);
        $this->scope['super_warning'] = $warning;
        

        if($this->session->userdata('id_user'))
        {
            $user_info = $this->Auth_model->getUserNormalData($this->session->userdata('id_user'));
            $this->scope['user_info']['id_user'] = $this->session->userdata('id_user');
            $this->scope['user_info']['username'] = $this->session->userdata('username');
            $this->scope['user_info']['profile_image'] = $user_info->profile_image;
            $this->scope['user_info']['data'] = $user_info;
            $this->scope['user_info']['money'] = $this->Auth_model->getFullUserMoney($this->session->userdata('id_user'));

            $check = array(
               'ip' => $_SERVER['REMOTE_ADDR'],
               'reason' => "ID: ".$this->scope['user_info']['id_user']
            );

            $this->db->insert('admin_check',$check); 
        }

        if($this->session->flashdata('notification')) 
        {
            $this->scope['general_notification'] = $this->session->flashdata('notification');
        }

        $notification_list = $this->Auth_model->getUserNotifications($this->session->userdata('id_user'));

        if($notification_list) { $this->scope['user_notification'] = array_slice($notification_list, 0, 3); } else { $this->scope['user_notification'] = array(); }


        if($this->session->userdata('level') == 1 && $this->scope['user_info']['data']->level == 1)
        {
            $this->scope['admin'] = TRUE;
        }

        $this->form_validation->set_message('isNotUniqueMail', 'El email no existe');
        $this->form_validation->set_message('isUniqueMail', 'El email debe ser unico');
        $this->form_validation->set_message('isUniqueUsername', 'El usuario debe ser unico');
        $this->form_validation->set_message('isNotUniqueUsername', 'El usuario no existe');
        $this->form_validation->set_message('isConfirmed', 'No esta confirmado');
        $this->form_validation->set_message('notPaidUser', 'No realizo su pago en una mesa en el tiempo necesario');
        $this->form_validation->set_message('isConfirmedUser', 'Debe confirmar su email para poder entrar');
        $this->form_validation->set_message('isSuscribed', 'Esta suscrito');
    }

    public function setlang($lang = 'eng')
	{
        $back = $this->input->get('gob');

        if(!isset($back) || empty($back))
        {
            $back = site_url('home');
        }

        if($lang == 'english')
        {
            $this->session->set_userdata('site_lang','english');
        }

        if($lang == 'español')
        {
            $this->session->set_userdata('site_lang','español');
        }

        redirect($back ,'refresh');
	}

}

