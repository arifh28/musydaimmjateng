<div id="footer">
<?php if($this->session->userdata("logged_in")==""){ ?>



<?php } else {
    if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="admin_panitia") { ?>


    <?php } else if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator") { ?>


    <?php } else if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="panlih") { ?>

        <audio controls autoplay="autoplay">
            <source src="<?php echo base_url(); ?>asset/theme/blue-clouds/images/log_in.mp3" type="audio/mpeg">
            Browser Immawan/Immawati tidak support memainkan musik.
        </audio>

    <?php } } ?>

<div class="cleaner_h40"></div>
<?php echo $_SESSION['site_footer']; ?>
<div class="cleaner_h20"></div>
</div>
</body>
</html>
