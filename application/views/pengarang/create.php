<form action="<?= base_url(); ?>index.php/pengarang/store" method="POST" role="form">
    <legend>Buat Pengarang</legend>

    <div class="form-group <?php echo (form_error('nama') ? 'has-error' : '') ?>">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Isikan Nama" value="<?= set_value('nama'); ?>">
        <small class="block text-danger"><?= form_error('nama'); ?></small>
    </div>

    <button type="submit" class="btn btn-primary">Tambah</button>
    <button type="reset" class="btn btn-warning">Reset</button>

</form>