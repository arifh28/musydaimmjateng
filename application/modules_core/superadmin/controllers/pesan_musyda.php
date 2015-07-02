<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pesan_musyda extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Buku Tamu", '/');
			
			$d['aktif_formatur_cabang'] = "";
			$d['aktif_mandat_cabang'] = "";
			$d['aktif_berita'] = "";


			$d['aktif_pesan_musyda'] = "active";
			$d['aktif_list_download'] = "";
			
			$filter['nama'] = $this->session->userdata("by_nama");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_pesan_musyda($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('pesan_musyda/bg_home');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
	public function set()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$sess['by_nama'] = $this->input->post("by_judul");
			$this->session->set_userdata($sess);
			redirect("superadmin/pesan_musyda");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$where['id_super_pesan_musyda'] = $id_param;
			$this->db->delete("dlmbg_super_pesan_musyda",$where);
			redirect("superadmin/pesan_musyda");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function approve($id_param,$value)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$id['id_super_pesan_musyda'] = $id_param;
			$up['stts'] = $value;
			$this->db->update("dlmbg_super_pesan_musyda",$up,$id);
			redirect("superadmin/pesan_musyda");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
