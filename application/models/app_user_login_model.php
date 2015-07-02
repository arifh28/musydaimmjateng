<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_user_login_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 * @keterangan : Model untuk manajemen user login
	 **/
	 
	public function cekUserLogin($data)
	{
		$tipe 				= $data['tipe'];
		
		if($tipe=="operator")
		{
			$cek['username'] 	= mysql_real_escape_string($data['username']);
			$cek['password'] 	= md5(mysql_real_escape_string($data['password']).$this->config->item("key_login"));
			$q_cek_login = $this->db->get_where('dlmbg_admin_cabang', $cek);
			if(count($q_cek_login->result())>0)
			{
				foreach($q_cek_login->result() as $qad)
				{
					$sess_data['logged_in'] = 'yesGetMeLoginBaby';
					$sess_data['nama_user_login'] = $qad->nama_operator;
					$sess_data['id_cabang'] = $qad->id_cabang;
					$sess_data['username'] = $qad->username;
					$sess_data['email'] = $qad->email;
					$sess_data['id_admin_cabang'] = $qad->id_admin_cabang;
					$sess_data['tipe_user'] = $tipe;
					$get_p_cabang = $this->db->get_where("dlmbg_cabang_profil",array("id_cabang_profil"=>$qad->id_cabang))->row();
					$sess_data['nama_cabang'] = $get_p_cabang->nama_cabang;
					$this->session->set_userdata($sess_data);
				}
				redirect("operator/dashboard");
			}
			else
			{
				$this->session->set_flashdata("result_login","Gagal masuk. Username dan password tidak benar. Silahkan ulangi lagi.");
				redirect("auth/user_login");
			}
		}
		
		else if($tipe=="admin_panitia")
		{
			$cek['username_admin_panitia'] 	= mysql_real_escape_string($data['username']);
			$cek['password'] 	= md5(mysql_real_escape_string($data['password']).$this->config->item("key_login"));
			$q_cek_login = $this->db->get_where('dlmbg_admin_panitia', $cek);
			if(count($q_cek_login->result())>0)
			{
				foreach($q_cek_login->result() as $qad)
				{
					$sess_data['logged_in'] = 'yesGetMeLoginBaby';
					$sess_data['nama_user_login'] = $qad->nama_admin_panitia;
                    $sess_data['wan_wati'] = $qad->wan_wati;
					$sess_data['username'] = $qad->username_admin_panitia;
					$sess_data['id_admin_panitia'] = $qad->id_admin_panitia;
					$sess_data['tipe_user'] = $tipe;

					$this->session->set_userdata($sess_data);
				}
				redirect("admin_panitia/dashboard");
			}
			else
			{
				$this->session->set_flashdata("result_login","Gagal masuk. Username dan password tidak benar. Silahkan ulangi lagi.");
				redirect("auth/user_login");
			}
		}
		
		else if($tipe=="superadmin")
		{
			$cek['username_super_admin'] 	= mysql_real_escape_string($data['username']);
			$cek['password'] 	= md5(mysql_real_escape_string($data['password']).$this->config->item("key_login"));
			$q_cek_login = $this->db->get_where('dlmbg_admin_super', $cek);
			if(count($q_cek_login->result())>0)
			{
				foreach($q_cek_login->result() as $qad)
				{
					$sess_data['logged_in'] = 'yesGetMeLoginBaby';
					$sess_data['nama_user_login'] = $qad->nama_super_admin;
					$sess_data['username'] = $qad->username_super_admin;
					$sess_data['id_admin_super'] = $qad->id_admin_super;
					$sess_data['tipe_user'] = $tipe;
					
					$this->session->set_userdata($sess_data);
				}
				redirect("superadmin");
			}
			else
			{
				$this->session->set_flashdata("result_login","Gagal Login. Username dan Password Tidak Cocok....");
				redirect("auth/user_login");
			}
		}

        else if($tipe=="panlih")
        {
            $cek['username_panlih_admin'] 	= mysql_real_escape_string($data['username']);
            $cek['password'] 	= md5(mysql_real_escape_string($data['password']).$this->config->item("key_login"));
            $q_cek_login = $this->db->get_where('dlmbg_admin_panlih', $cek);
            if(count($q_cek_login->result())>0)
            {
                foreach($q_cek_login->result() as $qad)
                {
                    $sess_data['logged_in'] = 'yesGetMeLoginBaby';
                    $sess_data['nama_user_login'] = $qad->nama_panlih_admin;
                    $sess_data['username'] = $qad->username_panlih_admin;
                    $sess_data['id_admin_panlih'] = $qad->id_admin_panlih;
                    $sess_data['tipe_user'] = $tipe;

                    $this->session->set_userdata($sess_data);
                }
                redirect("panlih");
            }
            else
            {
                $this->session->set_flashdata("result_login","Gagal Login. Username dan Password Tidak Cocok....");
                redirect("auth/user_login");
            }
        }
	}
}

/* End of file app_user_login_model.php */
/* Location: ./application/models/app_user_login_model.php */