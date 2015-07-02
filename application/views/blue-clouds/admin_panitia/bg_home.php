<div id="content-center-large">
	<h5>Assalamualaikum Immawan/Immawati <?php echo $this->session->userdata('nama_user_login'); ?>.</h5>
	<div class="cleaner_h20"></div>
	<div class="cleaner_h20"></div>

	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>admin_panitia/data_kader">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/peserta.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		DAFTAR PESERTA
	</div>

    <div id="dashboard-icon-small">
        <a href="<?php echo base_url(); ?>admin_panitia/data_cabang">
            <img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/komisariat.png"  width="70" border="0"/>
        </a>
        <div class="cleaner_h0"></div>
        DAFTAR PIMPINAN CABANG
    </div>

	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>admin_panitia/profil">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/profil.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		PROFIL PANITIA
	</div>

	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>admin_panitia/password">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/password.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		GANTI PASSWORD
	</div>
	
	<div id="dashboard-icon-small">
		<a href="<?php echo base_url(); ?>auth/user_login/logout">
		<img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/keluar.png"  width="70" border="0"/>
		</a>
		<div class="cleaner_h0"></div>
		KELUAR
	</div>
</div>

</div>
<div class="cleaner_h60"></div>

<audio controls autoplay="autoplay">
    <source src="<?php echo base_url(); ?>asset/theme/blue-clouds/images/log_in.mp3" type="audio/mpeg">
    Browser Immawan/Immawati tidak support memainkan musik.
</audio>

</div>
<div class="cleaner_h0"></div>
</div>

