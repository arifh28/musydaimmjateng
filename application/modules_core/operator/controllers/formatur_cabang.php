<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class formatur_cabang extends MX_Controller {

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
			$this->breadcrumb->append_crumb("Formatur Cabang", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_formatur_cabang'] = $this->app_global_model->generate_menu_formatur_cabang($_SESSION['limit_footer_formatur_cabang'],0);

			$filter['nama'] = $this->session->userdata("by_nama");
			$d['dt_data_formatur_cabang'] = $this->app_global_operator_model->generate_index_formatur_cabang($this->config->item("limit_item_big"),$uri,$filter);
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/operator/formatur_cabang/bg_home');
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
			$this->breadcrumb->append_crumb("Formatur Cabang", base_url().'operator/formatur_cabang');
			$this->breadcrumb->append_crumb("Tambah Data", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_formatur_cabang'] = $this->app_global_model->generate_menu_formatur_cabang($_SESSION['limit_footer_formatur_cabang'],0);

			$d['nama'] = "";
			$d['wan_wati'] = "";
            $d['tgl_lahir'] = "";
            $d['no_hp'] = "";
            $d['asal_komisariat'] = "";
            $d['tempat_dad'] = "";
            $d['tahun_dad'] = "";
            $d['tempat_dam'] = "";
            $d['tahun_dam'] = "";
            $d['utk_imm'] = "";
			$d['gambar'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/operator/formatur_cabang/bg_input');
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
			$this->breadcrumb->append_crumb("Formatur Cabang", base_url().'operator/formatur_cabang');
			$this->breadcrumb->append_crumb("Edit Data", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_formatur_cabang'] = $this->app_global_model->generate_menu_formatur_cabang($_SESSION['limit_footer_formatur_cabang'],0);

			$where['id_cabang_formatur'] = $id_param;
			$where['id_cabang_profil'] = $this->session->userdata("id_cabang");
			$get = $this->db->get_where("dlmbg_cabang_formatur",$where)->row();
			
			$d['nama'] = $get->nama;
            $d['wan_wati'] = $get->wan_wati;
            $d['tgl_lahir'] = $get->tgl_lahir;
            $d['no_hp'] = $get->no_hp;
            $d['asal_komisariat'] = $get->asal_komisariat;
            $d['tempat_dad'] = $get->tempat_dad;
            $d['tahun_dad'] = $get->tahun_dad;
            $d['tempat_dam'] = $get->tempat_dam;
            $d['tahun_dam'] = $get->tahun_dam;
            $d['utk_imm'] = $get->utk_imm;
			$d['gambar'] = $get->gambar;
			
			$d['id_param'] = $get->id_cabang_formatur;
			$d['tipe'] = "edit";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/operator/formatur_cabang/bg_input');
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
			$id['id_cabang_formatur'] = $this->input->post("id_param");
			$id['id_cabang_profil'] = $this->session->userdata("id_cabang");
			
			if($tipe=="tambah")
			{
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('utk_imm', 'Untuk IMM', 'trim|required');
				
				if ($this->form_validation->run() == FALSE)
				{
					$this->tambah();
				}
				else
				{
					$config['upload_path'] = './asset/images/formatur-cabang/';
					$config['allowed_types']= 'zip|rar|7zip|tar.gz';
					$config['encrypt_name']	= FALSE;
					$config['overwrite']	= TRUE;
					$config['remove_spaces']	= FALSE;
					$config['max_size']     = '10000';


					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();

						/* PATH */
						$source             = "./asset/images/formatur-cabang/".$data['file_name'] ;
						$destination_thumb	= "./asset/images/formatur-cabang/thumb/" ;
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;

						/// Limit Width Resize
						$limit_thumb    = 640 ;

						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_thumb  = $limit_thumb/$limit_use ;
						}

						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;

						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['gambar'] = $data['file_name'];
						$in_data['nama'] = $this->input->post("nama");
                        $in_data['wan_wati'] = $this->input->post("wan_wati");
                        $in_data['tgl_lahir'] = $this->input->post("tgl_lahir");
                        $in_data['no_hp'] = $this->input->post("no_hp");
                        $in_data['asal_komisariat'] = $this->input->post("asal_komisariat");
                        $in_data['tempat_dad'] = $this->input->post("tempat_dad");
                        $in_data['tahun_dad'] = $this->input->post("tahun_dad");
                        $in_data['tempat_dam'] = $this->input->post("tempat_dam");
                        $in_data['tahun_dam'] = $this->input->post("tahun_dam");
						$in_data['utk_imm'] = $this->input->post("utk_imm");
						$in_data['id_admin_cabang'] = $this->session->userdata("id_admin_cabang");
						$in_data['id_cabang_profil'] = $this->session->userdata("id_cabang");
						$in_data['tanggal'] = time()+3600*7;;
						$in_data['stts'] = "0";
						$this->db->insert("dlmbg_cabang_formatur",$in_data);

				
						unlink($source);
						
						redirect("operator/formatur_cabang");
						
					}
					else 
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
				}
			}
			else if($tipe=="edit")
			{
				if(empty($_FILES['userfile']['name']))
				{
                    $in_data['nama'] = $this->input->post("nama");
                    $in_data['wan_wati'] = $this->input->post("wan_wati");
                    $in_data['tgl_lahir'] = $this->input->post("tgl_lahir");
                    $in_data['no_hp'] = $this->input->post("no_hp");
                    $in_data['asal_komisariat'] = $this->input->post("asal_komisariat");
                    $in_data['tempat_dad'] = $this->input->post("tempat_dad");
                    $in_data['tahun_dad'] = $this->input->post("tahun_dad");
                    $in_data['tempat_dam'] = $this->input->post("tempat_dam");
                    $in_data['tahun_dam'] = $this->input->post("tahun_dam");
                    $in_data['utk_imm'] = $this->input->post("utk_imm");
                    $in_data['id_admin_cabang'] = $this->session->userdata("id_admin_cabang");
					$in_data['id_cabang_profil'] = $this->session->userdata("id_cabang");
					$this->db->update("dlmbg_cabang_formatur",$in_data,$id);
					redirect("operator/formatur_cabang");
				}
				else
				{
					$config['upload_path'] = './asset/images/formatur-cabang/';
					$config['allowed_types']= 'zip|rar|7zip|tar.gz';
					$config['encrypt_name']	= FALSE;
					$config['remove_spaces']	= FALSE;
					$config['max_size']     = '3000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./asset/images/formatur-cabang/".$data['file_name'] ;
						$destination_thumb	= "./asset/images/formatur-cabang/thumb/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;

						/// Limit Width Resize
						$limit_thumb    = 640 ;

						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_thumb  = $limit_thumb/$limit_use ;
						}

						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;

						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;

						$in_data['gambar'] = $data['file_name'];
                        $in_data['nama'] = $this->input->post("nama");
                        $in_data['wan_wati'] = $this->input->post("wan_wati");
                        $in_data['tgl_lahir'] = $this->input->post("tgl_lahir");
                        $in_data['no_hp'] = $this->input->post("no_hp");
                        $in_data['asal_komisariat'] = $this->input->post("asal_komisariat");
                        $in_data['tempat_dad'] = $this->input->post("tempat_dad");
                        $in_data['tahun_dad'] = $this->input->post("tahun_dad");
                        $in_data['tempat_dam'] = $this->input->post("tempat_dam");
                        $in_data['tahun_dam'] = $this->input->post("tahun_dam");
                        $in_data['utk_imm'] = $this->input->post("utk_imm");
                        $this->db->update("dlmbg_cabang_formatur",$in_data,$id);
				
						$old_thumb	= "./asset/images/formatur-cabang/thumb/".$this->input->post("gambar")."" ;
						unlink($source);
						unlink($old_thumb);
						
						redirect("operator/formatur_cabang");
						
					}
					else 
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
				}
			}
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
			redirect("operator/formatur_cabang");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_param,$file)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$path = "./asset/images/formatur-cabang/thumb/".$file."";
			unlink($path);
			$where['id_cabang_formatur'] = $id_param;
			$where['id_cabang_profil'] = $this->session->userdata("id_cabang");
			$this->db->delete("dlmbg_cabang_formatur",$where);
			redirect("operator/formatur_cabang");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file berita.php */
