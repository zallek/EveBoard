<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Nicolas Fortin
 * Date: 07/08/13
 * Time: 19:47
 *
 * Name : debug_helper.php
 * Description : *
 */

if ( ! function_exists('debug_var'))
{
    function debug_var($var = '')
    {
        echo '<pre>';
        if (is_array($var) || is_object($var))
        {
            print_r($var);
        }
        else
        {
            echo $var;
        }
        echo '</pre>';
    }
}




/* End of file debug_helper.php */