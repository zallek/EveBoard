<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Nicolas Fortin
 * Date: 13/02/13
 * Time: 22:45
 *
 * Name : layout.php
 * Description : *
 */

class Layout
{
    private $CI;
    private $var = array();
    private $theme = 'default';

    /*
    |===============================================================================
    | Constructeur
    |===============================================================================
    */

    public function __construct()
    {
        $this->CI =& get_instance();

        $this->var['output'] = '';
        $this->var['fixed'] = '';

        //  Le titre est composé du nom de la méthode et du nom du contrôleur
        $this->var['titre'] = ucfirst($this->CI->router->fetch_class() . ' - ' . ucfirst($this->CI->router->fetch_method()));
        $this->var['charset'] = $this->CI->config->item('charset');

        $this->var['css'] = array();
        $this->var['js'] = array();
        $this->add_css($this->CI->router->fetch_class().'/style');
    }


    public function display(){
        $this->var['menu'] = $this->CI->load->view('../themes/'.$this->theme.'/menu', null, true);
        $this->CI->load->view('../themes/'.$this->theme.'/master', $this->var);
    }

    /**
     * Add a view to the content space
     * @param $name view name to add
     * @param array $data
     * @param bool $render if true, not displayed
     * @return Layout
     */
    public function add_view_content($name, $data = array(), $render = false)
    {
        $this->var['output'] .= $this->CI->load->view($name, $data, true);
        if(!$render)
            $this->display();
        return $this;
    }

    /**
     * Add a view already rendered
     * @param $data
     * @param bool $render if true, not displayed
     * @return Layout
     */
    public function add_rendered_fixed($data, $render = false)
    {
        $this->var['fixed'] .= $data;
        if(!$render)
            $this->display();
        return $this;
    }


    /** CONFIG LAYOUT **/

    public function set_titre($titre)
    {
        if(is_string($titre) AND !empty($titre))
        {
            $this->var['titre'] = $titre;
            return true;
        }
        return false;
    }

    public function set_charset($charset)
    {
        if(is_string($charset) AND !empty($charset))
        {
            $this->var['charset'] = $charset;
            return true;
        }
        return false;
    }

    public function add_css($nom)
    {
        if(is_string($nom) AND !empty($nom) AND file_exists('./assets/css/' . $nom . '.css'))
        {
            $this->var['css'][] = css_url($nom);
            return true;
        }
        return false;
    }

    /**
     * @param $filePath from assets/
     * @return bool
     */
    public function add_css_($filePath)
    {
        if(is_string($filePath) AND !empty($filePath) AND file_exists('./assets/' . $filePath . '.css'))
        {
            $this->var['css'][] = base_url() . 'assets/' . $filePath . '.css';
            return true;
        }
        return false;
    }

    public function add_js($nom)
    {
        if(is_string($nom) AND !empty($nom) AND file_exists('./assets/javascript/' . $nom . '.js'))
        {
            $this->var['js'][] = js_url($nom);
            return true;
        }
        return false;
    }

    public function set_layout($theme)
    {
        if(is_string($theme) AND !empty($theme) AND file_exists(APPPATH.'themes/' . $theme . '.php'))
        {
            $this->theme = $theme;
            return true;
        }
        return false;
    }
}

/* End of file layout.php */
/* Location: ./application/libraries/layout.php */
