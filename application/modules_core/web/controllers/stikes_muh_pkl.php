<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stikes_muh_pkl extends MX_Controller
{

    /**
     * @author : Gede Lumbung
     * @web : http://gedelumbung.com
     **/

    public function index()
    {
        $d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
        $d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
        $d['dt_bidang'] = $this->app_global_model->generate_menu_bidang();
        $d['dt_link'] = $this->app_global_model->generate_menu_link_terkait();


        $d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
        $d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
        $d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);

        $this->load->view($_SESSION['site_theme'].'/bg_header',$d);
        if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
        $this->load->view($_SESSION['site_theme'].'/bg_breadcumb');

        $this->load->view($_SESSION['site_theme'].'/stikes_muh_pkl/bg_home');

        $this->load->view($_SESSION['site_theme'].'/bg_footer');
    }
}
/* End of file berita.php */