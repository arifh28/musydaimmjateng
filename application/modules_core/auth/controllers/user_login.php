<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_login extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index()
   {
      if($this->session->userdata("logged_in")=="")
	  {
		  $d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
		  $d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');



		  $d['dt_formatur_cabang'] = $this->app_global_model->generate_menu_formatur_cabang($_SESSION['limit_footer_formatur_cabang'],0);

	
		  $this->breadcrumb->append_crumb('Beranda', base_url());
		  $this->breadcrumb->append_crumb('User Login', '/');
		  
		  $this->form_validation->set_rules('username', 'Username', 'trim|required');
		  $this->form_validation->set_rules('password', 'Password', 'trim|required');
		  $this->form_validation->set_rules('log_as', 'Log In Sebagai', 'trim|required');
		  
		  if ($this->form_validation->run() == FALSE)
		  {
			  $this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			  if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			  $this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			  $this->load->view($_SESSION['site_theme'].'/user_login/bg_home');
			  $this->load->view($_SESSION['site_theme'].'/bg_footer');
		  }
		  else
		  {
				$data['username']	=	$this->input->post("username");
				$data['password']	=	$this->input->post("password");
				$data['tipe']		=	$this->input->post("log_as");
				
				$this->app_user_login_model->cekUserLogin($data);
		  }
		}
		else
		{
			redirect("operator/dashboard");
		}
   }
   
   function logout()
   {
   		$this->session->sess_destroy();
		redirect("web");
   }
}
 
/* End of file web.php */
