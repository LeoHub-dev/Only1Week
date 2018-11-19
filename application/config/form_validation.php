<?php

        $config = array(
        'login' => array(
                array(
                        'field' => 'username',
                        'label' => 'Usuario',
                        'rules' => 'required|trim|isNotUniqueUsername|isConfirmedUser|notPaidUser'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required'
                )  
        ),
        'signup' => array(
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required|valid_email|trim|isUniqueMail'
                ),
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'required|min_length[5]',
                ),
                array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'required|trim|isUniqueUsername|min_length[5]',
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required|min_length[5]'
                ),
                array(
                        'field' => 'repassword',
                        'label' => 'Confirm password',
                        'rules' => 'trim|required|matches[password]|min_length[5]'
                ),
                array(
                        'field' => 'bitcoinaddress',
                        'label' => 'Bitcoin Address',
                        'rules' => 'trim|required|min_length[8]'
                ),
                array(
                        'field' => 'agree_terms',
                        'label' => 'Terminos y politicas',
                        'rules' => 'trim|required|numeric'
                ),
                array(
                        'field' => 'ref',
                        'label' => 'Referido',
                        'rules' => 'trim|numeric'
                )
                ,
                array(
                        'field' => 'skype',
                        'label' => 'Skype',
                        'rules' => 'required'
                )
        ),
        'chat' => array(
                array(
                        'field' => 'textMessage',
                        'label' => 'Mensaje',
                        'rules' => 'required'
                )
        ),
        'signupAdmin' => array(
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required|valid_email|trim|isUniqueMail'
                ),
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'required|min_length[5]',
                ),
                array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'required|trim|isUniqueUsername|min_length[5]',
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required|min_length[5]'
                ),
                array(
                        'field' => 'bitcoinaddress',
                        'label' => 'Bitcoin Address',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'ref',
                        'label' => 'Referido',
                        'rules' => 'trim|numeric'
                )
        ),
        'suscription' => array(
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required|valid_email|trim|isSuscribed'
                )
        ),
        'edituser' => array(
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'required|min_length[5]'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required|min_length[3]'
                ),
                array(
                        'field' => 'image',
                        'label' => 'Imagen',
                        'rules' => 'trim'
                ),
                array(
                        'field' => 'ref',
                        'label' => 'Referido',
                        'rules' => 'trim|numeric'
                )
        ),
        'admin_table' => array(
                array(
                        'field' => 'father',
                        'label' => 'Padre',
                        'rules' => 'required|trim|numeric'
                )
        )
        );

?>