<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class password extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
	public function index()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'operator/dashboard');
			$this->breadcrumb->append_crumb("Password User", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_formatur_cabang'] = $this->app_global_model->generate_menu_formatur_cabang($_SESSION['limit_footer_formatur_cabang'],0);

			
			$d['username'] = $this->session->userdata("username");
			$d['id_param'] = $this->session->userdata("id_admin_cabang");
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/operator/password/bg_home');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
	}
 
	public function simpan()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
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
				$id['id_admin_cabang'] = $this->input->post("id_param");
				$id['username'] = $this->input->post("username");
				
				$password_lama = $this->input->post("password_lama");
				$password_baru = mysql_real_escape_string($this->input->post("password_baru"));
				$ulangi_password = mysql_real_escape_string($this->input->post("ulangi_password"));
				
				$encrypt = md5(mysql_real_escape_string($password_lama).$this->config->item("key_login"));
				$cek['username'] 	= $id['username'];
				$cek['password'] 	= $encrypt;
				$q_cek_login = $this->db->get_where('dlmbg_admin_cabang', $cek);
				if(count($q_cek_login->result())>0)
				{
					if($password_baru!=$ulangi_password)
					{
						$this->session->set_flashdata("result_login","Password baru tidak sama");
						redirect("operator/password");
					}
					else
					{
						$up['password'] = md5(mysql_real_escape_string($password_baru).$this->config->item("key_login"));
						$this->db->update("dlmbg_admin_cabang",$up,$id);
						$this->session->set_flashdata("result_login","Password berhasil diperbaharui");
						redirect("operator/password");
					}
				}
				else
				{
					$this->session->set_flashdata("result_login","Password lama tidak cocok");
					redirect("operator/password");
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
