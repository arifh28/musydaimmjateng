<div id="content-center-large">
    <h3>Perbaharui data PC <?php echo $this->session->userdata('nama_cabang'); ?>.</h3>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo validation_errors(); ?>
	<?php echo $this->session->flashdata("result_login"); ?>
	<div class="cleaner_h10"></div>
	<?php echo form_open("operator/profil_cabang/simpan"); ?>

	<label for="nama_cabang">Pimpinan Cabang</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="nama_cabang" name="nama_cabang" placeholder="Nama Sekolah" value="<?php echo $nama_cabang; ?>" readonly="true" />
	<div class="cleaner_h20"></div>

	<label for="visi_misi">Visi & Misi</label>
	<div class="cleaner_h5"></div>
	<textarea name="visi_misi" id="visi_misi" cols="50" rows="6"><?php echo $visi_misi; ?></textarea>
	<div class="cleaner_h20"></div>
	
	<label for="alamat">Alamat</label>
	<div class="cleaner_h5"></div>
	<textarea name="alamat" id="alamat" cols="50" rows="6"><?php echo $alamat; ?></textarea>
	<div class="cleaner_h20"></div>
	
	<label for="email">Email</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" />
	<div class="cleaner_h20"></div>
	
	<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
	<div class="cleaner_h20"></div>
	<input type="submit" value="SIMPAN" />
	<?php echo form_close(); ?>
	<div class="cleaner_h20"></div>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>

