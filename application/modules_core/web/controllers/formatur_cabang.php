<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class formatur_cabang extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {  
      $d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
      $d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
      $d['dt_bidang'] = $this->app_global_model->generate_menu_bidang();
      $d['dt_link'] = $this->app_global_model->generate_menu_link_terkait();



      $d['dt_formatur_cabang'] = $this->app_global_model->generate_menu_formatur_cabang($_SESSION['limit_footer_formatur_cabang'],0);
      $d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
      $d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
      $d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);

      $this->breadcrumb->append_crumb('Beranda', base_url());
	  $this->breadcrumb->append_crumb('Indexs Artikel Sekolah', '/');

      $d['dt_index_formatur_cabang'] = $this->app_global_model->generate_index_formatur_cabang($this->config->item("limit_item"),$uri);

      $this->load->view($_SESSION['site_theme'].'/bg_header',$d);
      if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
      $this->load->view($_SESSION['site_theme'].'/bg_breadcumb');

      $this->load->view($_SESSION['site_theme'].'/formatur_cabang/bg_home');

      $this->load->view($_SESSION['site_theme'].'/bg_footer');
   }
 
   public function cabang($id_param,$uri=0)
   {
      $where_cabang['id_cabang_profil'] = $id_param;
      $get_data_cabang = $this->db->get_where("dlmbg_cabang_profil",$where_cabang)->row();
	  
      $d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
      $d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
      $d['dt_bidang'] = $this->app_global_model->generate_menu_bidang();
      $d['dt_link'] = $this->app_global_model->generate_menu_link_terkait();
      $d['dt_pengumuman'] = $this->app_global_model->generate_menu_pengumuman($_SESSION['limit_sidebar_pengumuman'],0);



      $d['dt_formatur_cabang'] = $this->app_global_model->generate_menu_formatur_cabang($_SESSION['limit_footer_formatur_cabang'],0);
      $d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
      $d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
      $d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);

      $this->breadcrumb->append_crumb('Beranda', base_url());
	  $this->breadcrumb->append_crumb('Indexs Artikel Sekolah', base_url().'web/formatur_cabang');
	  $this->breadcrumb->append_crumb($get_data_cabang->nama_cabang, '/');

      $d['dt_index_formatur_cabang'] = $this->app_global_model->generate_index_formatur_per_cabang($id_param,$this->config->item("limit_item"),$uri);

      $this->load->view($_SESSION['site_theme'].'/bg_header',$d);
      if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
      $this->load->view($_SESSION['site_theme'].'/bg_breadcumb');

      $this->load->view($_SESSION['site_theme'].'/formatur_cabang/bg_home');

      $this->load->view($_SESSION['site_theme'].'/bg_footer');
   }
 
   public function detail($id_formatur,$tipe)
   {
      $where['id_cabang_formatur'] = $id_formatur;
      $get_data = $this->db->get_where("dlmbg_cabang_formatur",$where);
      $ret_data = $get_data->row();
	  
      $where_cabang['id_cabang_profil'] = $ret_data->id_cabang_profil;
      $get_data_cabang = $this->db->get_where("dlmbg_cabang_profil",$where_cabang)->row();
      if($get_data->num_rows()>0)
      {
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Indexs Artikel Sekolah', base_url().'web/formatur_cabang');
			$this->breadcrumb->append_crumb($get_data_cabang->nama_cabang, base_url().'web/formatur_cabang/cabang/'.$get_data_cabang->id_cabang_profil.'');
			$this->breadcrumb->append_crumb($ret_data->judul, '/');

			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_bidang'] = $this->app_global_model->generate_menu_bidang();
			$d['dt_link'] = $this->app_global_model->generate_menu_link_terkait();
			$d['dt_pengumuman'] = $this->app_global_model->generate_menu_pengumuman($_SESSION['limit_sidebar_pengumuman'],0);
			$d['dt_agenda'] = $this->app_global_model->generate_menu_agenda($_SESSION['limit_sidebar_agenda'],0);


			$d['dt_formatur_cabang'] = $this->app_global_model->generate_menu_formatur_cabang($_SESSION['limit_footer_formatur_cabang'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);

			$d['dt_detail_formatur_cabang'] = $this->app_global_model->generate_detail_formatur_cabang($id_formatur);

			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');

			$this->load->view($_SESSION['site_theme'].'/formatur_cabang/bg_detail');

			$this->load->view($_SESSION['site_theme'].'/bg_footer');
      }
      else
      {
	      	redirect(base_url());
      }
   }
}
 
/* End of file berita.php */
