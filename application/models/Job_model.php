<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job_model extends CI_Model
{
    protected $_table_name = 'jobs';

    // txtTitle txtDescription txtSubmissionTime

    public $rules = [
        'txtTitle' => ['field' => 'txtTitle', 'label'=>'Title', 'rules'=>'trim|required|xss_clean'],
        'txtDescription' => ['field' => 'txtDescription', 'label'=>'Description', 'rules'=>'trim|required|xss_clean'],
        'txtSubmissionTime' => ['field' => 'txtSubmissionTime', 'label'=>'Submission Time', 'rules'=>'trim|required|callback__date_valid']
    ];
    
    function __construct()
    {
        parent::__construct();
    }

    public function save($input_array){
        $this->db->insert($this->_table_name, $input_array);
        return $this->db->insert_id();
    }

    public function get_jobs($num = 20, $start = 0)
    {
        $this->db->select(['t1.id', 't1.userid', 't1.title', 't2.username'])
            ->from('jobs t1 ')
            ->join('users t2', 't1.userid = t2.id')
            ->order_by('id', "desc")
            ->limit($num, $start);

        $query = $this->db->get();

        if($query->num_rows() > 0){
           return $query->result();
        }
        
        return NULL;
    }

    public function get_job($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('jobs');

        return $query->row();
    }

}