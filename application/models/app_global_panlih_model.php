<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_panlih_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/

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
				$query_add = "where a.nama like '%".$where['nama']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.nama, a.tanggal, a.gambar, a.wan_wati, a.tgl_lahir, a.no_hp, a.asal_komisariat, a.tempat_dad,
a.tahun_dad, a.tempat_dam, a.tahun_dam, b.nama_cabang, a.id_cabang_formatur, a.stts from dlmbg_cabang_formatur a left join dlmbg_cabang_profil b
		on a.id_cabang_profil=b.id_cabang_profil ".$query_add."");

		$config['base_url'] = base_url() . 'panlih/formatur_cabang/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.nama, a.tanggal, a.gambar, a.id_cabang_formatur, a.wan_wati, a.tgl_lahir, a.no_hp, a.asal_komisariat, a.tempat_dad,
a.tahun_dad, a.tempat_dam, a.tahun_dam, b.nama_cabang, a.stts from dlmbg_cabang_formatur a left join dlmbg_cabang_profil b
		on a.id_cabang_profil=b.id_cabang_profil ".$query_add." order by a.stts ASC 
		LIMIT ".$offset.",".$limit."");


		$hasil .= "
       <table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th style='width: 120px'>Nama</th>
					<th>Immawan/ti</th>
					<th>Tgl Lahir</th>
					<th>No. Hp</th>
					<th>Asal Komisariat</th>
					<th style='width: 125px'>Asal Cabang</th>
					<th>Waktu Daftar</th>
					<th width='110'>Berkas</th>
					<th>Status</th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="<span class='label label-important'>Berkas Diterima</span>";
			if($h->stts==1){$st="<span class='label label-success'>Calon Formatur</span>";}

			$hasil .= "

            <tr>
					<td>".$i."</td>
					<td>".$h->nama."</td>
					<td>".$h->wan_wati."</td>
					<td>".$h->tgl_lahir."</td>
					<td>".$h->no_hp."</td>
					<td>".$h->asal_komisariat."</td>
					<td>".$h->nama_cabang."</td>
					<td>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</td>
					<td><a href='".base_url()."asset/images/formatur-cabang/thumb/".$h->gambar."' class='btn btn-medium btn-primary'>DOWNLOAD BERKAS</a></td>
					<td>".$st."</td>
					<td>";$hasil .= "";
			if($h->stts==1)
			{
				$hasil .= "<a href='".base_url()."panlih/formatur_cabang/approve/".$h->id_cabang_formatur."/0' class='btn btn-small'><i class='icon-remove'></i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."panlih/formatur_cabang/approve/".$h->id_cabang_formatur."/1' class='btn btn-small'><i class='icon-ok'></i></a>";
			}
			$hasil .= "<a href='".base_url()."panlih/formatur_cabang/hapus/".$h->id_cabang_formatur."/".$h->gambar."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
        $hasil .= '</table>';
        $hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

    public function generate_index_kader($limit,$offset,$filter=array())
    {
        $hasil="";
        $query_add = "";

        $tot_hal = $this->db->query("select a.nama, a.wan_wati, a.komisariat, a.no_hp, b.nama_cabang from dlmbg_cabang_kader a left join
		dlmbg_cabang_profil b on a.id_cabang=b.id_cabang_profil
		".$query_add."");
        $config['base_url'] = base_url() . 'web/data_komisariat/index/';
        $config['total_rows'] = $tot_hal->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $this->pagination->initialize($config);

        $w = $this->db->query("select a.nama, a.wan_wati, a.komisariat, a.no_hp, b.nama_cabang from dlmbg_cabang_kader a left join
		dlmbg_cabang_profil b on a.id_cabang=b.id_cabang_profil
		 ".$query_add." order by a.nama ASC LIMIT ".$offset.",".$limit."");

        $hasil .= "<table class='table table-striped table-condensed'>
					<tr>
					<td>No.</td>
					<td>Nama</td>
					<td>Immawan/Immawati</td>
					<td>Asal Komisariat</td>
					<td>No. Hape</td>
					<td>Pimpinan Cabang</td>
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