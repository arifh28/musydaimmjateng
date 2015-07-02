<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profil extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index()
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="panlih")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'panlih');
			$this->breadcrumb->append_crumb("Profil User", '/');
			
			$d['aktif_formatur_cabang'] = "";
			$d['aktif_mandat_cabang'] = "";
			$d['aktif_berita'] = "";


			$d['aktif_pesan_musyda'] = "";
			$d['aktif_list_download'] = "";
			
			$where['id_admin_panlih'] = $this->session->userdata("id_admin_panlih");
			$get = $this->db->get_where("dlmbg_admin_panlih",$where)->row();
			
			$d['nama_panlih_admin'] = $get->nama_panlih_admin;
			$d['username_panlih_admin'] = $get->username_panlih_admin;
			
			$d['id_param'] = $get->id_admin_panlih;
			
			$this->load->view('bg_header',$d);
			$this->load->view('profil/bg_home');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="panlih")
		{
			$id['id_admin_panlih'] = $this->input->post("id_param");
			
			$cek = $this->db->get_where("dlmbg_admin_panlih",array("username_panlih_admin"=>$this->input->post("username_panlih_admin")))->num_rows();
			if($cek>0 && $this->input->post("username_temp")!=$this->input->post("username_panlih_admin"))
			{
				$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya");
				redirect("panlih/profil");
			}
			else
			{
				$in['nama_panlih_admin'] = $this->input->post("nama_panlih_admin");
				$in['username_panlih_admin'] = $this->input->post("username_panlih_admin");
				
				$sess_data['nama_user_login'] = $in['nama_panlih_admin'];
				$sess_data['username'] = $in['username_panlih_admin'];
				$this->session->set_userdata($sess_data);
				
				$this->db->update("dlmbg_admin_panlih",$in,$id);
				redirect("panlih/profil");
			}
	}
		else
		{
			redirect("auth/user_login");
		}
   }
}
 
/* End of file panlih.php */
