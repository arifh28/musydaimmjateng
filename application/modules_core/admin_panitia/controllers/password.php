<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class password extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
	public function index()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_panitia")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'admin_panitia/dashboard');
			$this->breadcrumb->append_crumb("Password User", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');


			$d['username'] = $this->session->userdata("username");
			$d['id_param'] = $this->session->userdata("id_admin_panitia");
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/admin_panitia/password/bg_home');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
	}
 
	public function simpan()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_panitia")
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
				$id['id_admin_panitia'] = $this->input->post("id_param");
				$id['username_admin_panitia'] = $this->input->post("username");
				
				$password_lama = $this->input->post("password_lama");
				$password_baru = mysql_real_escape_string($this->input->post("password_baru"));
				$ulangi_password = mysql_real_escape_string($this->input->post("ulangi_password"));
				
				$encrypt = md5(mysql_real_escape_string($password_lama).$this->config->item("key_login"));
				$cek['username_admin_panitia'] 	= $id['username_admin_panitia'];
				$cek['password'] 	= $encrypt;
				$q_cek_login = $this->db->get_where('dlmbg_admin_panitia', $cek);
				if(count($q_cek_login->result())>0)
				{
					if($password_baru!=$ulangi_password)
					{
						$this->session->set_flashdata("result_login","Password baru tidak sama");
						redirect("admin_panitia/password");
					}
					else
					{
						$up['password'] = md5(mysql_real_escape_string($password_baru).$this->config->item("key_login"));
						$this->db->update("dlmbg_admin_panitia",$up,$id);
						$this->session->set_flashdata("result_login","Password berhasil diperbaharui");
						redirect("admin_panitia/password");
					}
				}
				else
				{
					$this->session->set_flashdata("result_login","Password lama tidak cocok");
					redirect("admin_panitia/password");
				}
			}
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file berita.php */
