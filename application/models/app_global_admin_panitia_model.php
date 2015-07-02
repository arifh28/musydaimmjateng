<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_admin_panitia_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/




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

		$tot_hal = $this->db->query("select a.nama, a.nisn, a.id_cabang_kader, a.kelas, b.nama_cabang, c.pendidikan, d.kecamatan from 
		dlmbg_cabang_kader a left join dlmbg_cabang_profil b on a.id_cabang=b.id_cabang_profil left join dlmbg_super_jenjang_pendidikan c 
		on a.id_jenjang_pendidikan=c.id_super_jenjang_pendidikan left join dlmbg_super_kecamatan d on a.id_kecamatan=d.id_super_kecamatan where 
		a.id_cabang='".$this->session->userdata("id_cabang")."' ".$query_add."");
		$config['base_url'] = base_url() . 'admin_panitia/data_kader/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.nama, a.nisn, a.id_cabang_kader, a.kelas, b.nama_cabang, c.pendidikan, d.kecamatan from 
		dlmbg_cabang_kader a left join dlmbg_cabang_profil b on a.id_cabang=b.id_cabang_profil left join dlmbg_super_jenjang_pendidikan c 
		on a.id_jenjang_pendidikan=c.id_super_jenjang_pendidikan left join dlmbg_super_kecamatan d on a.id_kecamatan=d.id_super_kecamatan where 
		a.id_cabang='".$this->session->userdata("id_cabang")."' ".$query_add." order by a.nama ASC LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table width='100%' style='border-collapse:collapse;' cellpadding='8' cellspacing='0' border='1' width='100%'>
					<tr bgcolor='#F2F2F2' align='center'>
					<td>No.</td>
					<td>NISN</td>
					<td>Nama Peserta Didik</td>
					<td>Kelas</td>
					<td>Nama Sekolah</td>
					<td>Kecamatan Sekolah</td>
					<td>Jenjang Pendidikan</td>
					<td bgcolor='#000' colspan='2'><a href='".base_url()."admin_panitia/data_kader/tambah'>Tambah</a></td>
					</tr>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nisn."</td>
					<td>".$h->nama."</td>
					<td>".$h->kelas."</td>
					<td>".$h->nama_cabang."</td>
					<td>".$h->kecamatan."</td>
					<td>".$h->pendidikan."</td>
					<td bgcolor='000'><a href='".base_url()."admin_panitia/data_kader/edit/".$h->id_cabang_kader."'>Edit</a></td>
					<td bgcolor='000'><a href='".base_url()."admin_panitia/data_kader/hapus/".$h->id_cabang_kader."' 
					onClick=\"return confirm('Anda yakin?');\">Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_berita_panitia($limit,$offset,$filter=array())
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['judul']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['judul'] = $filter['judul']; 
				$query_add = "and a.judul like '%".$where['judul']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.judul, a.id_multi_berita, a.gambar, a.tanggal, b.bidang, a.stts, a.headline from dlmbg_multi_berita a left join dlmbg_super_bidang b on a.id_bidang=b.id_super_bidang where a.id_bidang='".$this->session->userdata("id_bidang")."' ".$query_add."");

		$config['base_url'] = base_url() . 'operator/formatur_cabang/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.judul, a.gambar, a.tanggal, b.bidang, a.stts, a.id_multi_berita, a.headline from dlmbg_multi_berita a left join dlmbg_super_bidang b on a.id_bidang=b.id_super_bidang where a.id_bidang='".$this->session->userdata("id_bidang")."' ".$query_add." order by a.judul ASC 
		LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table width='100%' style='border-collapse:collapse;' cellpadding='8' cellspacing='0' border='1' width='100%'>
					<tr bgcolor='#F2F2F2' align='center'>
					<td>No.</td>
					<td>Judul</td>
					<td>Tanggal</td>
					<td>Bidang</td>
					<td>Headline</td>
					<td>Status</td>
					<td bgcolor='#000' colspan='2'><a href='".base_url()."admin_panitia/berita_panitia/tambah'>Tambah</a></td>
					</tr>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$st="Moderation";
			$color="#EBF8A4";
			$headline="No";
			if($h->stts==1){$st="Approve"; $color="";}
			if($h->headline=="y"){$headline="Yes";}

			$hasil .= "<tr bgcolor='".$color."'>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</td>
					<td>".$h->bidang."</td>
					<td>".$headline."</td>
					<td>".$st."</td>
					<td bgcolor='000'><a href='".base_url()."admin_panitia/berita_panitia/edit/".$h->id_multi_berita."'>Edit</a></td>
					<td bgcolor='000'><a href='".base_url()."admin_panitia/berita_panitia/hapus/".$h->id_multi_berita."/".$h->gambar."' 
					onClick=\"return confirm('Anda yakin?');\">Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

    public function generate_index_mandat_cabang($limit,$offset,$filter)
    {
        $hasil="";
        $query_add = "";
        if(!empty($filter))
        {
            if($filter['nama_cabang']=="")
            {
                $query_add = "";
            }
            else
            {
                $where['nama_cabang'] = $filter['nama_cabang'];
                $query_add = "where a.nama_cabang like '%".$where['nama_cabang']."%'";
            }
        }

        $tot_hal = $this->db->like('nama_cabang',$filter['nama_cabang'])->get("dlmbg_cabang_profil");

        $config['base_url'] = base_url() . 'admin_panitia/download_cabang/index/';
        $config['total_rows'] = $tot_hal->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $this->pagination->initialize($config);

        $w = $this->db->query('select a.nama_cabang a.id_cabang_profil, (select count(id_cabang_mandat_cabang)
        as jum from dlmbg_cabang_mandat_cabang where stts=0 and id_cabang=a.id_cabang_profil) jum from dlmbg_cabang_profil
        '.$query_add.' order by jum DESC LIMIT '.$offset.','.$limit.'');

        $hasil .= "<table width='100%' style='border-collapse:collapse;' cellpadding='8' cellspacing='0' border='1' width='100%'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Sekolah</th>
					<th width='110'></th>
					</tr>
					</thead>";
        $i = $offset+1;
        foreach($w->result() as $h)
        {
            $jum="<span class='label label-info'>".$h->jum." foto</span>";
            if($h->jum>0){$jum="<span class='label label-important'>".$h->jum." foto</span>";}
            $hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_cabang."</td>
					<td>".$jum."</td>
					<td>";
            $hasil .= "<a href='".base_url()."admin_panitia/download_cabang/bg_detail/".$h->id_cabang_profil."' class='btn btn-small'><i class='icon-share'></i></a></td>
					</tr>";
            $i++;
        }
        $hasil .= '</table>';
        $hasil .= '<div class="cleaner_h20"></div>';
        $hasil .= $this->pagination->create_links();
        return $hasil;
    }


    public function generate_index_foto_mandat_cabang($id_cabang,$limit,$offset)
    {
        $hasil="";
        $where['id_cabang'] = $id_cabang;
        $tot_hal = $this->db->get_where("dlmbg_cabang_mandat_cabang",$where);

        $config['base_url'] = base_url() . 'admin_panitia/download_cabang/detail/'.$id_cabang.'';
        $config['total_rows'] = $tot_hal->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 5;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $this->pagination->initialize($config);

        $w =  $this->db->order_by("stts","ASC")->get_where("dlmbg_cabang_mandat_cabang",$where,$limit,$offset);

        $hasil .= "<table width='100%' style='border-collapse:collapse;' cellpadding='8' cellspacing='0' border='1' width='100%'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Status</th>
					<th>Gambar</th>
					<th width='110'></th>
					</tr>
					</thead>";
        $i = $offset+1;
        foreach($w->result() as $h)
        {
            $st="<span class='label label-important'>Moderation</span>";
            if($h->stts==1){$st="<span class='label label-success'>Approve</span>";}
            $hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama."</td>
					<td>".$st."</td>
					<td><img src='".base_url()."asset/images/mandat-cabang/thumb/".$h->gambar."' width='50'></td>
					<td>";

            if($h->stts==1)
            {
                $hasil .= "<a href='".base_url()."admin_panitia/download_cabang/approve/".$id_cabang."/".$h->id_cabang_mandat_cabang."/0' class='btn btn-small'><i class='icon-remove'></i></a>";
            }
            else
            {
                $hasil .= "<a href='".base_url()."admin_panitia/download_cabang/approve/".$id_cabang."/".$h->id_cabang_mandat_cabang."/1' class='btn btn-small'><i class='icon-ok'></i></a>";
            }
            $hasil .= "<a href='".base_url()."admin_panitia/download_cabang/hapus/".$id_cabang."/".$h->id_cabang_mandat_cabang."/".$h->gambar."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
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