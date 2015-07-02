<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class operator extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("Operator", '/');
			
			$d['aktif_formatur_cabang'] = "";
			$d['aktif_mandat_cabang'] = "";
			$d['aktif_berita'] = "";


			$d['aktif_pesan_musyda'] = "";
			$d['aktif_list_download'] = "";
			
			$filter['nama_operator'] = $this->session->userdata("nama_operator");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_operator($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('operator/bg_home');
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
			$this->breadcrumb->append_crumb("Operator", base_url().'superadmin/operator');
			$this->breadcrumb->append_crumb("Input Operator", '/');
			
			$d['aktif_formatur_cabang'] = "";
			$d['aktif_mandat_cabang'] = "";
			$d['aktif_berita'] = "";


			$d['aktif_pesan_musyda'] = "";
			$d['aktif_list_download'] = "";
			
			$d['cabang'] = $this->db->get("dlmbg_cabang_profil");
			
			$d['id_cabang'] = "";
			$d['nama_operator'] = "";
			$d['username'] = "";
			$d['password'] = "";
			$d['email'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('operator/bg_input');
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
			$this->breadcrumb->append_crumb("Operator", base_url().'superadmin/operator');
			$this->breadcrumb->append_crumb("Update Operator", '/');
			
			$d['aktif_formatur_cabang'] = "";
			$d['aktif_mandat_cabang'] = "";
			$d['aktif_berita'] = "";


			$d['aktif_pesan_musyda'] = "";
			$d['aktif_list_download'] = "";
			
			$where['id_admin_cabang'] = $id_param;
			$get = $this->db->get_where("dlmbg_admin_cabang",$where)->row();
			
			$d['cabang'] = $this->db->get("dlmbg_cabang_profil");
			
			$d['id_cabang'] = $get->id_cabang;
			$d['nama_operator'] = $get->nama_operator;
			$d['username'] = $get->username;
			$d['password'] = $get->password;
			$d['email'] = $get->email;
			
			$d['id_param'] = $get->id_admin_cabang;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('operator/bg_input');
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
			$id['id_admin_cabang'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$cek = $this->db->get_where("dlmbg_admin_cabang",array("username"=>$this->input->post("username")))->num_rows();
				if($cek>0)
				{
					$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya");
					redirect("superadmin/operator/tambah");
				}
				else
				{
					$in['nama_operator'] = $this->input->post("nama_operator");
					$in['username'] = $this->input->post("username");
					$in['password'] = md5($this->input->post("password").$this->config->item("key_login"));
					$in['id_cabang'] = $this->input->post("id_cabang");
					$in['email'] = $this->input->post("email");
					
					$this->db->insert("dlmbg_admin_cabang",$in);
					redirect("superadmin/operator");
				}
			}
			else if($tipe=="edit")
			{	
				if($_POST['password']!="")
				{
					$cek = $this->db->get_where("dlmbg_admin_cabang",array("username"=>$this->input->post("username")))->num_rows();
					if($cek>0 && $this->input->post("username_temp")!=$this->input->post("username"))
					{
						$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya atau tetap gunakan username ini");
						redirect("superadmin/operator/edit/".$id['id_admin_cabang']."");
					}
					else
					{
						$in['nama_operator'] = $this->input->post("nama_operator");
						$in['username'] = $this->input->post("username");
						$in['password'] = md5($this->input->post("password").$this->config->item("key_login"));
						$in['id_cabang'] = $this->input->post("id_cabang");
						$in['email'] = $this->input->post("email");
					
						$this->db->update("dlmbg_admin_cabang",$in,$id);
						redirect("superadmin/operator");
					}
				}
				else
				{
					$cek = $this->db->get_where("dlmbg_admin_cabang",array("username"=>$this->input->post("username")))->num_rows();
					if($cek>0 && $this->input->post("username_temp")!=$this->input->post("username"))
					{
						$this->session->set_flashdata("simpan_akun","Username telah terpakai, gunakan username lainnya atau tetap gunakan username ini");
						redirect("superadmin/operator/edit/".$id['id_admin_cabang']."");
					}
					else
					{
						$in['nama_operator'] = $this->input->post("nama_operator");
						$in['username'] = $this->input->post("username");
						$in['id_cabang'] = $this->input->post("id_cabang");
						$in['email'] = $this->input->post("email");
					
						$this->db->update("dlmbg_admin_cabang",$in,$id);
						redirect("superadmin/operator");
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
			$sess['nama_operator'] = $this->input->post("by_nama");
			$this->session->set_userdata($sess);
			redirect("superadmin/operator");
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
			$where['id_admin_cabang'] = $id_param;
			$this->db->delete("dlmbg_admin_cabang",$where);
			redirect("superadmin/operator");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
