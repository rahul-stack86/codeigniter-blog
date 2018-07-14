<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job_chat_master_model extends CI_Model
{
    public $rules = [
        'txtaMessage' => ['field' => 'txtaMessage', 'label'=>'Message', 'rules'=>'trim|required|xss_clean']
    ];
    
    function __construct()
    {
        parent::__construct();
    }

    public function check_chat($jobid, $userid_1, $userid_2)
    {
        $this->db->where(['jobid'=>$jobid]);
        $this->db->where(' ((userid_1 = '.$userid_1.' AND userid_2 = '.$userid_2.') OR (userid_1 = '.$userid_2.' AND userid_2 = '.$userid_1.'))');
        $query = $this->db->get('job_chat_master');
        // echo $this->db->last_query();exit;
        return $query->num_rows();
    }

    public function save($jobid, $userid_1, $userid_2)
    {
        $this->db->insert('job_chat_master', ['jobid'=>$jobid, 'userid_1'=>$userid_1, 'userid_2'=>$userid_2]);
    }

    public function get_users($jobid, $userid)
    {

         $this->db->select(['t1.jobid', 't1.userid_2', 't2.username'])
            ->from('job_chat_master t1 ')
            ->join('users t2', 't1.userid_2 = t2.id')
            ->where('t1.jobid', $jobid)
            ->where('t1.userid_2 !=', $userid)
            ->order_by('t1.id', "asc");

        $query = $this->db->get();

        // echo $this->db->last_query();exit;

        $rows = [];
        foreach($query->result() as $row){
            $rows[] = $row;
        }
        return $rows;
    }    

}