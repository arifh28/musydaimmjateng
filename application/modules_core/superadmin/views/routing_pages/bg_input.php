
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Routing Pages</h1>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>
					
				<?php echo form_open_multipart("superadmin/routing_pages/simpan"); ?>
				
				<label for="menu">Judul Menu</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="menu" name="menu" placeholder="Judul Menu" value="<?php echo $menu; ?>" />
				<div class="cleaner_h10"></div>

				<label for="url_route">URL Route </label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="url_route" name="url_route" placeholder="URL Route" value="<?php echo $url_route; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="content">Isi</label>
				<div class="cleaner_h5"></div>
				<textarea name="content" id="alamat" cols="50" rows="6"><?php echo $content; ?></textarea>
				<div class="cleaner_h10"></div>

				<label for="posisi">Posisi</label>
				<div class="cleaner_h5"></div>
				<?php $a=""; $b="";
				if($posisi=="atas"){$a='selected="selected"'; $b='';}
				else if($posisi=="bawah"){$b='selected="selected"'; $a='';}
				?>
				<select name="posisi">
					<option value="atas" <?php echo $a; ?>>Atas</option>
					<option value="bawah" <?php echo $b; ?>>Bawah</option>
				</select>
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				<div class="cleaner_h20"></div>
					
			</section>