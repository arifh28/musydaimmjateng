<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profil_cabang extends MX_Controller {

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
			$this->breadcrumb->append_crumb("Profil Cabang", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');


			
			$id['id_cabang_profil'] = $this->session->userdata("id_cabang");
			$get = $this->db->get_where("dlmbg_cabang_profil",$id)->row();
			$d['id_param'] = $get->id_cabang_profil;
			$d['nama_cabang'] = $get->nama_cabang;
			$d['visi_misi'] = $get->visi_misi;
			$d['alamat'] = $get->alamat;
			$d['email'] = $get->email;
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/operator/profil_cabang/bg_home');
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

			$this->form_validation->set_rules('nama_cabang', 'Nama Sekolah', 'trim|required');

			$this->form_validation->set_rules('visi_misi', 'Visi Misi', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->index();
			}
			else
			{
				$id['id_cabang_profil'] = $this->input->post("id_param");
				

				$up['nama_cabang'] = $this->input->post("nama_cabang");
				$up['visi_misi'] = $this->input->post("visi_misi");
				$up['alamat'] = $this->input->post("alamat");
				$up['email'] = $this->input->post("email");
				
				$this->db->update("dlmbg_cabang_profil",$up,$id);
				$this->session->set_flashdata("result_login","Data berhasil diperbaharui");
				redirect("operator/profil_cabang");
				
			}
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file berita.php */
