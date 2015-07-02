<div id="content-center-large">
    <h3>Tambah data Calon Formatur dari PC <?php echo $this->session->userdata('nama_cabang'); ?>.</h3>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo validation_errors(); ?>
	<?php echo form_open_multipart("operator/formatur_cabang/simpan"); ?>
	
	<label for="nama">Nama</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="nama" name="nama" placeholder="Nama Calon Formatur" value="<?php echo $nama; ?>" />
	<div class="cleaner_h10"></div>

    <?php $immawan='checked="checked"'; $immawati='checked="checked"';
    if($wan_wati=="Immawan"){ $immawan='checked="checked"'; $immawati=''; }
    else if($wan_wati=="Immawati"){ $immawan=''; $immawati='checked="checked"'; }
    ?>
    <label>Immawan/Immawati</label>
    <div class="cleaner_h5"></div>
    <input type="radio" name="wan_wati" value="Immawan" id="Immawan" <?php echo $immawan; ?> /><label for="Immawan">Immawan</label>
    <input type="radio" name="wan_wati" value="Immawati" id="Immawati" <?php echo $immawati; ?> /><label for="Immawati">Immawati</label>
    <div class="cleaner_h10"></div>

    <label for="tgl_lahir">Tanggal Lahir</label>
    <div class="cleaner_h5"></div>
    <input type="text" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo $tgl_lahir; ?>" />
    <div class="cleaner_h10"></div>

    <label for="no_hp">Nomor Hape yang bisa dihubungi</label>
    <div class="cleaner_h5"></div>
    <input type="text" id="no_hp" name="no_hp" placeholder="Nomor hape Calon Formatur" value="<?php echo $no_hp; ?>" />
    <div class="cleaner_h10"></div>

    <label for="asal_komisariat">Asal Komisariat</label>
    <div class="cleaner_h5"></div>
    <input type="text" id="asal_komisariat" name="asal_komisariat" placeholder="Asal komisariat Calon Formatur" value="<?php echo $asal_komisariat; ?>" />
    <div class="cleaner_h10"></div>

    <label for="tempat_dad">Tempat Mengikuti DAD</label>
    <div class="cleaner_h5"></div>
    <input type="text" id="tempat_dad" name="tempat_dad" placeholder="Komisariat mengikuti DAD" value="<?php echo $tempat_dad; ?>" />
    <div class="cleaner_h10"></div>

    <label for="tahun_dad">Tahun Mengikuti DAD</label>
    <div class="cleaner_h5"></div>
    <input type="text" id="tahun_dad" name="tahun_dad" placeholder="Tahun mengikuti DAD" value="<?php echo $tahun_dad; ?>" />
    <div class="cleaner_h10"></div>

    <label for="tempat_dam">Tempat Mengikuti DAM</label>
    <div class="cleaner_h5"></div>
    <input type="text" id="tempat_dam" name="tempat_dam" placeholder="Pimpinan Cabang mengikuti DAM" value="<?php echo $tempat_dam; ?>" />
    <div class="cleaner_h10"></div>

    <label for="tahun_dam">Tahun Mengikuti DAM</label>
    <div class="cleaner_h5"></div>
    <input type="text" id="tahun_dam" name="tahun_dam" placeholder="Tahun mengikuti DAD" value="<?php echo $tahun_dam; ?>" />
    <div class="cleaner_h10"></div>

	<label for="utk_imm">Visi dan Misi untuk IMM</label>
	<div class="cleaner_h5"></div>
	<textarea name="utk_imm" id="utk_imm" cols="50" rows="6"><?php echo $utk_imm; ?></textarea>
	<div class="cleaner_h10"></div>
	
	<label for="userfile">Pilih File</label>
	<div class="cleaner_h5"></div>
	<input type="file" name="userfile" id="userfile" />
	<div class="cleaner_h5"></div>
	* Upload berkas (formulir calon formatur pada bagian download yang telah diisi, syahadah DAM/DAP, KTA, foto), file harus <strong>.zip, .rar, .7zip atau .tar.gz</strong>.
	<div class="cleaner_h10"></div>

	<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
	<input type="hidden" name="gambar" value="<?php echo $gambar; ?>" />
	<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
	<div class="cleaner_h20"></div>
	<input type="submit" value="SIMPAN" />
	<?php echo form_close(); ?>
	<div class="cleaner_h20"></div>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>

