<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_model extends CI_Model {

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

	public function generate_menu($parent=0,$posisi,$hasil,$cls_css=NULL)
	{
		$where['id_parent']=$parent;
		$where['posisi']=$posisi;
		$w = $this->db->get_where("dlmbg_menu",$where);
		$w_q = $this->db->get_where("dlmbg_menu",$where)->row();
		if(($w->num_rows())>0)
		{
			$hasil .= "<ul id='".$cls_css."'>";
		}
		foreach($w->result() as $h)
		{
			$where_sub['id_parent']=$h->id_menu;
			$w_sub = $this->db->get_where("dlmbg_menu",$where_sub);
			if(($w_sub->num_rows())>0)
			{
				$hasil .= "<li><a href='".base_url()."web/web/pages/".$h->id_menu."/".url_title(strtolower($h->menu))."'>".$h->menu." &raquo;</a>";
			}
			else
			{
				if($h->id_parent==0)
				{
					$hasil .= "<li><a href='".base_url()."web/web/pages/".$h->id_menu."/".url_title(strtolower($h->menu))."'>".$h->menu."</a>";
				}
				else
				{
					$hasil .= "<li><a href='".base_url()."web/web/pages/".$h->id_menu."/".url_title(strtolower($h->menu))."'>&raquo; ".$h->menu."</a>";
				}
			}
			$hasil = $this->generate_menu($h->id_menu,$posisi,$hasil);
			$hasil .= "</li>";
		}
		if(($w->num_rows)>0)
		{
			$hasil .= "</ul>";
		}
		return $hasil;
	}

	public function generate_menu_formatur_cabang($limit,$offset)
	{
		$hasil="";
		$where['stts'] = 1;
		$w = $this->db->order_by("id_cabang_formatur","DESC")->get_where("dlmbg_cabang_formatur",$where,$limit,$offset);
		foreach($w->result() as $h)
		{
			$hasil .= "<li><h4>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</h4><a href='".base_url()."web/formatur_cabang/detail/".$h->id_cabang_formatur."/".url_title(strtolower($h->nama))."'' title='".$h->nama."'>".$h->nama."</a></li>";
		}
		return $hasil;
	}

	public function generate_index_pesan_musyda($limit,$offset)
	{
		$hasil="";
		$where['stts'] = 1;

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

		$tot_hal = $this->db->get_where("dlmbg_super_pesan_musyda",$where);
		$config['base_url'] = base_url() . 'web/pesan_musyda/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->order_by('id_super_pesan_musyda','desc')->get_where("dlmbg_super_pesan_musyda",$where,$limit,$offset);
		foreach($w->result() as $h)
		{
			$hasil .= "<div id='label-buku-tamu'>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</div>";
			$hasil .= '<div class="cleaner_h0"></div>';
			$hasil .= "<div id='content-buku-tamu'><img src='".base_url()."asset/theme/".$_SESSION['site_theme']."/images/user-icon.png'>".$h->pesan."<div class='cleaner_h0'></div></div>";
			$hasil .= '<div class="cleaner_h0"></div>';
			$hasil .= "<div id='label-buku-tamu'>Oleh : ".$h->nama."</div>";
			$hasil .= '<div class="cleaner_h10"></div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_detail_formatur_cabang($id_param)
	{
		$hasil="";
		$w="";
		
		$w = $this->db->query("select a.id_cabang_formatur, a.judul, a.isi, a.gambar, a.tanggal, b.nama_cabang, c.nama_operator as usr from dlmbg_cabang_formatur a left join dlmbg_cabang_profil b on a.id_cabang_profil=b.id_cabang_profil left join dlmbg_admin_cabang c on a.id_admin_cabang=c.id_admin_cabang where a.id_cabang_formatur='".$id_param."' and a.stts='1'");
		
		foreach($w->result() as $h)
		{
			$hasil .= '
			<div id="detail-title-news">'.$h->judul.'<div class="cleaner_h10"></div></div>
			<div class="cleaner_h10"></div>
			<span style="float:none; width:380px; font-size:12px; font-weight:bold; text-align:right; padding-top:3px;">
			Ditulis oleh : '.$h->usr.' - Sekolah : '.$h->nama_cabang.'
			</span>
			<div id="news-list-detail">
			<img src="'.base_url().'asset/images/formatur-cabang/thumb/'.$h->gambar.'" />
			<h4>'.generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal)).' WIB</h4>
			'.$h->isi.'
			</div>';
		}
		return $hasil;
	}
	 
	public function generate_index_formatur_cabang($limit,$offset)
	{
		$hasil="";
		$where['stts'] = 1;

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

		$tot_hal = $this->db->get_where("dlmbg_cabang_formatur",$where);
		$config['base_url'] = base_url() . 'web/formatur_cabang/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->order_by('id_cabang_formatur','desc')->get_where("dlmbg_cabang_formatur",$where,$limit,$offset);
		foreach($w->result() as $h)
		{
			$hasil .= '<div id="news-list">
			<img src="'.base_url().'asset/images/formatur-cabang/thumb/'.$h->gambar.'" />
			<h4>'.generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal)).' WIB</h4><h1><a href="'.base_url().'web/formatur_cabang/detail/'.$h->id_cabang_formatur.'/'.url_title(strtolower($h->judul)).'">'.$h->judul.'</a></h1>
			'.substr($h->isi,0,200).'.... <a href="'.base_url().'web/formatur_cabang/detail/'.$h->id_cabang_formatur.'/'.url_title(strtolower($h->judul)).'"><b>(Baca Selengkapnya)</b></a>
			</div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_formatur_per_cabang($id_param,$limit,$offset)
	{
		$hasil="";
		$where['stts'] = 1;
		$where['id_cabang_profil'] = $id_param;

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

		$tot_hal = $this->db->get_where("dlmbg_cabang_formatur",$where);
		$config['base_url'] = base_url() . 'web/formatur_cabang/cabang/'.$where['id_cabang_profil'].'';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->order_by('id_cabang_formatur','desc')->get_where("dlmbg_cabang_formatur",$where,$limit,$offset);
		foreach($w->result() as $h)
		{
			$hasil .= '<div id="news-list">
			<img src="'.base_url().'asset/images/formatur-cabang/thumb/'.$h->gambar.'" />
			<h4>'.generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal)).' WIB</h4><h1><a href="'.base_url().'web/formatur_cabang/detail/'.$h->id_cabang_formatur.'/'.url_title(strtolower($h->judul)).'">'.$h->judul.'</a></h1>
			'.substr($h->isi,0,200).'.... <a href="'.base_url().'web/formatur_cabang/detail/'.$h->id_cabang_formatur.'/'.url_title(strtolower($h->judul)).'"><b>(Baca Selengkapnya)</b></a>
			</div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_data_cabang($limit,$offset,$filter=array())
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['id_jenjang_pendidikan']=="semua" &&  $filter['id_kecamatan']=="semua")
			{
				$query_add = "";
			}
			else
			{
				$where['id_jenjang_pendidikan'] = $filter['id_jenjang_pendidikan']; 
				$where['id_kecamatan'] = $filter['id_kecamatan']; 
				$query_add = "where a.id_jenjang_pendidikan='".$where['id_jenjang_pendidikan']."' and a.id_kecamatan='".$where['id_kecamatan']."'";
			}
		}

		$tot_hal = $this->db->query("select a.id_cabang_profil, a.nama_cabang, b.pendidikan, c.kecamatan from
		dlmbg_cabang_profil a left join dlmbg_super_jenjang_pendidikan b on
		a.id_jenjang_pendidikan=b.id_super_jenjang_pendidikan left join dlmbg_super_kecamatan c on a.id_kecamatan=c.id_super_kecamatan 
		".$query_add."");
		$config['base_url'] = base_url() . 'web/data_cabang/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.id_cabang_profil, a.nama_cabang, b.pendidikan, c.kecamatan
		from dlmbg_cabang_profil a left join dlmbg_super_jenjang_pendidikan b on
		a.id_jenjang_pendidikan=b.id_super_jenjang_pendidikan left join dlmbg_super_kecamatan c on a.id_kecamatan=c.id_super_kecamatan 
		 ".$query_add." order by a.id_cabang_profil DESC LIMIT ".$offset.",".$limit."");
		
		$hasil .= '<table style="border-collapse:collapse;" cellpadding="10" cellspacing="0" border="1" width="100%">';
		$hasil .= '<tr align="center" bgcolor="#F2F2F2">
					<td>No</td>
					<td>Nama Sekolah</td>
					<td>Jenjang Pendidikan</td>
					<td>Kecamatan</td></tr>';
		$i=1;
		foreach($w->result() as $h)
		{
			$hasil .= '<tr>
					<td>'.$i.'</td>
					<td><a href="'.base_url().'web/data_cabang/profil/'.$h->id_cabang_profil.'/'.strtolower(url_title($h->nama_cabang)).'">
					'.$h->nama_cabang.'</a></td>
					<td>'.$h->pendidikan.'</td>
					<td>'.$h->kecamatan.'</td></tr>';
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_detail_data_cabang($id_param)
	{
		$hasil="";

		$w = $this->db->query("select a.id_cabang_profil, a.nama_cabang, b.pendidikan, c.kecamatan, a.visi_misi,
		a.alamat, a.email from dlmbg_cabang_profil a left join dlmbg_super_jenjang_pendidikan b on
		a.id_jenjang_pendidikan=b.id_super_jenjang_pendidikan left join dlmbg_super_kecamatan c on a.id_kecamatan=c.id_super_kecamatan 
		where a.id_cabang_profil='".$id_param."'");
		
		if($w->num_rows==0)
		{
			return FALSE;
		}
		
		$hasil .= '<table style="border-collapse:collapse;" cellpadding="8" cellspacing="0" border="0" width="100%">';
		foreach($w->result() as $h)
		{
			$hasil .= '<tr valign="top"><td width="100">Nama Sekolah</td><td>:</td><td>'.$h->nama_cabang.'</td>';


			$hasil .= '<tr valign="top"><td>Jenjang</td><td>:</td><td>'.$h->pendidikan.'</td>';
			$hasil .= '<tr valign="top"><td>Visi & Misi</td><td>:</td><td>'.$h->visi_misi.'</td>';
			$hasil .= '<tr valign="top"><td>Alamat</td><td>:</td><td>'.$h->alamat.'</td>';
			$hasil .= '<tr valign="top"><td>Kecamatan</td><td>:</td><td>'.$h->kecamatan.'</td>';
			$hasil .= '<tr valign="top"><td>Email/HP</td><td>:</td><td>'.$h->email.'</td>';
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_mandat_cabang($id_param,$limit,$offset)
	{
		$hasil="";
		$where['id_cabang'] = $id_param;
		$where['stts'] = 1;

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

		$tot_hal = $this->db->get_where("dlmbg_cabang_mandat_cabang",$where);
		$config['base_url'] = base_url() . 'web/mandat_cabang/cabang/'.$id_param.'/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get_where("dlmbg_cabang_mandat_cabang",$where,$limit,$offset);
		foreach($w->result() as $h)
		{
			$hasil .= '<div class="border-photo-gallery-index"><div class="hide-photo-gallery-index"><a href="'.base_url().'asset/images/mandat-cabang/medium/'.$h->gambar.'" rel="mandat" title="'.$h->judul.'"><img src="'.base_url().'asset/images/mandat-cabang/thumb/'.$h->gambar.'" title="'.$h->judul.'" /></a></div></div>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_kader($limit,$offset,$filter=array())
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
                $query_add = "and a.nama_cabang like '%".$where['nama_cabang']."%'";
            }
        }

		$tot_hal = $this->db->query("select a.nama, a.wan_wati, a.komisariat, a.no_hp, b.nama_cabang from dlmbg_cabang_kader a left join
		dlmbg_cabang_profil b on a.id_cabang=b.id_cabang_profil
		".$query_add."");
		$config['base_url'] = base_url() . 'admin_panitia/data_kader/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.nama, a.wan_wati, a.komisariat, a.id_cabang_kader, a.no_hp, b.nama_cabang from dlmbg_cabang_kader a left join
		dlmbg_cabang_profil b on a.id_cabang=b.id_cabang_profil
        ".$query_add." order by a.nama ASC LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table width='100%' style='border-collapse:collapse;' cellpadding='8' cellspacing='0' border='1' width='100%'>
					<tr bgcolor='#F2F2F2' align='center'>
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
	 
	public function generate_index_kader_cabang($id_param,$limit,$offset)
	{
		$hasil="";

		$tot_hal = $this->db->query("select a.nama, a.wan_wati, a.komisariat, a.no_hp, b.nama_cabang from dlmbg_cabang_kader a left join
		dlmbg_cabang_profil b on a.id_cabang=b.id_cabang_profil
		where a.id_cabang='".$id_param."'");
		$config['base_url'] = base_url() . 'web/data_kader/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.nama, a.wan_wati, a.komisariat, a.no_hp, b.nama_cabang from dlmbg_cabang_kader a left join
		dlmbg_cabang_profil b on a.id_cabang=b.id_cabang_profil
		 where a.id_cabang='".$id_param."' order by a.nama ASC LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table width='100%' style='border-collapse:collapse;' cellpadding='8' cellspacing='0' border='1' width='100%'>
					<tr bgcolor='#F2F2F2' align='center'>
					<td>No.</td>
					<td>Nama</td>
					<td>Immawan/Immawati</td>
					<td>Asal Komisariat</td>
					<td>No. HP</td>
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