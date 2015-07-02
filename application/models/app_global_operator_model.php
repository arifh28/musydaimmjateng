<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_operator_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	public function generate_captcha()
	{
		$vals = array(
			'img_path' => './captcha/',
			'img_url' => base_url().'captcha/',
			'font_path' => './system/fonts/impact.ttf',
			'img_width' => '150',
			'img_height' => 40
			);
		$cap = create_captcha($vals);
		$datamasuk = array(
			'captcha_time' => $cap['time'],
			//'ip_address' => $this->input->ip_address(),
			'word' => $cap['word']
			);
		$expiration = time()-3600;
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
		$query = $this->db->insert_string('captcha', $datamasuk);
		$this->db->query($query);
		return $cap['image'];
	}
	 
	public function generate_index_kader($limit,$offset,$filter=array())
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['nama']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['nama'] = $filter['nama']; 
				$query_add = "and a.nama like '%".$where['nama']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.nama, a.wan_wati, a.komisariat, a.id_cabang_kader, a.no_hp, b.nama_cabang from dlmbg_cabang_kader a left join dlmbg_cabang_profil b on a.id_cabang=b.id_cabang_profil
        where a.id_cabang='".$this->session->userdata("id_cabang")."' ".$query_add."");
		$config['base_url'] = base_url() . 'operator/data_kader/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.nama, a.wan_wati, a.komisariat, a.id_cabang_kader, a.no_hp, b.nama_cabang from
		dlmbg_cabang_kader a left join dlmbg_cabang_profil b on a.id_cabang=b.id_cabang_profil where a.id_cabang='
		".$this->session->userdata("id_cabang")."' ".$query_add." order by a.nama ASC LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table width='100%' style='border-collapse:collapse;' cellpadding='8' cellspacing='0' border='1' width='100%'>
					<tr bgcolor='#F2F2F2' align='center'>
					<td>No.</td>
					<td>Nama</td>
					<td>Immawan/Immawati</td>
					<td>Asal Komisariat</td>
					<td>No. HP</td>
					<td>Pimpinan Cabang</td>
					<td bgcolor='#000' colspan='2'><a href='".base_url()."operator/data_kader/tambah'>Tambah</a></td>
					</tr>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama."</td>
					<td>".$h->wan_wati."</td>
					<td>".$h->komisariat."</td>
					<td>".$h->no_hp."</td>
					<td>".$h->nama_cabang."</td>

					<td bgcolor='000'><a href='".base_url()."operator/data_kader/edit/".$h->id_cabang_kader."'>Edit</a></td>
					<td bgcolor='000'><a href='".base_url()."operator/data_kader/hapus/".$h->id_cabang_kader."' 
					onClick=\"return confirm('Anda yakin?');\">Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_formatur_cabang($limit,$offset,$filter=array())
	{
		$hasil="";
		$query_add = "";

        if(!empty($filter))
        {
            if($filter['nama']=="")
            {
                $query_add = "";
            }
            else
            {
                $where['nama'] = $filter['nama'];
                $query_add = "and a.nama like '%".$where['nama']."%'";
            }
        }

		$tot_hal = $this->db->query("select a.nama, a.wan_wati, a.tgl_lahir, a.no_hp, a.asal_komisariat, a.tempat_dad, a.tahun_dad, a.tempat_dam, a.tahun_dam,
         a.tanggal, a.gambar, b.nama_cabang, a.id_cabang_formatur, a.stts from dlmbg_cabang_formatur a left join dlmbg_cabang_profil b
		on a.id_cabang_profil=b.id_cabang_profil where a.id_cabang_profil='".$this->session->userdata("id_cabang")."' ".$query_add."");

		$config['base_url'] = base_url() . 'operator/formatur_cabang/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.nama, a.wan_wati, a.tgl_lahir, a.no_hp, a.asal_komisariat, a.tempat_dad, a.tahun_dad, a.tempat_dam, a.tahun_dam,
        a.tanggal, a.gambar, a.id_cabang_formatur, b.nama_cabang, a.stts from dlmbg_cabang_formatur a left join dlmbg_cabang_profil b
		on a.id_cabang_profil=b.id_cabang_profil where a.id_cabang_profil='".$this->session->userdata("id_cabang")."' ".$query_add." order by a.nama ASC
		LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table width='100%' style='border-collapse:collapse;' cellpadding='8' cellspacing='0' border='1' width='100%'>
					<tr bgcolor='#F2F2F2' align='center'>
					<td>No.</td>
					<td>Nama Calon Formatur</td>
					<td>Immawan/ti</td>
					<td>Tanggal lahir</td>
					<td>No. HP</td>
					<td>Asal Komisariat</td>
					<td>Tempat DAD</td>
					<td>Tahun DAD</td>
					<td>Tempat DAM</td>
					<td>Tahun DAM</td>
					<td>Status</td>
					<td bgcolor='#000' colspan='2'><a href='".base_url()."operator/formatur_cabang/tambah'>Tambah</a></td>
					</tr>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="Berkas Diterima";
			$color="#EBF8A4";
			if($h->stts==1){$st="Lolos Calon Formatur"; $color="";}
			$hasil .= "<tr bgcolor='".$color."'>
					<td>".$i."</td>
					<td>".$h->nama."</td>
					<td>".$h->wan_wati."</td>
					<td>".$h->tgl_lahir."</td>
					<td>".$h->no_hp."</td>
					<td>".$h->asal_komisariat."</td>
					<td>".$h->tempat_dad."</td>
					<td>".$h->tahun_dad."</td>
					<td>".$h->tempat_dam."</td>
					<td>".$h->tahun_dam."</td>
					<td>".$st."</td>
					<td bgcolor='000'><a href='".base_url()."operator/formatur_cabang/edit/".$h->id_cabang_formatur."'>Edit</a></td>
					<td bgcolor='000'><a href='".base_url()."operator/formatur_cabang/hapus/".$h->id_cabang_formatur."/".$h->gambar."'
					onClick=\"return confirm('Anda yakin?');\">Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	
	
}

/* End of file app_global_model.php */