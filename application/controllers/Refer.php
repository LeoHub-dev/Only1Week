<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Refer extends LH_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if($this->Auth_model->isLoggedIn())
		{
			$this->scope['head_title'] = 'Lista Referidos';
			$this->scope['page_title'] = 'Referidos';
			$this->scope['menu_active'] = 'dashboard';
			$this->scope['list_ref'] = $this->Auth_model->getReferred($this->session->userdata('id_user'));

			$this->load->view('Refered_view',$this->scope);
		}
		else
		{
			redirect('/signin' ,'refresh');
		}
	}

	public function logout()
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
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
		}

        redirect('/' ,'refresh');
        exit;
	}

}
