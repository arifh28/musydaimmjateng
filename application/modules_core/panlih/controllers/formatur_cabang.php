<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class formatur_cabang extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="panlih")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'panlih');
			$this->breadcrumb->append_crumb("Formatur Cabang", '/');
			
			$d['aktif_formatur_cabang'] = "active";

			$d['aktif_pesan_musyda'] = "";

			
			$filter['nama'] = $this->session->userdata("by_nama");
			$d['data_retrieve'] = $this->app_global_panlih_model->generate_index_formatur_cabang($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('formatur_cabang/bg_home');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }

    public function detail($id_param,$uri=0)
    {
        if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="panlih")
        {
            $where['id_cabang_profil'] = $id_param;
            $get = $this->db->get_where("dlmbg_cabang_profil",$where)->row();

            $this->breadcrumb->append_crumb('Dashboard', base_url().'panlih');
            $this->breadcrumb->append_crumb("Formatur Cabang", base_url().'panlih/formatur_cabang');
            $this->breadcrumb->append_crumb($get->nama_cabang, '/');

            $d['data_retrieve'] = $this->app_global_panlih_model->generate_index_foto_formatur_cabang($id_param,$this->config->item("limit_item"),$uri);

            $this->load->view('bg_header',$d);
            $this->load->view('formatur_cabang/bg_detail');
            $this->load->view('bg_footer');
        }
        else
        {
            redirect("auth/user_login");
        }
    }

	public function set()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="panlih")
		{
			$sess['by_nama'] = $this->input->post("by_nama");
			$this->session->set_userdata($sess);
			redirect("panlih/formatur_cabang");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_param,$file)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="panlih")
		{
			$path = "./asset/images/formatur-cabang/thumb/".$file."";
			unlink($path);
			$where['id_cabang_formatur'] = $id_param;
			$this->db->delete("dlmbg_cabang_formatur",$where);
			redirect("panlih/formatur_cabang");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function approve($id_param,$value)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="panlih")
		{
			$id['id_cabang_formatur'] = $id_param;
			$up['stts'] = $value;
			$this->db->update("dlmbg_cabang_formatur",$up,$id);
			redirect("panlih/formatur_cabang");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file panlih.php */