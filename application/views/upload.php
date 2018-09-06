<form action="<?= base_url(); ?>index.php/upload/store" method="POST" role="form" enctype="multipart/form-data">
    <legend>Upload image</legend>

    <div class="form-group <?php echo (form_error('gambar') ? 'has-error' : '') ?>">
        <label for="gambar">Gambar</label>
        <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Isikan Gambar" value="<?= set_value('gambar'); ?>">
        <small class="block text-danger"><?= form_error('gambar'); ?></small>
    </div>

    <button type="submit" class="btn btn-primary">Tambah</button>
    <button type="reset" class="btn btn-warning">Reset</button>

</form>

