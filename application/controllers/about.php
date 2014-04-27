<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by Nicolas Fortin
 * Date: 06/08/13
 * Time: 13:57
 *
 * Name : about.php
 * Description : *
 */
class About extends CI_Controller
{
    public function __construct()
    {
        //parent::Controller();
        parent::__construct();
        $this->load->library('market_bar');
    }

    public function index()
    {
        $this->layout->add_rendered_fixed($this->market_bar->render(), true);
        $this->layout->add_view_content('about/about_view');
    }
}

/* End of file about.php */