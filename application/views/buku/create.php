<form action="<?= base_url(); ?>index.php/buku/store" method="POST" role="form" enctype="multipart/form-data">
    <legend>Buat buku baru</legend>


    <div class="form-group <?php echo (form_error('gambar') ? 'has-error' : '') ?>">
        <label for="gambar">Gambar</label>
        <input type="text" class="form-control" id="gambar" name="gambar" placeholder="Isikan Gambar" value="<?= set_value('gambar'); ?>">
        <small class="block text-danger"><?= form_error('gambar'); ?></small>
    </div>    

    <div class="form-group <?php echo (form_error('nama') ? 'has-error' : '') ?>">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Isikan Nama" value="<?= set_value('nama'); ?>">
        <small class="block text-danger"><?= form_error('nama'); ?></small>
    </div>

    <div class="form-group <?php echo (form_error('pengarang_id') ? 'has-error' : '') ?>">
        <label for="pengarang_id">Pengarang</label>
        <select name="pengarang_id" class="form-control">
        	<?php foreach ($pengarangs as $pengarang): ?>
        		<option value="<?= $pengarang->id ?>"><?= $pengarang->nama ?></option>
        	<?php endforeach ?>
        </select>
        <small class="block text-danger"><?= form_error('pengarang_id'); ?></small>
    </div>


    <button type="submit" class="btn btn-primary">Tambah</button>
    <button type="reset" class="btn btn-warning">Reset</button>

</form>