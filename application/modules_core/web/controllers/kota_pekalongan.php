<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kota_pekalongan extends MX_Controller
{

    /**
     * @author : Gede Lumbung
     * @web : http://gedelumbung.com
     **/

    public function index()
    {
        $d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
        $d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');

        $this->load->view($_SESSION['site_theme'].'/bg_header',$d);
        if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
        $this->load->view($_SESSION['site_theme'].'/bg_breadcumb');

        $this->load->view($_SESSION['site_theme'].'/kota_pekalongan/bg_home');

        $this->load->view($_SESSION['site_theme'].'/bg_footer');
    }
}
/* End of file berita.php */