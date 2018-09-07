<form action="" method="POST" role="form">
    <legend>Register</legend>

    <div class="form-group <?php echo (form_error('username') ? 'has-error' : '') ?>">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Isikan Username" value="<?= set_value('username'); ?>">
        <small class="block text-danger"><?= form_error('username'); ?></small>
    </div>

    <div class="form-group <?php echo (form_error('email') ? 'has-error' : '') ?>">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Isikan Email" value="<?= set_value('email'); ?>">
        <small class="block text-danger"><?= form_error('email'); ?></small>
    </div>

    <div class="form-group <?php echo (form_error('password') ? 'has-error' : '') ?>">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Isikan Password" value="<?= set_value('password'); ?>">
        <small class="block text-danger"><?= form_error('password'); ?></small>
    </div>

    <button type="submit" class="btn btn-primary">Register</button>

</form>