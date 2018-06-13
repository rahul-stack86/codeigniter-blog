<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model
{
    public function get_articles($num = 20, $start = 0)
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
    }


    public function get_article_count()
    {
    	$query = $this->db->select('COUNT(id) as idcnt')->get('articles');
    	return $query->row()->idcnt;
    }
}