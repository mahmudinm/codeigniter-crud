<form action="<?= base_url(); ?>index.php/buku/update/<?= $buku['id'] ?>" method="POST" role="form" enctype="multipart/form-data">
    <legend>Edit Buku</legend>


    <div class="form-group <?php echo (form_error('gambar') ? 'has-error' : '') ?>">
        <label for="gambar">Gambar</label>
        <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Isikan Gambar" >
        <small class="block text-danger"><?= form_error('gambar'); ?></small>
        <img src="<?= base_url() ?>/uploads/<?= $buku['gambar'] ?>" style="width:100px;height:100px;" class="img img-rounded">
    </div>

    <div class="form-group <?php echo (form_error('nama') ? 'has-error' : '') ?>">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Isikan Nama" value="<?= $buku['nama'] ?>">
        <small class="block text-danger"><?= form_error('nama'); ?></small>
    </div>

    <div class="form-group <?php echo (form_error('pengarang_id') ? 'has-error' : '') ?>">
        <label for="pengarang_id">Pengarang</label>
        <select name="pengarang_id" class="form-control">
        	<?php foreach ($pengarangs as $pengarang): ?>
        		<option value="<?= $pengarang->id ?>" <?= ($pengarang->id == $buku['pengarang_id'] ? 'selected' : '' ); ?> ><?= $pengarang->nama ?></option>
        	<?php endforeach ?>
        </select>
        <small class="block text-danger"><?= form_error('pengarang_id'); ?></small>
    </div>    

    <button type="submit" class="btn btn-primary">Update</button>
    <button type="reset" class="btn btn-warning">Reset</button>

</form>	