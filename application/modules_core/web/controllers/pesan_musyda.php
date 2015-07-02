<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pesan_musyda extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
	public function index($uri=0)
	{
		$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
		$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');

		$d['dt_formatur_cabang'] = $this->app_global_model->generate_menu_formatur_cabang($_SESSION['limit_footer_formatur_cabang'],0);


		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('kontak', 'Kontak', 'trim|required');
		$this->form_validation->set_rules('pesan', 'Pesan', 'trim|required');
		$this->form_validation->set_rules('captcha', 'Captcha', 'trim|required');
		
		$in['nama'] = $this->input->post("nama");
		$in['kontak'] = $this->input->post("kontak");
		$in['pesan'] = $this->input->post("pesan");
		$in['tanggal'] = time()+3600*7;
		$in['stts'] = 0;
		
		if ($this->form_validation->run() == FALSE)
		{
			$d['dt_index_pesan_musyda'] = $this->app_global_model->generate_index_pesan_musyda($this->config->item('limit_item'),$uri);
			$d['dt_captcha'] = $this->app_global_model->generate_captcha();
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');

			$this->load->view($_SESSION['site_theme'].'/pesan_musyda/bg_home');

			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			$expiration = time()-3600;
			$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
			
			$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND captcha_time > ?";
			$binds = array($_POST['captcha'], $expiration);
			$query = $this->db->query($sql, $binds);
			$row = $query->row();
			
			if ($row->count == 0)
			{
				$this->session->set_flashdata('result_insert', 'Captcha tidak valid');
				redirect("web/pesan_musyda");
			}
			else
			{
				$this->db->insert("dlmbg_super_pesan_musyda",$in);
				$this->session->set_flashdata('result_insert', 'Data berhasil dikirim dan akan kami moderisasi');
				redirect("web/pesan_musyda");
			}
		}
	}
}
 
/* End of file berita.php */
