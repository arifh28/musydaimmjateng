<div id="content-center-large">
    <h3>Perbaharui data Username PC <?php echo $this->session->userdata('nama_cabang'); ?>.</h3>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("operator/profil/simpan"); ?>
	
	<label for="nama_cabang">Pimpinan Cabang</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="nama_cabang" name="nama_cabang" placeholder="Pimpinan Cabang" value="<?php echo $nama_cabang; ?>" readonly="true" />
	<div class="cleaner_h20"></div>
	
	<label for="username">Username</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>" readonly="true" />
	<div class="cleaner_h20"></div>
	
	<label for="nama_operator">Nama Ketua Umum</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="nama_operator" name="nama_operator" placeholder="Nama Ketua Cabang" value="<?php echo $nama_operator; ?>" />
	<div class="cleaner_h20"></div>
	
	<label for="email">Email Ketua Umum Cabang</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="email" name="email" placeholder="Alamat Email Ketua Pimpinan Cabang" value="<?php echo $email; ?>" />
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

