<div id="content-center-large">
    <h3>Tambah data Peserta Musyda dari PC <?php echo $this->session->userdata('nama_cabang'); ?>.</h3>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("operator/data_kader/simpan"); ?>
	
	<label for="nama">Nama</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
	<div class="cleaner_h20"></div>

    <?php $immawan='checked="checked"'; $immawati='checked="checked"';
    if($wan_wati=="Immawan"){ $immawan='checked="checked"'; $immawati=''; }
    else if($wan_wati=="Immawati"){ $immawan=''; $immawati='checked="checked"'; }
    ?>
    <label>Jenis Kelamin</label>
    <div class="cleaner_h5"></div>
    <input type="radio" name="wan_wati" value="Immawan" id="Immawan" <?php echo $immawan; ?> /><label for="Immawan">Immawan</label>
    <input type="radio" name="wan_wati" value="Immawati" id="Immawati" <?php echo $immawati; ?> /><label for="Immawati">Immawati</label>
    <div class="cleaner_h20"></div>

	<label for="nisn">Asal Komisariat</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="komisariat" name="komisariat" placeholder="Asal Komisariat Immawan/Immawati" value="<?php echo $komisariat; ?>" />
	<div class="cleaner_h20"></div>
	
	<label for="kelas">No. HP</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="no_hp" name="no_hp" placeholder="Nomor Hape Immawan/Immawati" value="<?php echo $no_hp; ?>" />
	<div class="cleaner_h20"></div>
	
	<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
	<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
	<input type="hidden" name="id_cabang" value="<?php echo $this->session->userdata("id_cabang"); ?>" />
	<input type="hidden" name="id_jenjang_pendidikan" value="<?php echo $this->session->userdata("id_jenjang_pendidikan"); ?>" />
	<input type="hidden" name="id_kecamatan" value="<?php echo $this->session->userdata("id_kecamatan"); ?>" />
	<div class="cleaner_h20"></div>
	<input type="submit" value="SIMPAN" />
	<?php echo form_close(); ?>
	<div class="cleaner_h20"></div>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>

