<div id="content-center-large">
    <div class="cleaner_h0" style="text-align:right">
        <h5>Assalamualaikum <?php echo $this->session->userdata('nama_user_login'); ?> dari PC <?php echo $this->session->userdata('nama_cabang'); ?>.</h5></div>
    <div class="cleaner_h30"></div>
    <div class="cleaner_h5"></div>


    <div id="dashboard-icon-small">
        <a href="<?php echo base_url(); ?>operator/download_cabang">
            <img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/download.png"  width="70" border="0"/>
        </a>
        <div class="cleaner_h0"></div>
        DOWNLOAD
    </div>

    <div id="dashboard-icon-small">
        <a href="<?php echo base_url(); ?>operator/formatur_cabang">
            <img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/formatur.png"  width="70" border="0"/>
        </a>
        <div class="cleaner_h0"></div>
        CALON FORMATUR
    </div>

    <div id="dashboard-icon-small">
        <a href="<?php echo base_url(); ?>operator/data_kader">
            <img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/peserta.png"  width="70" border="0"/>
        </a>
        <div class="cleaner_h0"></div>
        PESERTA MUSYDA
    </div>

    <div id="dashboard-icon-small">
        <a href="<?php echo base_url(); ?>operator/profil_cabang">
            <img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/profil.png"  width="70" border="0"/>
        </a>
        <div class="cleaner_h0"></div>
        PROFIL CABANG
    </div>

    <div id="dashboard-icon-small">
        <a href="<?php echo base_url(); ?>operator/profil">
            <img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/cabang.png"  width="70" border="0"/>
        </a>
        <div class="cleaner_h0"></div>
        PROFIL USER
    </div>

    <div id="dashboard-icon-small">
        <a href="<?php echo base_url(); ?>operator/password">
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
    <div class="cleaner_h30"></div>
    <audio controls autoplay="autoplay" style="align-content: center">
        <source src="<?php echo base_url(); ?>asset/theme/blue-clouds/images/log_in.mp3" type="audio/mpeg">
        Browser Immawan/Immawati tidak support memainkan musik.
    </audio>

</div>

</div>
<div class="cleaner_h30"></div>

</div>
<div class="cleaner_h0"></div>
</div>