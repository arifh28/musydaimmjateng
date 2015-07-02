<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_superadmin_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/

	public function generate_index_pesan_musyda($limit,$offset,$filter=array())
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

		$tot_hal = $this->db->get("dlmbg_super_pesan_musyda");

		$config['base_url'] = base_url() . 'superadmin/pesan_musyda/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->order_by("stts","ASC")->get("dlmbg_super_pesan_musyda",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Kontak</th>
					<th>Pesan</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th></th>
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
					<td>".$h->kontak."</td>
					<td>".strip_tags($h->pesan)."</td>
					<td>".generate_tanggal(gmdate('d/m/Y-H:i:s',$h->tanggal))." WIB</td>
					<td>".$st."</td>
					<td>";
					$hasil .= "";
			if($h->stts==1)
			{
				$hasil .= "<a href='".base_url()."superadmin/pesan_musyda/approve/".$h->id_super_pesan_musyda."/0' class='btn btn-small'><i class='icon-remove'></i></a>";
			}
			else
			{
				$hasil .= "<a href='".base_url()."superadmin/pesan_musyda/approve/".$h->id_super_pesan_musyda."/1' class='btn btn-small'><i class='icon-ok'></i></a>";
			}
			$hasil .= "<a href='".base_url()."superadmin/pesan_musyda/hapus/".$h->id_super_pesan_musyda."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_admin_panitia($limit,$offset,$filter=array())
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['nama_admin_panitia']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['nama_admin_panitia'] = $filter['nama_admin_panitia']; 
				$query_add = "where a.nama_admin_panitia like '%".$where['nama_admin_panitia']."%'";
			}
		}

		$tot_hal = $this->db->query("select a.nama_admin_panitia, a.wan_wati, a.username_admin_panitia, a.id_admin_panitia from
		dlmbg_admin_panitia ".$query_add." order by a.nama_admin_panitia ASC");

		$config['base_url'] = base_url() . 'superadmin/admin_panitia/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.nama_admin_panitia, a.wan_wati, a.username_admin_panitia, a.id_admin_panitia from
		dlmbg_admin_panitia".$query_add." order by a.nama_admin_panitia ASC
		 LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Admin Dinas</th>
					<th>Immawan/ti</th>
					<th>Username Admin Dinas</th>
					<th width='110'><a href='".base_url()."superadmin/admin_panitia/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_admin_panitia."</td>
					<td>".$h->wan_wati."</td>
					<td>".$h->username_admin_panitia."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/admin_panitia/edit/".$h->id_admin_panitia."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/admin_panitia/hapus/".$h->id_admin_panitia."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

    public function generate_index_cabang($limit,$offset,$filter)
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

        $config['base_url'] = base_url() . 'superadmin/cabang/index/';
        $config['total_rows'] = $tot_hal->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $this->pagination->initialize($config);

        $w = $this->db->query('select a.nama_cabang, a.visi_misi, a.alamat, a.email, a.id_cabang_profil from dlmbg_sekolah_profil '.$query_add.' LIMIT '.$offset.','.$limit.'');

        $hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Sekolah</th>
					<th width='110'><a href='".base_url()."superadmin/cabang/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
        $i = $offset+1;
        foreach($w->result() as $h)
        {
            $hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_cabang."</td>
					<td>";
            $hasil .= "<a href='".base_url()."superadmin/cabang/edit/".$h->id_cabang_profil."' class='btn btn-small'><i class='icon-edit'></i></a>";
            $hasil .= "<a href='".base_url()."superadmin/cabang/hapus/".$h->id_cabang_profil."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
            $i++;
        }
        $hasil .= '</table>';
        $hasil .= '<div class="cleaner_h20"></div>';
        $hasil .= $this->pagination->create_links();
        return $hasil;
    }
	 
	public function generate_index_operator($limit,$offset,$filter)
	{
		$hasil="";
		$query_add = "";
		if(!empty($filter))
		{
			if($filter['nama_operator']=="")
			{
				$query_add = "";
			}
			else
			{
				$where['nama_operator'] = $filter['nama_operator']; 
				$query_add = "where a.nama_operator like '%".$where['nama_operator']."%'";
			}
		}

		$tot_hal = $this->db->like('nama_operator',$filter['nama_operator'])->get("dlmbg_admin_cabang");

		$config['base_url'] = base_url() . 'superadmin/operator/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query('select b.nama_cabang, a.nama_operator, a.username, a.email, a.id_admin_cabang from dlmbg_admin_cabang a left join 
		dlmbg_cabang_profil b on a.id_cabang=b.id_cabang_profil '.$query_add.' LIMIT '.$offset.','.$limit.'');
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Ketua</th>
					<th>Nama Cabang</th>
					<th>Username</th>
					<th>Email</th>
					<th width='110'><a href='".base_url()."superadmin/operator/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_operator."</td>
					<td>".$h->nama_cabang."</td>
					<td>".$h->username."</td>
					<td>".$h->email."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/operator/edit/".$h->id_admin_cabang."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/operator/hapus/".$h->id_admin_cabang."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_user($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->like('nama_super_admin',$filter['nama_super_admin'])->get("dlmbg_admin_super");

		$config['base_url'] = base_url() . 'superadmin/admin_panitia/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->like('nama_super_admin',$filter['nama_super_admin'])->get("dlmbg_admin_super",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Super Admin</th>
					<th>Username Super Admin</th>
					<th width='110'><a href='".base_url()."superadmin/user/tambah' class='btn btn'><i class='icon-plus'></i> Tambah</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_super_admin."</td>
					<td>".$h->username_super_admin."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/user/edit/".$h->id_admin_super."' class='btn btn-small'><i class='icon-edit'></i></a>";
			$hasil .= "<a href='".base_url()."superadmin/user/hapus/".$h->id_admin_super."' onClick=\"return confirm('Anda yakin?');\" class='btn btn-small'><i class='icon-trash'></i></a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_sistem($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_setting");

		$config['base_url'] = base_url() . 'superadmin/sistem/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_setting",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Pengaturan</th>
					<th>Tipe</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->title."</td>
					<td>".$h->tipe."</td>
					<td>";
			$hasil .= "<a href='".base_url()."superadmin/sistem/edit/".$h->id_setting."' class='btn'><i class='icon-edit'></i> Edit</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_menu($parent=0,$hasil)
	{
		$where['id_parent']=$parent;
		$w = $this->db->get_where("dlmbg_menu",$where);
		$w_q = $this->db->get_where("dlmbg_menu",$where)->row();
		if(($w->num_rows())>0)
		{
			$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th width='110' colspan='8'></th>
					</tr>
					</thead>";
		}
		foreach($w->result() as $h)
		{
			$where_sub['id_parent']=$h->id_menu;
			$w_sub = $this->db->get_where("dlmbg_menu",$where_sub);
			if(($w_sub->num_rows())>0)
			{
				$hasil .= "<tr><td>".$h->menu." </td><td><a href='".base_url()."superadmin/routing_pages/edit/".$h->id_menu."' class='btn btn-small'><i class='icon-edit'></i> Edit</a><a href='".base_url()."superadmin/routing_pages/hapus/".$h->id_menu."' class='btn btn-small' onClick=\"return confirm('Anda yakin?');\" ><i class='icon-trash'></i> Hapus</a>";
			}
			else
			{
				if($h->id_parent==0)
				{
				$hasil .= "<tr><td>".$h->menu." </td><td><a href='".base_url()."superadmin/routing_pages/edit/".$h->id_menu."' class='btn btn-small'><i class='icon-edit'></i> Edit</a><a href='".base_url()."superadmin/routing_pages/hapus/".$h->id_menu."' class='btn btn-small' onClick=\"return confirm('Anda yakin?');\" ><i class='icon-trash'></i> Hapus</a>";
				}
				else
				{
				$hasil .= "<tr><td width='250'>&raquo; ".$h->menu." </td><td><a href='".base_url()."superadmin/routing_pages/edit/".$h->id_menu."' class='btn btn-small'><i class='icon-edit'></i> Edit</a><a href='".base_url()."superadmin/routing_pages/hapus/".$h->id_menu."' class='btn btn-small' onClick=\"return confirm('Anda yakin?');\" ><i class='icon-trash'></i> Hapus</a>";
				}
			}
			$hasil = $this->generate_menu($h->id_menu,$hasil);
			$hasil .= "</td></tr>";
		}
		if(($w->num_rows)>0)
		{
			$hasil .= "</table>";
		}
		return $hasil;
	}
	 

	
}

/* End of file app_global_model.php */