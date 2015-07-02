<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class panlih extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index()
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="panlih")
		{
			$d['aktif_formatur_cabang'] = "";
			$d['aktif_mandat_cabang'] = "";
			$d['aktif_berita'] = "";


			$d['aktif_pesan_musyda'] = "";
			$d['aktif_list_download'] = "";
			
			$this->load->view('bg_header',$d);
			$this->load->view('bg_home');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
}
 
/* End of file panlih.php */
