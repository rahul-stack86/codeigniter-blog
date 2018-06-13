<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function bootstrap_alert($type, $msg)
{
        $output = '';
        switch ($type) {
                case '1': // success
                        $output = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$msg.'</div>';
                break;

                case '2':
                        $output = '<div class="alert alert-info alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$msg.'</div>';
                break;

                case 3:
                        $output = '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$msg.'</div>';
                break;

                case 4:
                        $output = '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$msg.'</div>';
                break;
        }

        return $output;
}