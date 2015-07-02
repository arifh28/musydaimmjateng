<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class web extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index()
   {
      $d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
      $d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');

      $this->load->view($_SESSION['site_theme'].'/bg_header',$d);
      $this->load->view($_SESSION['site_theme'].'/bg_slider');
      $this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
      $this->load->view($_SESSION['site_theme'].'/bg_home');
      $this->load->view($_SESSION['site_theme'].'/bg_footer');
   }
 
   public function pages($id_pages)
   {
      $where['id_menu'] = $id_pages;
      $get_data = $this->db->get_where("dlmbg_menu",$where);
      if($get_data->num_rows()>0)
      {
      		$h = $get_data->row();
      		if($h->url_route=="")
      		{
			      $this->breadcrumb->append_crumb('Beranda', base_url());
			      $this->breadcrumb->append_crumb($h->menu, '/');
			      $d['title'] = $h->menu;
			      $d['content'] = $h->content;

			      $d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			      $d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');



			      $this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			      if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			      $this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			      $this->load->view($_SESSION['site_theme'].'/pages/bg_home');
			      $this->load->view($_SESSION['site_theme'].'/bg_footer');
      		}
      		else
      		{
				redirect($h->url_route);
      		}
      }
      else
      {
	      	redirect(base_url());
      }
   }
}
 
/* End of file web.php */
