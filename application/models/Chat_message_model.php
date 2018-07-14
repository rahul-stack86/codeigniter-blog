<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_message_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function save($input_array){
        $this->db->insert('chat_messages', $input_array);
        return $this->db->insert_id();
    }

    public function get_chats($jobid, $userid_1, $userid_2)
    {
        $this->db->select(['t1.message', 't1.created_at', 't2.name'])
            ->from('chat_messages t1')
            ->join('users t2', 't1.userid_2 = t2.id')
            ->join('jobs t3', 't1.jobid = t3.id')
            ->where(' ((t1.userid_1 = '.$userid_1.' AND '.' t1.userid_2 = '.$userid_2.') OR (t1.userid_2 = '.$userid_1.' AND '.' t1.userid_1 = '.$userid_2.'))')
            ->where('t1.jobid = '.$jobid)
            ->order_by('t1.id', "desc");

        $query = $this->db->get();

        // echo $this->db->last_query();exit;

        if($query->num_rows() > 0){
           return $query->result();
        }
        
        return NULL;
    }
/*
    public function get_job($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('jobs');

        return $query->row();
    }*/

}