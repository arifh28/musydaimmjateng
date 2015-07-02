<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_config_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 * @keterangan : Model untuk melakukan konfigurasi sistem
	 **/
	 
	//query login
	public function __construct()
	{
		$dt = $this->db->get("dlmbg_setting");
		$i = 1;
		foreach($dt->result() as $d)
		{
			$_SESSION['konfig_app_'.$i] = $d->content_setting;
			$i++;
		}
		$_SESSION['site_title'] = $_SESSION['konfig_app_1'];
		$_SESSION['site_footer'] = $_SESSION['konfig_app_2'];
		$_SESSION['site_tema'] = $_SESSION['konfig_app_3'];
		$_SESSION['site_slider'] = $_SESSION['konfig_app_4'];
		$_SESSION['site_slider_always'] = $_SESSION['konfig_app_5'];
		$_SESSION['site_theme'] = $_SESSION['konfig_app_6'];
		$st['stts'] = 0;
		$_SESSION['count_formatur_cabang'] = $this->db->get_where("dlmbg_cabang_formatur",$st)->num_rows();
		$_SESSION['count_pesan_musyda'] = $this->db->get_where("dlmbg_super_pesan_musyda",$st)->num_rows();

	}
}

/* End of file app_load_config_model.php */
/* Location: ./application/models/app_load_config_model.php */