<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Controller extends MY_Controller {

        public $data = [];

        public function __construct()
        {
                parent::__construct();

// echo 'logged_in='. $this->session->userdata('logged_in');

                if($this->session->userdata('logged_in') != '1'){
// SET FLASH USER NOT FOUND
                        $this->session->set_flashdata('error_please_login', bootstrap_alert(1, $this->lang->line('error_please_login')));

                        redirect('login','refresh');
                }

                $this->data['userdata'] = $this->session->userdata();
        }
}