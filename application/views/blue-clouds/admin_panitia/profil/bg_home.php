<div id="content-center-large">
	<div class="cleaner_h20"></div>
	<?php echo form_open("admin_panitia/profil/simpan"); ?>

	<label for="username">Username</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>" readonly="true" />
	<div class="cleaner_h20"></div>
	
	<label for="nama_admin_panitia">Nama</label>
	<div class="cleaner_h5"></div>
	<input type="text" id="nama_admin_panitia" name="nama_admin_panitia" placeholder="Nama Panitia" value="<?php echo $nama_admin_panitia; ?>" />
	<div class="cleaner_h20"></div>

    <?php $immawan='checked="checked"'; $immawati='checked="checked"';
    if($wan_wati=="Immawan"){ $immawan='checked="checked"'; $immawati=''; }
    else if($wan_wati=="Immawati"){ $immawan=''; $immawati='checked="checked"'; }
    ?>
    <label>Immawan/Immawati</label>
    <div class="cleaner_h5"></div>
    <input type="radio" name="wan_wati" value="Immawan" id="Immawan" <?php echo $immawan; ?> /><label for="Immawan">Immawan</label>
    <input type="radio" name="wan_wati" value="Immawati" id="Immawati" <?php echo $immawati; ?> /><label for="Immawati">Immawati</label>
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

