<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// any_in_array() is not in the Array Helper, so it defines a new function
function any_in_array($needle, $haystack)
{
        $needle = is_array($needle) ? $needle : array($needle);

        foreach ($needle as $item)
        {
                if (in_array($item, $haystack))
                {
                        return TRUE;
                }
        }

        return FALSE;
}

// random_element() is included in Array Helper, so it overrides the native function
function random_element($array)
{
        shuffle($array);
        return array_pop($array);
}


function hash_password($string){
                return hash('sha512', $string . config_item('encryption_key'));
        }