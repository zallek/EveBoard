<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by Nicolas Fortin
 * Date: 07/08/13
 * Time: 13:16
 *
 * Name : MY_loader.php
 * Description : *
 */
class MY_Loader extends CI_Loader
{
    /**
     * Include all files of a directory
     * @param $path String Application folder to include (no '/' at the end).
     */
    public function directory($path)
    {
        $CI =& get_instance();
        $CI->load->helper('directory');

        $path = APPPATH.$path;
        $map = directory_map($path);

        $this->directory_rec($path, $map);
    }

    private function directory_rec($path, $map){
        $path .= '/';
        foreach($map as $key => $value){
            if(is_array($value)){
                $this->directory_rec($path.$key, $value);
            }
            else{
                $this->file($path.$value);
                echo "$path.$value"."<br/>";
            }
        }
    }

    /**
     * @param $name String library name folder
     * <!> A file named include.php must be at the based the library folder
     */
    public function library_load($name){
        $this->file(APPPATH.'libraries/'.$name.'/include.php');
    }
}

/* End of file MY_loader.php */