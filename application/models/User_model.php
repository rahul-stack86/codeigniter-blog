<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model
{
    protected $_table_name = 'users';
    protected $_primary_name = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'name';
    public $rules = [
        'email' => ['field' => 'txtEmail', 'label'=>'Email', 'rules'=>'trim|required|valid_email|xss_clean'],
        'password' => ['field' => 'txtPassword', 'label'=>'Password', 'rules'=>'trim|required']
    ];
    
    function __construct()
    {
        parent::__construct();
    }

    public function get_username($username)
    {
        $this->db->select()->from('users')->where('email', $username);
        $query = $this->db->get();

        if($query->num_rows() > 0){
           return $query->row();
        }

        return NULL;
    }

    // stored procedures

    public function get_all_users()
    {
    	$query = $this->db->query('call Get_All_Users()');

    	mysqli_next_result($this->db->conn_id);

       	$result = $query->result();

       	$query->free_result();

       	return $result;
    }
    
    /*public function get_articles($num = 20, $start = 0)
    {
    	$this->db->select()
    		->from('articles')
    		->where('status', 1)
    		->order_by('created_at', "desc")
    		->limit($num, $start);

        $query = $this->db->get();

        if($query->num_rows() > 0){
           return $query->result();
        }
        
        return NULL;
    }*/


    /*public function get_article_count()
    {
    	$query = $this->db->select('COUNT(id) as idcnt')->get('articles');
    	return $query->row()->idcnt;
    }*/
}