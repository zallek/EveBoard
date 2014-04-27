<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by Nicolas Fortin
 * Date: 06/08/13
 * Time: 13:57
 *
 * Name : home.php
 * Description : *
 */
class Home extends CI_Controller
{
    public function __construct()
    {
        //parent::Controller();
        parent::__construct();
    }

    public function index()
    {
        $this->layout->add_view_content('home/home_view');
    }
}

/* End of file home.php */