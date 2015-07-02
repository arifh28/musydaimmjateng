<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_kader extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		$this->breadcrumb->append_crumb('Beranda', base_url());
		$this->breadcrumb->append_crumb('Indexs Data Sekolah', base_url().'web/data_cabang');
		$this->breadcrumb->append_crumb("Data Peserta Didik", '/');

		$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
		$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');



		$d['dt_formatur_cabang'] = $this->app_global_model->generate_menu_formatur_cabang($_SESSION['limit_footer_formatur_cabang'],0);
		$d['dt_data_kader'] = $this->app_global_model->generate_index_kader($this->config->item("limit_item_medium"),$uri,$filter);

		$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
		if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
		$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
		$this->load->view($_SESSION['site_theme'].'/data_cabang/data_kader/bg_home');
		$this->load->view($_SESSION['site_theme'].'/bg_footer');
   }
 
   public function cabang($id_param,$uri=0)
   {
      $where['id_cabang_profil'] = $id_param;
      $get_data = $this->db->get_where("dlmbg_cabang_profil",$where);
      $ret_data = $get_data->row();
      if($get_data->num_rows()>0)
      {
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Indexs Data Sekolah', base_url().'web/data_cabang');
			$this->breadcrumb->append_crumb($ret_data->nama_cabang, 
			base_url().'web/data_cabang/profil/'.$ret_data->id_cabang_profil.'/'.url_title(strtolower($ret_data->nama_cabang)).'');
			$this->breadcrumb->append_crumb("Data Peserta Didik", '/');

			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');


			$d['dt_agenda'] = $this->app_global_model->generate_menu_agenda($_SESSION['limit_sidebar_agenda'],0);

			$d['dt_formatur_cabang'] = $this->app_global_model->generate_menu_formatur_cabang($_SESSION['limit_footer_formatur_cabang'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);

			$d['nama_cabang'] = $ret_data->nama_cabang;
			$d['id_cabang'] = $ret_data->id_cabang_profil;
      		$d['dt_data_kader'] = $this->app_global_model->generate_index_kader_cabang($id_param,$this->config->item("limit_item_medium"),$uri);

			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/data_cabang/data_kader/bg_home_cabang');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
      }
      else
      {
	      	redirect(base_url());
      }
   }
 
   public function set()
   {
      $sess['by_id_kecamatan'] = $this->input->post("id_kecamatan");
      $sess['by_id_jenjang_pendidikan'] = $this->input->post("id_jenjang_pendidikan");
	  $this->session->set_userdata($sess);
	  redirect("web/data_kader");
   }
}
 
/* End of file berita.php */
