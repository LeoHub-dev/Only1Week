<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tables extends LH_Controller {

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
			$this->scope['head_title'] = 'Mesas Activas';
			$this->scope['page_title'] = 'Mesas Activas';
			$this->scope['menu_active'] = 'tables';
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

	                    if($var == 'table_1')
	                    {
	                    	$table_data = $this->Table_model->getTable(1,$value);
	                    	$cycles_info[$count]['step1']['table_father'] = $this->Auth_model->getUserNormalData($table_data->tb1_father);
	                    	$cycles_info[$count]['step1']['table_child_1'] = $this->Auth_model->getUserNormalData($table_data->tb1_child_1);
	                    	$cycles_info[$count]['step1']['table_child_1_status'] = $table_data->tb1_child_1_active;
	                    	$cycles_info[$count]['step1']['table_child_2'] = $this->Auth_model->getUserNormalData($table_data->tb1_child_2);
	                    	$cycles_info[$count]['step1']['table_child_2_status'] = $table_data->tb1_child_2_active;
	                    	$cycles_info[$count]['step1']['table_child_3'] = $this->Auth_model->getUserNormalData($table_data->tb1_child_3);
	                    	$cycles_info[$count]['step1']['table_child_3_status'] = $table_data->tb1_child_3_active;
	                    	$cycles_info[$count]['step1']['table_id'] = $table_data->id_table_one;

	                    }
	                    if($var == 'table_2')
	                    {
	                    	$table_data = $this->Table_model->getTable(1,$value);
	                    	$cycles_info[$count]['step2']['table_father'] = $this->Auth_model->getUserNormalData($table_data->tb1_father);
	                    	$cycles_info[$count]['step2']['table_child_1'] = $this->Auth_model->getUserNormalData($table_data->tb1_child_1);
	                    	$cycles_info[$count]['step2']['table_child_1_status'] = $table_data->tb1_child_1_active;
	                    	$cycles_info[$count]['step2']['table_child_2'] = $this->Auth_model->getUserNormalData($table_data->tb1_child_2);
	                    	$cycles_info[$count]['step2']['table_child_2_status'] = $table_data->tb1_child_2_active;
	                    	$cycles_info[$count]['step2']['table_child_3'] = $this->Auth_model->getUserNormalData($table_data->tb1_child_3);
	                    	$cycles_info[$count]['step2']['table_child_3_status'] = $table_data->tb1_child_3_active;
	                    	$cycles_info[$count]['step2']['table_id'] = $table_data->id_table_one;
	                    }
	                    if($var == 'table_3')
	                    {
	                    	$table_data = $this->Table_model->getTable(2,$value);
	                    	$cycles_info[$count]['step3']['table_father'] = $this->Auth_model->getUserNormalData($table_data->tb2_father);
	                    	$cycles_info[$count]['step3']['table_child_1'] = $this->Auth_model->getUserNormalData($table_data->tb2_child_1);
	                    	$cycles_info[$count]['step3']['table_child_1_status'] = $table_data->tb2_child_1_active;
	                    	$cycles_info[$count]['step3']['table_child_2'] = $this->Auth_model->getUserNormalData($table_data->tb2_child_2);
	                    	$cycles_info[$count]['step3']['table_child_2_status'] = $table_data->tb2_child_2_active;
	                    	$cycles_info[$count]['step3']['table_id'] = $table_data->id_table_two;
	                    }
	                    if($var == 'table_4')
	                    {
	                    	$table_data = $this->Table_model->getTable(2,$value);
	                    	$cycles_info[$count]['step4']['table_father'] = $this->Auth_model->getUserNormalData($table_data->tb2_father);
	                    	$cycles_info[$count]['step4']['table_child_1'] = $this->Auth_model->getUserNormalData($table_data->tb2_child_1);
	                    	$cycles_info[$count]['step4']['table_child_1_status'] = $table_data->tb2_child_1_active;
	                    	$cycles_info[$count]['step4']['table_child_2'] = $this->Auth_model->getUserNormalData($table_data->tb2_child_2);
	                    	$cycles_info[$count]['step4']['table_child_2_status'] = $table_data->tb2_child_2_active;
	                    	$cycles_info[$count]['step4']['table_id'] = $table_data->id_table_two;
	                    }
					}
					$count++;
				}
			}
			$this->scope['list_of_cycles'] = $cycles_info;
			$this->load->view('Tables_active_view',$this->scope);
		}
		else
		{
			redirect('/signin' ,'refresh');
		}
	}

	public function history()
	{
		if($this->Auth_model->isLoggedIn())
		{
			$this->scope['head_title'] = 'Mesas Inactivas';
			$this->scope['page_title'] = 'Mesas Inactivas';
			$this->scope['menu_active'] = 'tables';
			$cycles_list = $this->Table_model->getInactiveCycle($this->scope['user_info']['id_user']);
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

	                    if($var == 'table_1')
	                    {
	                    	$table_data = $this->Table_model->getTable(1,$value);
	                    	$cycles_info[$count]['step1']['table_father'] = $this->Auth_model->getUserNormalData($table_data->tb1_father);
	                    	$cycles_info[$count]['step1']['table_child_1'] = $this->Auth_model->getUserNormalData($table_data->tb1_child_1);
	                    	$cycles_info[$count]['step1']['table_child_1_status'] = $table_data->tb1_child_1_active;
	                    	$cycles_info[$count]['step1']['table_child_2'] = $this->Auth_model->getUserNormalData($table_data->tb1_child_2);
	                    	$cycles_info[$count]['step1']['table_child_2_status'] = $table_data->tb1_child_2_active;
	                    	$cycles_info[$count]['step1']['table_child_3'] = $this->Auth_model->getUserNormalData($table_data->tb1_child_3);
	                    	$cycles_info[$count]['step1']['table_child_3_status'] = $table_data->tb1_child_3_active;
	                    	$cycles_info[$count]['step1']['table_id'] = $table_data->id_table_one;

	                    }
	                    if($var == 'table_2')
	                    {
	                    	$table_data = $this->Table_model->getTable(1,$value);
	                    	$cycles_info[$count]['step2']['table_father'] = $this->Auth_model->getUserNormalData($table_data->tb1_father);
	                    	$cycles_info[$count]['step2']['table_child_1'] = $this->Auth_model->getUserNormalData($table_data->tb1_child_1);
	                    	$cycles_info[$count]['step2']['table_child_1_status'] = $table_data->tb1_child_1_active;
	                    	$cycles_info[$count]['step2']['table_child_2'] = $this->Auth_model->getUserNormalData($table_data->tb1_child_2);
	                    	$cycles_info[$count]['step2']['table_child_2_status'] = $table_data->tb1_child_2_active;
	                    	$cycles_info[$count]['step2']['table_child_3'] = $this->Auth_model->getUserNormalData($table_data->tb1_child_3);
	                    	$cycles_info[$count]['step2']['table_child_3_status'] = $table_data->tb1_child_3_active;
	                    	$cycles_info[$count]['step2']['table_id'] = $table_data->id_table_one;
	                    }
	                    if($var == 'table_3')
	                    {
	                    	$table_data = $this->Table_model->getTable(2,$value);
	                    	$cycles_info[$count]['step3']['table_father'] = $this->Auth_model->getUserNormalData($table_data->tb2_father);
	                    	$cycles_info[$count]['step3']['table_child_1'] = $this->Auth_model->getUserNormalData($table_data->tb2_child_1);
	                    	$cycles_info[$count]['step3']['table_child_1_status'] = $table_data->tb2_child_1_active;
	                    	$cycles_info[$count]['step3']['table_child_2'] = $this->Auth_model->getUserNormalData($table_data->tb2_child_2);
	                    	$cycles_info[$count]['step3']['table_child_2_status'] = $table_data->tb2_child_2_active;
	                    	$cycles_info[$count]['step3']['table_id'] = $table_data->id_table_two;
	                    }
	                    if($var == 'table_4')
	                    {
	                    	$table_data = $this->Table_model->getTable(2,$value);
	                    	$cycles_info[$count]['step4']['table_father'] = $this->Auth_model->getUserNormalData($table_data->tb2_father);
	                    	$cycles_info[$count]['step4']['table_child_1'] = $this->Auth_model->getUserNormalData($table_data->tb2_child_1);
	                    	$cycles_info[$count]['step4']['table_child_1_status'] = $table_data->tb2_child_1_active;
	                    	$cycles_info[$count]['step4']['table_child_2'] = $this->Auth_model->getUserNormalData($table_data->tb2_child_2);
	                    	$cycles_info[$count]['step4']['table_child_2_status'] = $table_data->tb2_child_2_active;
	                    	$cycles_info[$count]['step4']['table_id'] = $table_data->id_table_two;
	                    }
					}
					$count++;
				}
			}
			$this->scope['list_of_cycles'] = $cycles_info;
			$this->load->view('Tables_inactive_view',$this->scope);
		}
		else
		{
			redirect('/signin' ,'refresh');
		}
	}

	public function datauser()
	{
		if($this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				$actual_user = $this->scope['user_info']['id_user'];
				$user_to_check = $this->input->post('uid');
				$table_id = $this->input->post('tid');
				$table_type = $this->input->post('ttype');

				if($this->Table_model->ifBothExistInTable($actual_user,$user_to_check,$table_id,$table_type))
				{
					response_good(false,false,array('user_info' => $this->Auth_model->getUserNormalData($user_to_check)));
				}
				else
				{
					response_bad('Sin acceso');
				}
			}
		}
	}

	public function activeuser()
	{
		if($this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				$actual_user = $this->scope['user_info']['id_user'];
				$user_to_check = $this->input->post('uid');
				$table_id = $this->input->post('tid');
				$table_type = $this->input->post('ttype');

				if($this->Table_model->activeTableUser($actual_user,$user_to_check,$table_id,$table_type))
				{
					response_good('Usuario activado','El usuario ha sido activado');
					
					if($this->Table_model->ifTableIsActive($table_id,$table_type))
					{
						$this->Table_model->autoSortUsers();
					}
				}
				else
				{
					response_bad('Sin acceso');
				}
			}
		}
	}

}
