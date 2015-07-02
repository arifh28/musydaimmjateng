<div id="content-center-large">
    <h3>Data Peserta Musyda dari PC <?php echo $this->session->userdata('nama_cabang'); ?>.</h3><a href="<?php echo base_url(); ?>operator/data_kader/tambah"><div class="link-tombol" style="width:150px; text-align:center; float: right" id="daftar_peserta">Daftar Peserta</div></a>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
    <p><strong>Persyaratan Peserta</strong></p>
    <p>
        1. Membawa Surat Mandat
    </p>
    <p>
        a)Untuk Pimpinan Cabang IMM diketahui oleh PDM setempat.
    </p>
    <p>
        b)Untuk Pimpinan Komisariat IMM diketahui oleh PC IMM masing-masing.
    </p>
    <p>
        2. Membayar SWO sebesar Rp. 200.000/ PC.
    </p>
    <p>
        3. Membayar SWP sebesar Rp. 200.000 @Peserta.
    </p>
    <p>
        4. Mengisi biodata peserta dan pas photo berwarna 3 x 4 cm sebanyak 3 lembar saat pendaftaran Musyda.
    </p>
    <p>
        5. Mengisi formulir secara online pada formulir di link <a href="#daftar_peserta"><strong>Daftar Peserta</strong></a> diatas.
    </p>

    <?php echo form_open("operator/data_kader/set"); ?>
	<input type="text" name="by_nama" placeholder="Cari berdasarkan nama" />
	<input type="submit" value="FILTER" />
	<?php echo form_close(); ?>
	<div class="cleaner_h20"></div>
	<?php echo $dt_data_kader; ?>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>

