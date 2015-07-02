<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_kader extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
	public function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'operator/dashboard');
			$this->breadcrumb->append_crumb("Data Peserta Musyda", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_formatur_cabang'] = $this->app_global_model->generate_menu_formatur_cabang($_SESSION['limit_footer_formatur_cabang'],0);
			
			$filter['nama'] = $this->session->userdata("by_nama");
			$d['dt_data_kader'] = $this->app_global_operator_model->generate_index_kader($this->config->item("limit_item_medium"),$uri,$filter);
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/operator/data_kader/bg_home');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
	}
 
	public function tambah()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'operator/dashboard');
			$this->breadcrumb->append_crumb("Data Peserta", base_url().'operator/data_komisariat');
			$this->breadcrumb->append_crumb("Tambah Data", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_formatur_cabang'] = $this->app_global_model->generate_menu_formatur_cabang($_SESSION['limit_footer_formatur_cabang'],0);

			
			$d['nama'] = "";
            $d['wan_wati'] = "";
			$d['komisariat'] = "";
			$d['no_hp'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/operator/data_kader/bg_input');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
   }
 
	public function edit($id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'operator/dashboard');
			$this->breadcrumb->append_crumb("Data Peserta Didik", base_url().'operator/data_kader');
			$this->breadcrumb->append_crumb("Edit Data", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_formatur_cabang'] = $this->app_global_model->generate_menu_formatur_cabang($_SESSION['limit_footer_formatur_cabang'],0);

			$where['id_cabang_kader'] = $id_param;
			$where['id_cabang'] = $this->session->userdata("id_cabang");
			$get = $this->db->get_where("dlmbg_cabang_kader",$where)->row();
			
			$d['nama'] = $get->nama;
            $d['wan_wati'] = $get->wan_wati;
			$d['komisariat'] = $get->komisariat;
			$d['no_hp'] = $get->no_hp;
			
			$d['id_param'] = $get->id_cabang_kader;
			$d['tipe'] = "edit";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/operator/data_kader/bg_input');
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
			$tipe = $this->input->post("tipe");
			$id['id_cabang_kader'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama'] = $this->input->post("nama");
                $in['wan_wati'] = $this->input->post("wan_wati");
				$in['komisariat'] = $this->input->post("komisariat");
				$in['no_hp'] = $this->input->post("no_hp");
				$in['id_cabang'] = $this->input->post("id_cabang");
				
				$this->db->insert("dlmbg_cabang_kader",$in);
			}
			else if($tipe=="edit")
			{
				$in['nama'] = $this->input->post("nama");
                $in['wan_wati'] = $this->input->post("wan_wati");
				$in['komisariat'] = $this->input->post("komisariat");
				$in['no_hp'] = $this->input->post("no_hp");
				$in['id_cabang'] = $this->input->post("id_cabang");
				
				$this->db->update("dlmbg_cabang_kader",$in,$id);
			}
			
			redirect("operator/data_kader");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function set()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$sess['by_nama'] = $this->input->post("by_nama");
			$this->session->set_userdata($sess);
			redirect("operator/data_kader");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$where['id_cabang_kader'] = $id_param;
			$where['id_cabang'] = $this->session->userdata("id_cabang");
			$this->db->delete("dlmbg_cabang_kader",$where);
			redirect("operator/data_kader");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file berita.php */
