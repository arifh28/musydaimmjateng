<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class routing_pages extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index()
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Routing Pages", '/');
			
			$d['aktif_formatur_cabang'] = "";
			$d['aktif_mandat_cabang'] = "";
			$d['aktif_berita'] = "";


			$d['aktif_pesan_musyda'] = "";
			$d['aktif_list_download'] = "";
			
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_menu('0',$h='');
			
			$this->load->view('bg_header',$d);
			$this->load->view('routing_pages/bg_home');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function tambah()
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Routing Pages", base_url().'superadmin/routing_pages');
			$this->breadcrumb->append_crumb("Input Routing Pages", '/');
			
			$d['aktif_formatur_cabang'] = "";
			$d['aktif_mandat_cabang'] = "";
			$d['aktif_berita'] = "";


			$d['aktif_pesan_musyda'] = "";
			$d['aktif_list_download'] = "";
			
			$d['menu_list'] = $this->db->get("dlmbg_menu");
			
			$d['id_parent'] = "";
			$d['menu'] = "";
			$d['url_route'] = "";
			$d['content'] = "";
			$d['posisi'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('routing_pages/bg_input');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function edit($id_param)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Routing Pages", base_url().'superadmin/routing_pages');
			$this->breadcrumb->append_crumb("Update Routing Pages", '/');
			
			$d['aktif_formatur_cabang'] = "";
			$d['aktif_mandat_cabang'] = "";
			$d['aktif_berita'] = "";


			$d['aktif_pesan_musyda'] = "";
			$d['aktif_list_download'] = "";
			
			$where['id_menu'] = $id_param;
			$d['menu_list'] = $this->db->where_not_in('id_menu', $where)->get("dlmbg_menu");
			$get = $this->db->get_where("dlmbg_menu",$where)->row();
			
			$d['id_parent'] = $get->id_parent;
			$d['menu'] = $get->menu;
			$d['url_route'] = $get->url_route;
			$d['content'] = $get->content;
			$d['posisi'] = $get->posisi;
			
			$d['id_param'] = $get->id_menu;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('routing_pages/bg_input');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$tipe = $this->input->post("tipe");
			$id['id_menu'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['id_parent'] = $this->input->post("id_parent");
				$in['menu'] = $this->input->post("menu");
				$in['url_route'] = $this->input->post("url_route");
				$in['content'] = $this->input->post("content");
				$in['posisi'] = $this->input->post("posisi");
				
				$this->db->insert("dlmbg_menu",$in);
			}
			else if($tipe=="edit")
			{
				$in['id_parent'] = $this->input->post("id_parent");
				$in['menu'] = $this->input->post("menu");
				$in['url_route'] = $this->input->post("url_route");
				$in['content'] = $this->input->post("content");
				$in['posisi'] = $this->input->post("posisi");
				
				$this->db->update("dlmbg_menu",$in,$id);
			}
			
			redirect("superadmin/routing_pages");
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$where['id_menu'] = $id_param;
			$this->db->delete("dlmbg_menu",$where);
			redirect("superadmin/routing_pages");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
