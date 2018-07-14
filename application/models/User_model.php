<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $_table_name = 'users';
    
    public $rules = [
        'username' => ['field' => 'txtUsername', 'label'=>'Username', 'rules'=>'trim|required|xss_clean'],
        'password' => ['field' => 'txtPassword', 'label'=>'Password', 'rules'=>'trim|required']
    ];

    public $rules_user = [
        'txtName' => ['field' => 'txtName', 'label'=>'Name', 'rules'=>'trim|required|xss_clean'],
        'txtUsername' => ['field' => 'txtUsername', 'label'=>'Username', 'rules'=>'trim|required|xss_clean|callback__unique_username'],
        'txtPassword' => ['field' => 'txtPassword', 'label'=>'Password', 'rules'=>'trim|required|matches[confTxtPassword]'],
        'confTxtPassword' => ['field' => 'confTxtPassword', 'label'=>'Confirm Password', 'rules'=>'trim|required|matches[txtPassword]']
    ];
    
    function __construct()
    {
        parent::__construct();
    }

    public function get_username($username)
    {
        $this->db->select()->from('users')->where('username', $username);
        $query = $this->db->get();

        if($query->num_rows() > 0){
         return $query->row();
     }

     return NULL;
 }



 public function save($input_array){
    $this->db->insert($this->_table_name, $input_array);
    return $this->db->insert_id();
}

}