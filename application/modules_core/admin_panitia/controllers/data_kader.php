<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_kader extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
	public function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_panitia")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_panitia/dashboard');
			$this->breadcrumb->append_crumb("Daftar Peserta", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_formatur_cabang'] = $this->app_global_model->generate_menu_formatur_cabang($_SESSION['limit_footer_formatur_cabang'],0);

            $d['dt_data_kader'] = $this->app_global_model->generate_index_kader($this->config->item("limit_item_medium"),$uri);

			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/admin_panitia/data_kader/bg_home');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
        else
        {
            redirect("web");
        }
    }

}
 
/* End of file berita.php */
