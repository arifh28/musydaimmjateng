<div id="content-center-large">

<div id="bg-sidebar-login" style="margin:0px auto;">
<div id="head-sidebar">Masuk</div>
<div id="content-sidebar-login">
<?php echo validation_errors(); ?>
<p><?php echo $this->session->flashdata("result_login"); ?></p>
<?php echo form_open("auth/user_login"); ?>
<label for="username">Username : </label>
<input type="text" name="username" id="username" placeholder="Masukkan username...." />
<label for="password">Password : </label>
<input type="password" name="password" id="password" placeholder="Masukkan password...." />
<label for="as">Masuk sebagai : </label>
<select name="log_as" id="as">
	<option value="">-- Pilih --</option>
	<option value="panlih">Panlih</option>
    <option value="admin_dinas">Panitia</option>
	<option value="operator">Pimpinan Cabang</option>
	<option value="superadmin">Admin Web</option>
</select>
<div class="cleaner_h10"></div>	
	<input type="submit" value="MASUK" />
	<input type="reset" value="RESET" />
</div>
<?php echo form_close(); ?>
<div class="cleaner_h10"></div>	
</div>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>

