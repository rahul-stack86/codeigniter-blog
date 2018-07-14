<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Counts_summary_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }

    public function update_count($tablename){
        $this->db->where('table_name', $tablename);
        $this->db->set('total_count', 'total_count+1', FALSE);
        $this->db->update('counts_summary');
    }

    public function get_count($tablename)
    {
        $this->db->where('table_name', $tablename);
        $query = $this->db->get('counts_summary');
        $ret = $query->row();
        // print_r($ret);exit;
        return $ret->total_count;
    }    

}