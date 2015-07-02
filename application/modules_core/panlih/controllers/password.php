<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class password extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	 
   public function index()
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="panlih")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'panlih');
			$this->breadcrumb->append_crumb("Password User", '/');
			
			$d['aktif_formatur_cabang'] = "";
			$d['aktif_mandat_cabang'] = "";
			$d['aktif_berita'] = "";


			$d['aktif_pesan_musyda'] = "";
			$d['aktif_list_download'] = "";
			
			$where['id_admin_panlih'] = $this->session->userdata("id_admin_panlih");
			$get = $this->db->get_where("dlmbg_admin_panlih",$where)->row();
			
			$d['username_panlih_admin'] = $get->username_panlih_admin;
			
			$d['id_param'] = $get->id_admin_panlih;
			
			$this->load->view('bg_header',$d);
			$this->load->view('password/bg_home');
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
			$this->form_validation->set_rules('password_lama', 'Password Lama', 'trim|required');
			$this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required');
			$this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'trim|required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->index();
			}
			else
			{
				$id['id_admin_panlih'] = $this->input->post("id_param");
				$id['username_panlih_admin'] = $this->input->post("username");
				
				$password_lama = $this->input->post("password_lama");
				$password_baru = mysql_real_escape_string($this->input->post("password_baru"));
				$ulangi_password = mysql_real_escape_string($this->input->post("ulangi_password"));
				
				$encrypt = md5(mysql_real_escape_string($password_lama).$this->config->item("key_login"));
				$cek['username_panlih_admin'] 	= $id['username_panlih_admin'];
				$cek['password'] 	= $encrypt;
				$q_cek_login = $this->db->get_where('dlmbg_admin_panlih', $cek);
				if(count($q_cek_login->result())>0)
				{
					if($password_baru!=$ulangi_password)
					{
						$this->session->set_flashdata("simpan_akun","Password baru tidak sama");
						redirect("panlih/password");
					}
					else
					{
						$up['password'] = md5(mysql_real_escape_string($password_baru).$this->config->item("key_login"));
						$this->db->update("dlmbg_admin_panlih",$up,$id);
						$this->session->set_flashdata("simpan_akun","Password berhasil diperbaharui");
						redirect("panlih/password");
					}
				}
				else
				{
					$this->session->set_flashdata("simpan_akun","Password lama tidak cocok");
					redirect("panlih/password");
				}
			
			}
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
}
 
/* End of file panlih.php */
