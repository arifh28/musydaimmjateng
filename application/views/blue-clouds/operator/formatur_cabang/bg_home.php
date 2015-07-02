<div id="content-center-large">
    <h3>Calon Formatur dari PC <?php echo $this->session->userdata('nama_cabang'); ?>.</h3><a href="<?php echo base_url(); ?>operator/formatur_cabang/tambah"><div class="link-tombol" style="width:150px; text-align:center; float: right" id="daftar_formatur">Daftar Calon Formatur</div></a>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>

    <p align="center">
        <strong>SYARAT KETENTUAN</strong>
    </p>
    <p align="center">
        <strong> </strong>
    </p>
    <p>
        Dalam pelaksanaan Pemilihan Pimpinan Musyda XVII yang kemudian diatur dalam mekanisme pemilihan pimpinan. Maka panitia pemilihan membuat kerangka pendukung
        dalam mengatur proses penjaringan calon formatur. Kerangka pendukung termasuk di dalamnya berkas Pencalonan Formatur. Adapun syarat dan ketentuan untuk
        dapat mencalonkan diri sebagai formatur sebagai berikut:
    </p>
    <div class="cleaner_h10"></div>
    <p>
        <strong> I. </strong>
        <strong>Syarat Formatur:</strong>
    </p>
    <p>
        1. Syarat Umum Formatur
    </p>
    <p>
        Syarat-syarat untuk dapat di calonkan menjadi Formatur adalah:
    </p>
    <p>
        a. Setia pada asas, tujuan, perjuangan Ikatan dan Persyarikatan.
    </p>
    <p>
        b. Taat kepada garis kebijakan pimpinan ikatan dan persyarikatan.
    </p>
    <p>
        c. Mampu membaca alquran secara tartil.
    </p>
    <p>
        d. Dapat menjadi teladan utama dalam organisasi, terutama akhlak dan ibadah.
    </p>
    <p>
        e. Berpengalaman menjadi pimpinan ikatan setingkat di bawahnya.
    </p>
    <p>
        f. Mendapat rekomendasi dari pimpinan IMM level pimpinan di bawahnya.
    </p>
    <p>
        g. Bersedia berdomisili di tempat kedudukan sekretariat, jika terpilih menjadi pimpinan.
    </p>
    <p>
        h. Tidak merangkap dengan pimpinan partai politik dan organisasi mahasiswa ekstra lainya.
    </p>
    <p>
        i. Membuat surat kesediaan untuk tidak di calonkan atau mencalonkan diri menjadi anggota legislatif.
    </p>
    <div class="cleaner_h10"></div>
    <p>
        2. Syarat khusus formatur DPD IMM
    </p>
    <p>
        a. Telah menjadi anggota biasa sekurang-kurangnya 3 (tiga) tahun.
    </p>
    <p>
        b. Telah lulus Darul Arqom Madya.
    </p>
    <p>
        c. Usia maksimal 28 Tahun.
    </p>
    <div class="cleaner_h10"></div>
    <p>
        <strong> II. </strong>
        <strong>Ketentuan Formatur:</strong>
    </p>
    <p>
        <strong> </strong>
    </p>
    <p>
        1. Menyampaikan formulir pencalonan kepada panitia pemilihan.
    </p>
    <p>
        2. Berkas pencalonan akan diteliti kembali oleh panitia pemilihan, apabila terdapat kekurangan dari formulir pencalonan maka akan di kembalikan untuk di
        perbaiki kembali.
    </p>
    <p>
        3. Ikut dalam proses screening untuk pemantapan pencalonan.
    </p>
    <div class="cleaner_h10"></div>
    <p>
        <strong> III. </strong>
        <strong>Syarat Berkas Pencalonan</strong>
    </p>
    <p>
        1. Foto Copy KTA IMM / Surat Keterangan Keanggotaan Pengganti KTA IMM.
    </p>
    <p>
        2. Legalisir Syahadah Darul Arqom Madya (DAM).
    </p>
    <p>
        3. Foto Copy Surat Keputusan (SK) Pimpinan Cabang sebagai bukti kepemimpinan setingkat di bawahnya.
    </p>
    <p>
        4. Surat rekomendasi dari Pimpinan IMM Cabang.
    </p>
    <p>
        5. Membuat surat kesediaan berdomisili di tempat kedudukan sekretariat.
    </p>
    <p>
        6. Membuat surat kesediaan tidak merangkap dengan Pimpinan Partai Politik.
    </p>
    <p>
        7. Membuat surat kesedian untuk tidak dicalonkan atau mencalonkan diri menjadi calon legislatif.
    </p>
    <p>
        8. Mengisi berkas pencalonan oleh Panitia Pemilihan.
    </p>
    <p>
        9. Semua berkas discan lalu dimasukkan dalam bentuk file zip / rar / tar.gz dengan format nama file yaitu nama calon formatur_asal cabang (misal immawan_bumipertiwi.zip) dan upload filenya pada form pendaftaran dengan mengklik tombol <a href="#daftar_formatur"><strong>Daftar Calon Formatur</strong></a> diatas.
    </p>
    <div class="cleaner_h20"></div>
    <p>Perlu bantuan untuk upload berkas? Hubungi Arif Hidayat di 085643668173.</p>
    <div class="cleaner_h10"></div>
    <p><strong>Sedangkan untuk nama-nama yang sudah mendaftar untuk menjadi calon formatur adalah sebagai berikut:</strong></p>
    <?php echo form_open("operator/formatur_cabang/set"); ?>
    <input type="text" name="by_nama" placeholder="Cari berdasarkan nama" />
    <input type="submit" value="CARI" />
    <?php echo form_close(); ?>
    <?php echo $dt_data_formatur_cabang; ?>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>

