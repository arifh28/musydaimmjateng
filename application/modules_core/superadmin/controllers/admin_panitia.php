<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_panitia extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Admin Dinas", '/');
			
			$d['aktif_formatur_cabang'] = "";
			$d['aktif_pesan_musyda'] = "";

			$filter['nama_admin_panitia'] = $this->session->userdata("by_nama");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_admin_panitia($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('admin_panitia/bg_home');
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
			$this->breadcrumb->append_crumb("Admin Dinas", base_url().'superadmin/admin_panitia');
			$this->breadcrumb->append_crumb("Input Admin Dinas", '/');
			
			$d['aktif_formatur_cabang'] = "";
			$d['aktif_pesan_musyda'] = "";

			
			$d['nama_admin_panitia'] = "";
			$d['username_admin_panitia'] = "";

			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('admin_panitia/bg_input');
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
			$this->breadcrumb->append_crumb("Admin Dinas", base_url().'superadmin/admin_panitia');
			$this->breadcrumb->append_crumb("Update Admin Dinas", '/');

			$d['aktif_formatur_cabang'] = "";
			$d['aktif_pesan_musyda'] = "";

			$where['id_admin_panitia'] = $id_param;
			$get = $this->db->get_where("dlmbg_admin_panitia",$where)->row();
			
			$d['nama_admin_panitia'] = $get->nama_admin_panitia;
			$d['username_admin_panitia'] = $get->username_admin_panitia;

			$d['id_param'] = $get->id_admin_panitia;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('admin_panitia/bg_input');
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
			$id['id_admin_panitia'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$cek = $this->db->get_where("dlmbg_admin_panitia",array("username_admin_panitia"=>$this->input->post("username_admin_panitia")))->num_rows();
				if($cek>0)
				{
					$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya");
					redirect("superadmin/admin_panitia/tambah");
				}
				else
				{
					$in['nama_admin_panitia'] = $this->input->post("nama_admin_panitia");
					$in['username_admin_panitia'] = $this->input->post("username_admin_panitia");
					$in['password'] = md5($this->input->post("password").$this->config->item("key_login"));

					$this->db->insert("dlmbg_admin_panitia",$in);
					redirect("superadmin/admin_panitia");
				}
			}
			else if($tipe=="edit")
			{	
				if($_POST['password']!="")
				{
					$cek = $this->db->get_where("dlmbg_admin_panitia",array("username_admin_panitia"=>$this->input->post("username_admin_panitia")))->num_rows();
					if($cek>0 && $this->input->post("username_temp")!=$this->input->post("username_admin_panitia"))
					{
						$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya atau tetap gunakan username ini");
						redirect("superadmin/admin_panitia/edit/".$id['id_admin_panitia']."");
					}
					else
					{
						$in['nama_admin_panitia'] = $this->input->post("nama_admin_panitia");
						$in['username_admin_panitia'] = $this->input->post("username_admin_panitia");
						$in['password'] = md5($this->input->post("password").$this->config->item("key_login"));

						$this->db->update("dlmbg_admin_panitia",$in,$id);
						redirect("superadmin/admin_panitia");
					}
				}
				else
				{
					$cek = $this->db->get_where("dlmbg_admin_panitia",array("username_admin_panitia"=>$this->input->post("username_admin_panitia")))->num_rows();
					if($cek>0 && $this->input->post("username_temp")!=$this->input->post("username_admin_panitia"))
					{
						$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya atau tetap gunakan username ini");
						redirect("superadmin/admin_panitia/edit/".$id['id_admin_panitia']."");
					}
					else
					{
						$in['nama_admin_panitia'] = $this->input->post("nama_admin_panitia");
						$in['username_admin_panitia'] = $this->input->post("username_admin_panitia");

						$this->db->update("dlmbg_admin_panitia",$in,$id);
						redirect("superadmin/admin_panitia");
					}
				}
			}
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
			$sess['nama_admin_panitia'] = $this->input->post("by_nama");
			$this->session->set_userdata($sess);
			redirect("superadmin/admin_panitia");
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
			$where['id_admin_panitia'] = $id_param;
			$this->db->delete("dlmbg_admin_panitia",$where);
			redirect("superadmin/admin_panitia");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */