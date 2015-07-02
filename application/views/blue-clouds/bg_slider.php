<?php
	if($_SESSION['site_slider']=="yes")
	{
?>
	<div id="slider-top">
	<div id="left-slider-top">
        <?php if($this->session->userdata("logged_in")==""){ ?>
            <div id="bg-sidebar">
                <div id="head-sidebar">Masuk</div>
                <div id="content-sidebar">
                    <?php echo form_open("auth/user_login"); ?>
                    <label for="username">Username : </label>
                    <input type="text" name="username" id="username" placeholder="Masukkan username...." />
                    <label for="password">Password : </label>
                    <input type="password" name="password" id="password" placeholder="Masukkan password...." />
                    <label for="as">Masuk sebagai : </label>
                    <select name="log_as" id="as">
                        <option value="">-- Pilih --</option>
                        <option value="admin_panitia">Panitia</option>
                        <option value="operator">Pimpinan Cabang</option>
                        <option value="superadmin">Admin</option>
                        <option value="panlih">Panlih</option>
                    </select>

                    <input type="submit" value="LOG IN" />
                    <input type="reset" value="RESET" />
                </div>
                <?php echo form_close(); ?>

            </div>
        <?php } else {
            if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_panitia") {
                ?>

                <div id="bg-sidebar">
                    <div id="head-sidebar">PANITIA</div>
                    <table width="100%" cellpadding="3">
                        <tr><td colspan="2"><div style="font-size:12px;">Selamat datang Immawan/Immawati <?php echo $this->session->userdata('nama_user_login'); ?>.</div></td></tr>
                        <tr><td><div class="border-photo-profil"><img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/cabang.png" width="60px"/></div>	</td><td>
                                <table>
                                    <tr>
                                        <td><div id="btn-poll">
                                                <a href="<?php echo base_url(); ?>admin_panitia/dashboard"><div class="link-tombol" style="width:65px; text-align:center;">Dashboard</div></a>
                                                <a href="<?php echo base_url(); ?>admin_panitia/profil"><div class="link-tombol" style="width:65px; text-align:center;">Edit Profil</div></a>
                                                <a href="<?php echo base_url(); ?>admin_panitia/password" class="group3"><div class="link-tombol" style="width:65px; text-align:center;">Password</div></a>
                                                <a href="<?php echo base_url(); ?>auth/user_login/logout"><div class="link-tombol" style="width:65px; text-align:center;">Log Out</div></a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td></tr>

                        <tr><td colspan="2">

                                <table cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td colspan="2">
                                            <div class="cleaner_h5"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div id="btn-poll">

                                                <a href="<?php echo base_url(); ?>admin_panitia/data_kader"><div class="link-tombol" style="width:210px; text-align:center;">Data Peserta</div></a>


                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td></tr>
                    </table>

                </div>

            <?php } else if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator") { ?>
                <div id="bg-sidebar">
                    <div id="head-sidebar">PC <?php echo $this->session->userdata('nama_cabang'); ?> Panel</div>
                    <table width="100%" cellpadding="3">
                        <tr><td colspan="2"><div style="font-size:12px;">Assalamualaikum <?php echo $this->session->userdata('nama_user_login'); ?> </td></tr>
                        <tr><td><div class="border-photo-profil"><img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/cabang.png" width="60px" /></div>	</td><td>
                                <table>
                                    <tr>
                                        <td><div id="btn-poll">
                                                <a href="<?php echo base_url(); ?>operator/dashboard"><div class="link-tombol" style="width:65px; text-align:center;">Dashboard</div></a>
                                                <a href="<?php echo base_url(); ?>operator/profil"><div class="link-tombol" style="width:65px; text-align:center;">Edit Profil</div></a>
                                                <a href="<?php echo base_url(); ?>operator/password" class="group3"><div class="link-tombol" style="width:65px; text-align:center;">Password</div></a>
                                                <a href="<?php echo base_url(); ?>auth/user_login/logout"><div class="link-tombol" style="width:65px; text-align:center;">Keluar</div></a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td></tr>
                        <tr><td colspan="2">

                                <table cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td colspan="2">
                                            <div class="cleaner_h5"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div id="btn-poll">
                                                <a href="<?php echo base_url(); ?>operator/formatur_cabang"><div class="link-tombol" style="width:100px; text-align:center;">Formatur</div></a>
                                                <a href="<?php echo base_url(); ?>operator/download_cabang"><div class="link-tombol" style="width:100px; text-align:center;">Download</div></a>
                                                <a href="<?php echo base_url(); ?>operator/profil_cabang"><div class="link-tombol" style="width:100px; text-align:center;">Profil Cabang</div></a>
                                                <a href="<?php echo base_url(); ?>operator/data_kader"><div class="link-tombol" style="width:100px; text-align:center;">Peserta Musyda</div></a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td></tr>
                    </table>
                    <div class="cleaner_h10"></div>
                </div>

            <?php } else if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin") { ?>
                <div id="bg-sidebar">
                    <div id="head-sidebar">SUPERADMIN PANEL</div>
                    <table width="100%" cellpadding="3">
                        <tr><td colspan="2"><div style="font-size:12px;">Welcome, <strong><?php echo $this->session->userdata('nama_user_login'); ?>.</strong></div></td></tr>
                        <tr><td><div class="border-photo-profil"><img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/cabang.png" width="60px" /></div>	</td><td>
                                <table>
                                    <tr>
                                        <td><div id="btn-poll">
                                                <a href="<?php echo base_url(); ?>superadmin"><div class="link-tombol" style="width:65px; text-align:center;">Dashboard</div></a>
                                                <a href="<?php echo base_url(); ?>superadmin/profil"><div class="link-tombol" style="width:65px; text-align:center;">Edit Profil</div></a>
                                                <a href="<?php echo base_url(); ?>superadmin/password" class="group3"><div class="link-tombol" style="width:65px; text-align:center;">Password</div></a>
                                                <a href="<?php echo base_url(); ?>auth/user_login/logout"><div class="link-tombol" style="width:65px; text-align:center;">Log Out</div></a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td></tr>
                        <tr><td colspan="2"><div style="font-size:12px;">Your privilages as, <strong><?php echo $this->session->userdata('tipe_user'); ?>.</strong></div></td></tr>
                    </table>
                    <div class="cleaner_h10"></div>
                </div>

            <?php } else if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="panlih") { ?>
                <div id="bg-sidebar">
                    <div id="head-sidebar">PANLIH</div>
                    <table width="100%" cellpadding="3">
                        <tr><td colspan="2"><div style="font-size:12px;">Welcome, <strong><?php echo $this->session->userdata('nama_user_login'); ?>.</strong></div></td></tr>
                        <tr><td><div class="border-photo-profil"><img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/cabang.png" width="60px" /></div>	</td><td>
                                <table>
                                    <tr>
                                        <td><div id="btn-poll">
                                                <a href="<?php echo base_url(); ?>panlih"><div class="link-tombol" style="width:65px; text-align:center;">Dashboard</div></a>
                                                <a href="<?php echo base_url(); ?>panlih/profil"><div class="link-tombol" style="width:65px; text-align:center;">Edit Profil</div></a>
                                                <a href="<?php echo base_url(); ?>panlih/password" class="group3"><div class="link-tombol" style="width:65px; text-align:center;">Password</div></a>
                                                <a href="<?php echo base_url(); ?>auth/user_login/logout"><div class="link-tombol" style="width:65px; text-align:center;">Log Out</div></a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td></tr>
                        <tr><td colspan="2"><div style="font-size:12px;">Your privilages as, <strong><?php echo $this->session->userdata('tipe_user'); ?>.</strong></div></td></tr>
                    </table>
                    <div class="cleaner_h10"></div>
                </div>

            <?php } } ?>
	</div>
	<div id="right-slider-top">

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="<?php echo base_url(); ?>asset/theme/blue-clouds/images/slider1.png" alt="STIKES Muh. Pekalongan">
                    <div class="carousel-caption">
                        <h3>STIKES Muh. Pekalongan</h3>
                        <p>Tempat untuk kegiatan Musyda XVII IMM Jawa Tengah</p>
                    </div>
                </div>

                <div class="item">
                    <img src="<?php echo base_url(); ?>asset/theme/blue-clouds/images/slider2.png" alt="Museum Batik Pekalongan">
                    <div class="carousel-caption">
                        <h3>Museum Batik Pekalongan</h3>
                        <p>Ingin mengetahui wawasan tentang batik? Datanglah ke Museum Batik Pekalongan.</p>
                    </div>
                </div>

                <div class="item">
                    <img src="<?php echo base_url(); ?>asset/theme/blue-clouds/images/slider3.png" alt="Pantai Kencana">
                    <div class="carousel-caption">
                        <h3>Pantai Kencana</h3>
                        <p>Pantai yang berada di wilayah Kota Pekalongan.</p>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <img src="<?php echo base_url(); ?>asset/theme/blue-clouds/images/prev.png" alt="">
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <img src="<?php echo base_url(); ?>asset/theme/blue-clouds/images/next.png" alt="">
            </a>
        </div>

	</div>
<div class="cleaner_h0"></div>
</div>
<div class="cleaner_h20"></div>
<?php
	}
?>