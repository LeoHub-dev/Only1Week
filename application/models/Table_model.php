<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table_model extends CI_Model {

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

    public function autoSortUsers()
    {
        $this->db->select('*');
        $this->db->order_by('n_order', 'ASC');
        $this->db->order_by('id_user', 'ASC');

        $this->db->where('active',1);

        $query_users = $this->db->get('auth_users'); //Todos los usuarios

        if($query_users->num_rows() > 0)
        {
            foreach ($query_users->result() as $user)
            {
                set_time_limit(50);
                ini_set('max_execution_time', 50);

                $this->db->where('cycle_user',$user->id_user);

                $query_cycle = $this->db->get('cycle'); //Ciclos de X usuario

                $n_cycles_active = 0;
                $n_cycles_inactive = 0;
                $list_cycles_inactive = NULL;
                $list_cycles_active = NULL;

                if($query_cycle->num_rows() > 0)
                {
                    foreach ($query_cycle->result() as $cycle)
                    {
                        if($cycle->cycle_active == 0)
                        {
                            $n_cycles_inactive++;

                            $list_cycles_inactive[] = $cycle;
                        }
                        else if($cycle->cycle_active == 1)
                        {
                            $n_cycles_active++;

                            $list_cycles_active[] = $cycle;
                        }
                    }//End cycle foreach

                    if($n_cycles_active >= 3)
                    {
                        $max_cycle_inactive = 4;
                    }
                    else if($n_cycles_active == 1 || $n_cycles_active == 2)
                    {
                        $max_cycle_inactive = 2;
                    }
                    else
                    {
                        $max_cycle_inactive = 1;
                    }

                    if($n_cycles_inactive == 0)
                    {
                        if(!$this->ifDonationPaid($user->id_user))
                        {
                            break;
                        }

                    

                        $this->db->where('tb1_active',0);

                        $query_tableone = $this->db->get('table_one');

                        if($query_tableone->num_rows() > 0)
                        {
                            foreach ($query_tableone->result() as $table_one)
                            {
                                $id_table_one = $table_one->id_table_one;
                                $table_father = $this->Auth_model->getUserNormalData($table_one->tb1_father);

                                foreach ($table_one as $var => $value) 
                                {
                                    if($var == 'id_table_one' || $var == 'tb1_father')
                                    {
                                        continue;
                                    }

                                    if($value == NULL)
                                    {
         
                                        $this->db->where('id_table_one', $id_table_one);
                                        $query_insertusertotable = $this->db->update('table_one', array($var => $user->id_user));

                                        if($query_insertusertotable)
                                        {


                                            $data_cycle = array(
                                               'cycle_user' => $user->id_user,
                                               'table_1' => $id_table_one
                                            );

                                            $query_newcycle = $this->db->insert('cycle',$data_cycle); 

                                            if($query_newcycle)
                                            {
                                                $this->plusCycleCounter($user->id_user);
                                                break 2;
                                            }
                                        }
                                    }//Check if empty space
                                }//End table one check free space
                            }//End table one foreach
                        }//End tableone query     
                    }


                    /*while($n_cycles_inactive < $max_cycle_inactive) //Revisar ciclos actuales
                    {

                        if(!$this->ifDonationPaid($user->id_user))
                        {
                            break;
                        }

                    

                        $this->db->where('tb1_active',0);

                        $query_tableone = $this->db->get('table_one');

                        if($query_tableone->num_rows() > 0)
                        {
                            foreach ($query_tableone->result() as $table_one)
                            {
                                $id_table_one = $table_one->id_table_one;
                                $table_father = $this->Auth_model->getUserNormalData($table_one->tb1_father);

                                foreach ($table_one as $var => $value) 
                                {
                                    if($var == 'id_table_one' || $var == 'tb1_father')
                                    {
                                        continue;
                                    }

                                    if($value == NULL)
                                    {
         
                                        $this->db->where('id_table_one', $id_table_one);
                                        $query_insertusertotable = $this->db->update('table_one', array($var => $user->id_user,$var.'_active' => 1));

                                        if($query_insertusertotable)
                                        {
                                            
                                            

                                            $data_mail = array( 
                                            "text" => '<p>Has ingresado a una mesa</p> <p>Donde el padre es : '.$table_father->username.' </p>'
                                            );

                                            $this->load->model('Mail_model');
                                            $this->Mail_model->setTo($user->email);
                                            $this->Mail_model->setSubject('Ingreso a nueva mesa');
                                            $this->Mail_model->setMessage($data_mail);
                                            $this->Mail_model->sendMail();
                                            

                                            $data_cycle = array(
                                               'cycle_user' => $user->id_user,
                                               'table_1' => $id_table_one
                                            );

                                            $query_newcycle = $this->db->insert('cycle',$data_cycle); 

                                            if($query_newcycle)
                                            {
                                                $this->Auth_model->removeMoney($user->id_user,$table_one->tb1_father,0.03,'Se ha creado una nueva cuenta');
                                                $this->Auth_model->addMoney($user->id_user,$table_one->tb1_father,0.03,'Un usuario te ha realizado una donacion');

                                                $this->plusCycleCounter($user->id_user); //Aqui esta poniendo donation = 1

                                                $n_cycles_inactive++;
                                                break 2;
                                            }
                                        }
                                    }//Check if empty space
                                }//End table one check free space
                            }//End table one foreach
                            $n_cycles_inactive++;
                        }//End tableone query 
                        else{
                            
                            break;
                        }  

                        
                    }*/


                    if(isset($list_cycles_inactive))
                    {
                        foreach ($list_cycles_inactive as $list_cycle_get) 
                        {
                            $step = 0;
                            foreach ($list_cycle_get as $var => $value)
                            {
                            
                                if($var == 'id_cycle')
                                {
                                    $id_actual_cycle = $value;
                                }
                                if($step == 0)
                                {
                                    if($var == 'table_1')
                                    {
                                        if($value == NULL)
                                        {
                                            $this->db->where('tb1_active',0);

                                            $query_tableone = $this->db->get('table_one');

                                            if($query_tableone->num_rows() > 0)
                                            {
                                                foreach ($query_tableone->result() as $table_one)
                                                {
                                                    $id_table_one = $table_one->id_table_one;
                                                    $table_father = $this->Auth_model->getUserNormalData($table_one->tb1_father);

                                                    foreach ($table_one as $var => $value) 
                                                    {
                                                        if($var == 'id_table_one' || $var == 'tb1_father')
                                                        {
                                                            continue;
                                                        }

                                                        if($value == NULL)
                                                        {
                             
                                                            $this->db->where('id_table_one', $id_table_one);
                                                            $query_insertusertotable = $this->db->update('table_one', array($var => $user->id_user));

                                                            if($query_insertusertotable)
                                                            {
                                                                /*$data_mail = array( 
                                                                "text" => '<p>Has ingresado a una mesa</p> <p>Debes enviar 0,03 Btc a esta direccion :</p> <p>'.$table_father->bitcoin_wallet.'</p> <p> Esta sera verificada por el usuario : '.$table_father->username.' </p>'
                                                                );
                                                                $this->load->model('Mail_model');
                                                                $this->Mail_model->setTo($user->email);
                                                                $this->Mail_model->setSubject('Ingreso a nueva mesa');
                                                                $this->Mail_model->setMessage($data_mail);
                                                                $this->Mail_model->sendMail();*/

                                                                $data_mail = array( 
                                                                "text" => '<p>Has ingresado a una mesa</p> <p>Donde el padre es : '.$table_father->username.' </p>'
                                                                );
                                                                $this->load->model('Mail_model');
                                                                $this->Mail_model->setTo($user->email);
                                                                $this->Mail_model->setSubject('Ingreso a nueva mesa');
                                                                $this->Mail_model->setMessage($data_mail);
                                                                $this->Mail_model->sendMail();



                                                                $this->db->where('id_cycle', $id_actual_cycle);
                                                                $query_inserttabletocycle = $this->db->update('cycle', array('table_1' => $id_table_one));

                                                                break 2;
                                                            }
                                                        }//Check if empty space
                                                    }//End table one check free space
                                                }//End table one foreach
                                            }//End tableone query    
                                        }
                                        else if($this->ifTablePaid(1,$value))
                                        {
                                            $step = 1;
                                            continue;
                                        }
                                        else
                                        {
                                            $this->Table_model->ifTableIsActive($value,1);
                                        }
                                    }
                                }
                                if($step == 1)
                                {
                                    if($var == 'table_2')
                                    {
                                        if($value == NULL)
                                        {
                                            $data_table = array(
                                               'tb1_father' => $user->id_user
                                            );

                                            $query_newtable = $this->db->insert('table_one',$data_table); 
                                            $table_id = $this->db->insert_id();

                                            if($query_newtable)
                                            {

                                                $this->db->where('id_cycle', $id_actual_cycle);
                                                $query_inserttabletocycle = $this->db->update('cycle', array('table_2' => $table_id));

                                                continue;
                                            }
                                        }
                                        else if($this->ifTablePaid(1,$value))
                                        {
                                            $step = 2;
                                            continue;
                                        }
                                        else
                                        {
                                            $this->Table_model->ifTableIsActive($value,1);
                                        }
                                    }
                                }
                                if($step == 2)
                                {
                                    if($var == 'table_3')
                                    {
                                        if($value == NULL)
                                        {
                                            $this->db->where('tb2_active',0);

                                            $query_tabletwo = $this->db->get('table_two');

                                            if($query_tabletwo->num_rows() > 0)
                                            {
                                                foreach ($query_tabletwo->result() as $table_two)
                                                {
                                                    $id_table_two = $table_two->id_table_two;
                                                    $table_father = $this->Auth_model->getUserNormalData($table_two->tb2_father);

                                                    foreach ($table_two as $var => $value) 
                                                    {
                                                        if($var == 'id_table_two' || $var == 'tb2_father')
                                                        {
                                                            continue;
                                                        }

                                                        if($value == NULL)
                                                        {

                                                            /*$this->load->model('Mail_model');
                                                            $this->Mail_model->setTo($user->email);

                                                            $data_mail = array( 
                                                            "text" => '<p>Has ingresado a una mesa</p> <p>Debes enviar 0,09 Btc a esta direccion :</p> <p>'.$table_father->bitcoin_wallet.'</p> <p> Esta sera verificada por el usuario : '.$table_father->username.' </p>'
                                                            );

                                                            $this->Mail_model->setSubject('Ingreso a nueva mesa');
                                                            $this->Mail_model->setMessage($data_mail);
                                                            $this->Mail_model->sendMail();*/

                                                            $this->load->model('Mail_model');
                                                            $this->Mail_model->setTo($user->email);

                                                            $data_mail = array( 
                                                            "text" => '<p>Has ingresado a una mesa</p> <p>Donde el padre es : '.$table_father->username.' </p>'
                                                            );

                                                            $this->Mail_model->setSubject('Ingreso a nueva mesa');
                                                            $this->Mail_model->setMessage($data_mail);
                                                            $this->Mail_model->sendMail();


                                                            $this->Auth_model->removeMoney($user->id_user,$table_two->tb2_father,0.09,'Has pasado a la siguiente mesa');
                                                            
                             
                                                            $this->db->where('id_table_two', $id_table_two);
                                                            $query_insertusertotable = $this->db->update('table_two', array($var => $user->id_user));


                                                            $this->Table_model->activeTableUser($table_two->tb2_father,$user->id_user,$table_two->id_table_two,2);

                                                            $this->Table_model->ifTableIsActive($id_table_two,2);

                                                            $this->db->where('id_cycle', $id_actual_cycle);
                                                            $query_inserttabletocycle = $this->db->update('cycle', array('table_3' => $id_table_two));

                                                            break 2;
                                                        }
                                                    }
                                                }
                                            }

                                        }
                                        else if($this->ifTablePaid(2,$value))
                                        {
                                            $step = 3;
                                            continue;
                                        }
                                        else
                                        {
                                            $this->Table_model->ifTableIsActive($value,2);
                                        }
                                    }
                                }
                                if($step == 3)
                                {
                                    if($var == 'table_4')
                                    {
                                        if($value == NULL)
                                        {
                                            $data_table = array(
                                               'tb2_father' => $user->id_user
                                            );

                                            $query_newtable = $this->db->insert('table_two',$data_table); 

                                            $table_id = $this->db->insert_id();

                                            if($query_newtable)
                                            {

                                                $this->db->where('id_cycle', $id_actual_cycle);
                                                $query_inserttabletocycle = $this->db->update('cycle', array('table_4' => $table_id));

                                                continue;
                                            }

                                            
                                        }
                                        else if($this->ifTablePaid(2,$value))
                                        {
                                            $step = 4;
                                            continue;
                                        }
                                        else
                                        {
                                            $this->Table_model->ifTableIsActive($value,2);
                                        }
                                    }
                                }
                                if($step == 4)
                                {
                                    $this->db->where('id_cycle', $id_actual_cycle);
                                    $query_inserttabletocycle = $this->db->update('cycle', array('cycle_active' => 1));

                                    $data_notification = array(
                                       'data' => 'El usuario '.$user->username.' Ha ciclado (Se le deberia enviar un pago)'
                                    );

                                    $this->db->insert('admin_notification',$data_notification); 

                                    $this->ifMustPayDonation($user->id_user);

                                    

                                    /*$this->db->where('cycle_user',$user->id_user);

                                    $query_cycle = $this->db->get('cycle'); //Ciclos de X usuario

                                    $n_cycles_active = 0;
                                    $n_cycles_inactive = 0;


                                    foreach ($query_cycle->result() as $cycle)
                                    {
                                        if($cycle->cycle_active == 0)
                                        {
                                            $n_cycles_inactive++;

                                        }
                                        else if($cycle->cycle_active == 1)
                                        {
                                            $n_cycles_active++;

                                        }
                                    }//End cycle foreach

                                    

                                    if($n_cycles_active >= 3)
                                    {
                                        $max_cycle_inactive = 4;
                                    }
                                    else if($n_cycles_active == 1 || $n_cycles_active == 2)
                                    {
                                        $max_cycle_inactive = 2;
                                    }
                                    else
                                    {
                                        $max_cycle_inactive = 1;
                                    }*/

                                    
                     
                                     

                                    $money_actual = $this->Auth_model->getActualUserMoney($user->id_user);

                                    if($money_actual > 0.18)
                                    {
                                        $money_actual = 0.18;
                                    }

                                    /*while($n_cycles_inactive < $max_cycle_inactive) //Revisar ciclos actuales
                                    {
                                        $money_actual = $money_actual - 0.03;
                                        $n_cycles_inactive++;
                                    }*/

                                    $money_actual = $money_actual - 0.09;


                                    for ($i=0; $i < 3; $i++) 
                                    { 
                                        $this->db->where('tb1_active',0);

                                        $query_tableone = $this->db->get('table_one');

                                        if($query_tableone->num_rows() > 0)
                                        {
                                            foreach ($query_tableone->result() as $table_one)
                                            {
                                           

                                                $id_table_one = $table_one->id_table_one;
                                                $table_father = $this->Auth_model->getUserNormalData($table_one->tb1_father);

                                                foreach ($table_one as $var => $value) 
                                                {
                                                    if($var == 'id_table_one' || $var == 'tb1_father')
                                                    {
                                                        continue;
                                                    }

                                                    if($value == NULL)
                                                    {
                         
                                                        $this->db->where('id_table_one', $id_table_one);
                                                        $query_insertusertotable = $this->db->update('table_one', array($var => $user->id_user,$var.'_active' => 1));

                                                        if($query_insertusertotable)
                                                        {
                                               
                                                            
                                                        
                                                            $data_mail = array( 
                                                            "text" => '<p>Has ingresado a una mesa</p> <p>Donde el padre es : '.$table_father->username.' </p>'
                                                            );

                                                            $this->load->model('Mail_model');
                                                            $this->Mail_model->setTo($user->email);
                                                            $this->Mail_model->setSubject('Ingreso a nueva mesa');
                                                            $this->Mail_model->setMessage($data_mail);
                                                            $this->Mail_model->sendMail();
                                                            

                                                            $data_cycle = array(
                                                               'cycle_user' => $user->id_user,
                                                               'table_1' => $id_table_one
                                                            );

                                                            $query_newcycle = $this->db->insert('cycle',$data_cycle); 

                                                            if($query_newcycle)
                                                            {
                                                                $this->Auth_model->removeMoney($user->id_user,$table_one->tb1_father,0.03,'Se ha creado una nueva cuenta');
                                                                $this->Auth_model->addMoney($user->id_user,$table_one->tb1_father,0.03,'Un usuario te ha realizado una donacion');

                                                                $this->plusCycleCounter($user->id_user); //Aqui esta poniendo donation = 1

                                                                break 2;

                                                            }
                                                        }
                                                    }//Check if empty space
                                                }//End table one check free space
                                            }//End table one foreach
                                            
                                        }//End tableone query
                                    }


                                    $data_notification = array(
                                       'id_user' => $user->id_user,
                                       'amount' => 0.09
                                    );

                                    $this->db->insert('system_user_payment',$data_notification); 

                                }
                            }
                        }
                    }//If list_inactive
                }
                else
                {

                    $this->db->where('tb1_active',0);

                    $query_tableone = $this->db->get('table_one');

                    if($query_tableone->num_rows() > 0)
                    {
                        foreach ($query_tableone->result() as $table_one)
                        {
                            $id_table_one = $table_one->id_table_one;
                            $table_father = $this->Auth_model->getUserNormalData($table_one->tb1_father);

                            foreach ($table_one as $var => $value) 
                            {
                                if($var == 'id_table_one' || $var == 'tb1_father')
                                {
                                    continue;
                                }

                                if($value == NULL)
                                {
     
                                    $this->db->where('id_table_one', $id_table_one);
                                    $query_insertusertotable = $this->db->update('table_one', array($var => $user->id_user));

                                    if($query_insertusertotable)
                                    {
                                        $this->load->model('Mail_model');
                                        $this->Mail_model->setTo($user->email);

                                        $data_mail = array( 
                                        "text" => '<p>Has ingresado a una mesa</p>'
                                        );

                                        $this->Mail_model->setSubject('Ingreso a nueva mesa');
                                        $this->Mail_model->setMessage($data_mail);
                                        $this->Mail_model->sendMail();

                                        $data_cycle = array(
                                           'cycle_user' => $user->id_user,
                                           'table_1' => $id_table_one
                                        );

                                        $query_newcycle = $this->db->insert('cycle',$data_cycle); 

                                        if($query_newcycle)
                                        {
                                            $this->plusCycleCounter($user->id_user);
                                            break 2;
                                        }
                                    }
                                }//Check if empty space
                            }//End table one check free space
                        }//End table one foreach
                    }//End tableone query     
                }//If no cyclos to this user (new user)
            } //End user Foreach
        }//End Query
    }

    public function ifMustPayDonation($id_user)
    {

        $this->db->where('cycle_user',$id_user);
        $this->db->where('cycle_active',1);

        $query_cycle = $this->db->get('cycle'); //Ciclos de X usuario

        $n_cycles_active = 0;

        if($query_cycle->num_rows() > 0)
        {
            foreach ($query_cycle->result() as $cycle)
            {
                $n_cycles_active++;
            }
        }

        if($n_cycles_active != 0 && $n_cycles_active % 2 == 0)
        {
            $this->db->where('id_user', $id_user);
            $query_insertusertotable = $this->db->update('auth_users', array('donation' => 1));
        }
    }

    public function ifTablePaid($type,$id)
    {
        if($type == 1)
        {
            $this->db->where('id_table_one',$id);

            $query_table = $this->db->get('table_one');

            if($query_table->num_rows() > 0)
            {
                foreach ($query_table->result() as $table)
                {
                    if($table->tb1_active == 1)
                    {
                        return TRUE;
                    }
                    else
                    {
                        return FALSE;
                    }
                }
            }
        } else if($type == 2)
        {
            $this->db->where('id_table_two',$id);

            $query_table = $this->db->get('table_two');

            if($query_table->num_rows() > 0)
            {
                foreach ($query_table->result() as $table)
                {
                    if($table->tb2_active == 1)
                    {
                        return TRUE;
                    }
                    else
                    {
                        return FALSE;
                    }
                }
            }
        }
    }

    public function ifDonationPaid($id_user)
    {
        $this->db->where('id_user',$id_user);
        $query = $this->db->get('auth_users');
        if($query->num_rows() == 1)
        {
            foreach ($query->result() as $row)
            {
                if($row->donation == 0)
                {
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }
            }

            return FALSE;
        }
        else
        {
            return FALSE;
        }
    }

    public function getTable($type,$id)
    {
        if($type == 1)
        {
            $this->db->where('id_table_one',$id);

            $query_table = $this->db->get('table_one');

            if($query_table->num_rows() > 0)
            {
                foreach ($query_table->result() as $table)
                {
                    return $table;
                }
            }
        } 
        else if($type == 2)
        {
            $this->db->where('id_table_two',$id);

            $query_table = $this->db->get('table_two');

            if($query_table->num_rows() > 0)
            {
                foreach ($query_table->result() as $table)
                {
                    return $table;
                }
            }
        }
    }

    public function getInactiveCycle($id_user)
    {
        $this->db->where('cycle_active',1);
        $this->db->where('cycle_user',$id_user);

        $query_cycle = $this->db->get('cycle');

        if($query_cycle->num_rows() > 0)
        {
            foreach ($query_cycle->result() as $cycle)
            {
                $list_cycles_inactive[] = $cycle;
            }

            return $list_cycles_inactive;
        }

        return FALSE;
    }

    public function getActiveCycle($id_user)
    {
        $this->db->where('cycle_active',0);
        $this->db->where('cycle_user',$id_user);

        $query_cycle = $this->db->get('cycle');

        if($query_cycle->num_rows() > 0)
        {
            foreach ($query_cycle->result() as $cycle)
            {
                $list_cycles_active[] = $cycle;
            }

            return $list_cycles_active;
        }

        return FALSE;
    }

	public function getCycleNumber($id_user)
	{
		$this->db->where('id_user',$id_user);
		$query = $this->db->get('auth_users');
		if($query->num_rows()==1)
        {
			foreach ($query->result() as $row)
            {
				return $row->n_cycle;
			}

            return FALSE;
		}
		else
        {
			return FALSE;
		}    
	}

    public function plusCycleCounter($id_user)
    {
        $actual = $this->getCycleNumber($id_user);
        $actual++;

        $this->db->where('id_user', $id_user);
        $query_insertusertotable = $this->db->update('auth_users', array('n_cycle' => $actual));
        
        
    }

    public function ifBothExistInTable($user_id_1, $user_id_2, $table_id, $table_type)
    {
        $counter = 0;

        if($table_type == 1)
        {
            $this->db->where('id_table_one',$table_id);

            $query_table = $this->db->get('table_one');

            if($query_table->num_rows() > 0)
            {
                foreach ($query_table->result() as $table)
                {
                    foreach ($table as $var => $value) 
                    {
                        if($var == 'tb1_father' || $var == 'tb1_child_1' || $var == 'tb1_child_2' || $var == 'tb1_child_3')
                        {
                            if($value == $user_id_1 || $value == $user_id_2)
                            {
                                $counter++;
                            }
                        }
                    }
                }
            }
        } 
        else if($table_type == 2)
        {
            $this->db->where('id_table_two',$table_id);

            $query_table = $this->db->get('table_two');

            if($query_table->num_rows() > 0)
            {
                foreach ($query_table->result() as $table)
                {
                    foreach ($table as $var => $value) 
                    {
                        if($var == 'tb2_father' || $var == 'tb2_child_1' || $var == 'tb2_child_2')
                        {
                            if($value == $user_id_1 || $value == $user_id_2)
                            {
                                $counter++;
                            }
                        }
                    }
                }
            }
        }

        if($counter >= 2)
        {
            return TRUE;
        }
    }

    public function activeTableUser($father,$child,$table_id,$table_type)
    {
        if($table_type == 1)
        {
            

            $flag_tb1 = 0;

            $this->db->where('id_table_one',$table_id);

            $query_table = $this->db->get('table_one');

            if($query_table->num_rows() > 0)
            {
                foreach ($query_table->result() as $table)
                {
                    if($table->tb1_father == $father)
                    {
                        if($table->tb1_child_1 == $child && $table->tb1_child_1_active != 1)
                        {
                            $this->db->where('id_table_one', $table_id);
                            $query_activeuser = $this->db->update('table_one', array('tb1_child_1_active' => 1));
                            if($query_activeuser)
                            {
                                
                                $this->Auth_model->addMoney($child,$father,0.03,'Un usuario te ha realizado una donacion');
                                $flag_tb1++;
                            }
                        }
                        else if($table->tb1_child_2 == $child && $table->tb1_child_2_active != 1)
                        {
                            $this->db->where('id_table_one', $table_id);
                            $query_activeuser = $this->db->update('table_one', array('tb1_child_2_active' => 1));
                            if($query_activeuser)
                            {
                                $this->Auth_model->addMoney($child,$father,0.03,'Un usuario te ha realizado una donacion');
                                $flag_tb1++;
                            }
                        }
                        else if($table->tb1_child_3 == $child && $table->tb1_child_3_active != 1)
                        {
                            $this->db->where('id_table_one', $table_id);
                            $query_activeuser = $this->db->update('table_one', array('tb1_child_3_active' => 1));
                            if($query_activeuser)
                            {
                                $this->Auth_model->addMoney($child,$father,0.03,'Un usuario te ha realizado una donacion');
                                $flag_tb1++;
                            }
                        }
                    }
                }
            }

            if($flag_tb1 > 0)
            {
                return TRUE;
            }
        } 
        else if($table_type == 2)
        {
            

            $this->db->where('id_table_two',$table_id);

            $query_table = $this->db->get('table_two');

            if($query_table->num_rows() > 0)
            {
                foreach ($query_table->result() as $table)
                {
                    if($table->tb2_father == $father)
                    {
                        

                        if($table->tb2_child_1 == $child && $table->tb2_child_1_active != 1)
                        {
                            $this->db->where('id_table_two', $table_id);
                            $query_activeuser = $this->db->update('table_two', array('tb2_child_1_active' => 1));
                            if($query_activeuser)
                            {
                                $this->Auth_model->addMoney($child,$father,0.09,'Un usuario te ha realizado una donacion');
                                return TRUE;
                            }
                        }
                        else if($table->tb2_child_2 == $child && $table->tb2_child_2_active != 1)
                        {
                            $this->db->where('id_table_two', $table_id);
                            $query_activeuser = $this->db->update('table_two', array('tb2_child_2_active' => 1));
                            if($query_activeuser)
                            {
                                $this->Auth_model->addMoney($child,$father,0.09,'Un usuario te ha realizado una donacion');
                                return TRUE;
                            }
                        }
                    }
                    
                }
            }
        }
    }

    public function ifTableIsActive($table_id,$table_type)
    {
        if($table_type == 1)
        {
            $this->db->where('id_table_one',$table_id);

            $query_table = $this->db->get('table_one');

            if($query_table->num_rows() > 0)
            {
                foreach ($query_table->result() as $table)
                {
                    if($table->tb1_child_1_active == 1 && $table->tb1_child_2_active == 1 && $table->tb1_child_3_active == 1)
                    {
                        $this->db->where('id_table_one', $table_id);
                        $query_activeuser = $this->db->update('table_one', array('tb1_active' => 1));
                        if($query_activeuser)
                        {
                            return TRUE;
                        }
                    } 
                }
            }
        } 
        else if($table_type == 2)
        {
            $this->db->where('id_table_two',$table_id);

            $query_table = $this->db->get('table_two');

            if($query_table->num_rows() > 0)
            {
                foreach ($query_table->result() as $table)
                {
                    if($table->tb2_child_1_active == 1 && $table->tb2_child_2_active == 1)
                    {
                        $this->db->where('id_table_two', $table_id);
                        $query_activeuser = $this->db->update('table_two', array('tb2_active' => 1));
                        if($query_activeuser)
                        {
                            return TRUE;
                        }
                    } 
                }
            }
        }
    }

    public function clearUnpaid()
    {
        $this->db->where('cycle_active',0);
        $query_cycle = $this->db->get('cycle');

        if($query_cycle->num_rows() > 0)
        {
            foreach ($query_cycle->result() as $cycle)
            {
                if($this->getCycleNumber($cycle->cycle_user) > 1)
                {
                   continue; 
                }
                $array = array('id_table_one' => $cycle->table_1);
                $this->db->where($array);

                $query_table = $this->db->get('table_one');

                if($query_table->num_rows() > 0)
                {
                    foreach ($query_table->result() as $table)
                    {
                        $actual_datetime = new DateTime();

                        if($table->tb1_active == 1)
                        {
                            continue;
                        }
                        
                        if($table->tb1_child_1 == $cycle->cycle_user && $table->tb1_child_1_active != 1)
                        {
                            
                            $datetime = new DateTime($table->tb1_child_1_time);
                            $datetime->modify('+13 hour');

                            //$datetime->modify('+999 hour');

                            echo "El tiempo de la bd :".$datetime->format('Y-m-d H:i:s')." - ID ".$table->id_table_one."<br>";
                            echo "El tiempo actual :".$actual_datetime->format('Y-m-d H:i:s')."<br>";

                            if($datetime < $actual_datetime)
                            {
                                $id_user_unpaid = $table->tb1_child_1;

                                //$query = $this->db->delete('auth_users', array('id_user' => $id_user_unpaid));

                                $this->db->where('id_table_one', $table->id_table_one);
                                $query_removeuser = $this->db->update('table_one', array('tb1_child_1' => NULL));
                                if($query_removeuser)
                                {
                                    $this->db->where('id_cycle', $cycle->id_cycle);
                                    $query_removeuser = $this->db->update('cycle', array('table_1' => NULL));

                                    
                                    $this->db->update('auth_users', array('active' => 2), array('id_user' => $id_user_unpaid));

                                    continue;
                                }

                                echo "Se elimina mesa 1 hijo 1 <br>";

                                

                            }
                        }
                        
                        if($table->tb1_child_2 == $cycle->cycle_user && $table->tb1_child_2_active != 1)
                        {
                            $datetime = new DateTime($table->tb1_child_2_time);
                            $datetime->modify('+13 hour');

                            //$datetime->modify('+999 hour');

                            echo "El tiempo de la bd :".$datetime->format('Y-m-d H:i:s')." - ID ".$table->id_table_one."<br>";
                            echo "El tiempo actual :".$actual_datetime->format('Y-m-d H:i:s')."<br>";

                            if($datetime < $actual_datetime)
                            {
                                $id_user_unpaid = $table->tb1_child_2;


                                //$query = $this->db->delete('auth_users', array('id_user' => $id_user_unpaid));

                                $this->db->where('id_table_one', $table->id_table_one);
                                $query_removeuser = $this->db->update('table_one', array('tb1_child_2' => NULL));
                                if($query_removeuser)
                                {
                                    $this->db->where('id_cycle', $cycle->id_cycle);
                                    $query_removeuser = $this->db->update('cycle', array('table_1' => NULL));

                                    $this->db->update('auth_users', array('active' => 2), array('id_user' => $id_user_unpaid));

                                    continue;
                                }

                                echo "Se elimina mesa 1 hijo 2<br>";

                               
                            }
                        }

                        if($table->tb1_child_3 == $cycle->cycle_user && $table->tb1_child_3_active != 1)
                        {
                            $datetime = new DateTime($table->tb1_child_3_time);
                            $datetime->modify('+13 hour');

                            //$datetime->modify('+999 hour');

                            echo "El tiempo de la bd :".$datetime->format('Y-m-d H:i:s')." - ID ".$table->id_table_one."<br>";
                            echo "El tiempo actual :".$actual_datetime->format('Y-m-d H:i:s')."<br>";

                            if($datetime < $actual_datetime)
                            {
                                $id_user_unpaid = $table->tb1_child_3;

                                //$query = $this->db->delete('auth_users', array('id_user' => $id_user_unpaid));

                                $this->db->where('id_table_one', $table->id_table_one);
                                $query_removeuser = $this->db->update('table_one', array('tb1_child_3' => NULL));
                                if($query_removeuser)
                                {
                                    $this->db->where('id_cycle', $cycle->id_cycle);
                                    $query_removeuser = $this->db->update('cycle', array('table_1' => NULL));

                                    $this->db->update('auth_users', array('active' => 2), array('id_user' => $id_user_unpaid));

                                    continue;
                                }

                                echo "Se elimina mesa 1 hijo 3<br>";

                                
                            }
                        }
                    }
                }


                $array = array('id_table_two' => $cycle->table_3);
                $this->db->where($array);

                $query_table = $this->db->get('table_two');

                if($query_table->num_rows() > 0)
                {
                    foreach ($query_table->result() as $table)
                    {
                        if($table->tb2_active == 1)
                        {
                            continue;
                        }

                        $actual_datetime = new DateTime();

                        if($table->tb2_child_1 == $cycle->cycle_user && $table->tb2_child_1_active != 1)
                        {
                            $datetime = new DateTime($table->tb2_child_1_time);
                            $datetime->modify('+13 hour');

                            //$datetime->modify('+999 hour');

                            echo "El tiempo de la bd :".$datetime->format('Y-m-d H:i:s')." - ID ".$table->id_table_two."<br>";
                            echo "El tiempo actual :".$actual_datetime->format('Y-m-d H:i:s')."<br>";

                            if($datetime < $actual_datetime)
                            {
                                $id_user_unpaid = $table->tb2_child_1;

                                //$query = $this->db->delete('auth_users', array('id_user' => $id_user_unpaid));

                                $this->db->where('id_table_two', $table->id_table_two);
                                $query_removeuser = $this->db->update('table_two', array('tb2_child_1' => NULL));
                                if($query_removeuser)
                                {
                                    $this->db->where('id_cycle', $cycle->id_cycle);
                                    $query_removeuser = $this->db->update('cycle', array('table_3' => NULL));

                                    $this->db->update('auth_users', array('active' => 2), array('id_user' => $id_user_unpaid));

                                    continue;
                                }

                            }
                        }
                        
                        if($table->tb2_child_2 == $cycle->cycle_user && $table->tb2_child_2_active != 1)
                        {
                            $datetime = new DateTime($table->tb2_child_2_time);
                            $datetime->modify('+13 hour');

                            //$datetime->modify('+999 hour');

                            echo "El tiempo de la bd :".$datetime->format('Y-m-d H:i:s')." - ID ".$table->id_table_two."<br>";
                            echo "El tiempo actual :".$actual_datetime->format('Y-m-d H:i:s')."<br>";

                            if($datetime < $actual_datetime)
                            {
                                $id_user_unpaid = $table->tb2_child_2;

                                //$query = $this->db->delete('auth_users', array('id_user' => $id_user_unpaid));

                                $this->db->where('id_table_two', $table->id_table_two);
                                $query_removeuser = $this->db->update('table_two', array('tb2_child_2' => NULL));
                                if($query_removeuser)
                                {
                                    $this->db->where('id_cycle', $cycle->id_cycle);
                                    $query_removeuser = $this->db->update('cycle', array('table_3' => NULL));

                                    $this->db->update('auth_users', array('active' => 2), array('id_user' => $id_user_unpaid));

                                    continue;
                                }

                            }
                        }

                    }
                }
            }
        }
    }

    public function getTablePublicList($type = 1)
    {
        $table_list = NULL;
        if($type == 1)
        {
            $this->db->where('tb1_active',0);

            $query_tableone = $this->db->get('table_one');

            if($query_tableone->num_rows() > 0)
            {
                foreach ($query_tableone->result() as $table_one)
                {
                    if($table_one->tb1_child_1 == NULL && $table_one->tb1_child_2 == NULL && $table_one->tb1_child_3 == NULL)
                    {
                        continue;
                    }

                    $table_list[] = $table_one;
                }
            }
        }
        else
        {
            $this->db->where('tb2_active',0);

            $query_tableone = $this->db->get('table_two');

            if($query_tableone->num_rows() > 0)
            {
                foreach ($query_tableone->result() as $table_two)
                {
                    if($table_two->tb2_child_1 == NULL && $table_two->tb2_child_2 == NULL)
                    {
                        continue;
                    }

                    $table_list[] = $table_two;
                }
            }
        }

        return $table_list;
    }

    
}
?>