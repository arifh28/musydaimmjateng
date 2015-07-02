<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_cabang extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
	public function index()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_panitia")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_panitia/dashboard');
			$this->breadcrumb->append_crumb("Data Cabang", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');



            $d['dt_data_kader'] = $this->app_global_model->generate_index_kader($this->config->item("limit_item_medium"),0);

			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/admin_panitia/data_cabang/bg_home');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
        else
        {
            redirect("web");
        }
    }

}
 
/* End of file berita.php */
