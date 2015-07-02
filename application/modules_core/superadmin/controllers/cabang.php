<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cabang extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Sekolah", '/');
			
			$d['aktif_formatur_cabang'] = "";

			$d['aktif_pesan_musyda'] = "";

			
			$filter['nama_cabang'] = $this->session->userdata("by_nama");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_cabang($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('cabang/bg_home');
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
			$this->breadcrumb->append_crumb("Sekolah", base_url().'superadmin/cabang');
			$this->breadcrumb->append_crumb("Input Sekolah", '/');

			$d['aktif_pesan_musyda'] = "";

			$d['nama_cabang'] = "";
            $d['visi_misi'] = "";
            $d['alamat'] = "";
            $d['email'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('cabang/bg_input');
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
			$this->breadcrumb->append_crumb("cabang", base_url().'superadmin/cabang');
			$this->breadcrumb->append_crumb("Update cabang", '/');
			
			$d['aktif_formatur_cabang'] = "";

			$d['aktif_pesan_musyda'] = "";

			
			$where['id_cabang_profil'] = $id_param;
			$get = $this->db->get_where("dlmbg_cabang_profil",$where)->row();

			$d['nama_cabang'] = $get->nama_cabang;
            $d['visi_misi'] = $get->visi_misi;
            $d['alamat'] = $get->alamat;
            $d['email'] = $get->email;

			$d['id_param'] = $get->id_cabang_profil;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('cabang/bg_input');
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
			$id['id_cabang_profil'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama_cabang'] = $this->input->post("nama_cabang");
                $in['visi_misi'] = $this->input->post("visi_misi");
                $in['alamat'] = $this->input->post("alamat");
                $in['email'] = $this->input->post("email");

				$this->db->insert("dlmbg_cabang_profil",$in);
			}
			else if($tipe=="edit")
			{
				$in['nama_cabang'] = $this->input->post("nama_cabang");
                $in['visi_misi'] = $this->input->post("visi_misi");
                $in['alamat'] = $this->input->post("alamat");
                $in['email'] = $this->input->post("email");
				
				$this->db->update("dlmbg_cabang_profil",$in,$id);
			}
			
			redirect("superadmin/cabang");
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
			$sess['by_nama'] = $this->input->post("by_nama");
			$this->session->set_userdata($sess);
			redirect("superadmin/cabang");
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
			$where['id_cabang_profil'] = $id_param;
			$this->db->delete("dlmbg_cabang_profil",$where);
			redirect("superadmin/cabang");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
