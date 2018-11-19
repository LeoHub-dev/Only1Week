<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends LH_Controller {

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
			$this->scope['head_title'] = 'Inicio';
			$this->scope['page_title'] = 'Inicio';
			$this->scope['menu_active'] = 'dashboard';
			$this->scope['n_ref'] = $this->Auth_model->getNumberReferred($this->session->userdata('id_user'));

			$this->scope['list_one_inactive'] = $this->Table_model->getTablePublicList(1);
			$this->scope['list_two_inactive'] = $this->Table_model->getTablePublicList(2);


			$cycles_list = $this->Table_model->getActiveCycle($this->scope['user_info']['id_user']);
			$cycles_info = NULL;
			$count = 0;
			if($cycles_list)
			{
				foreach ($cycles_list as $cycle) 
				{
					$cycles_info[$count]['cycle'] = $cycle;
					foreach ($cycle as $var => $value) 
					{
						if($var == 'id_cycle' || $var == 'cycle_user' || $var == 'cycle_active')
	                    {
	                      continue;
	                    }

	                    if($value == NULL)
	                    {
	                    	continue;
	                    }

	                    $last_step = $var;
	                    $last_table = $value;


	                }

	                if($last_step == 'table_1')
	                {
	                	$cycles_info[$count]['table_type'] = 1;
                	 	$cycles_info[$count]['table_data'] = $this->Table_model->getTable(1,$last_table);

	                }
	                else if($last_step == 'table_3')
	                {
	                	$cycles_info[$count]['table_type'] = 2;
                	 	$cycles_info[$count]['table_data'] = $this->Table_model->getTable(2,$last_table);
	                }

	                $count++;
	            }
	        }

	        $this->scope['cycles_active'] = $cycles_info;

			$this->load->view('Dashboard_view',$this->scope);
		}
		else
		{
			redirect('/signin' ,'refresh');
		}
	}

	public function clearnotification()
	{
		if($this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				$actual_user = $this->session->userdata('id_user');
				$id_notification = $this->input->post('nid');


				if($this->Auth_model->clearNotification($actual_user,$id_notification))
				{
					response_good('Notificacion vista','Notificacion vista');
				}
				else
				{
					response_bad('Sin acceso');
				}
			}
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
