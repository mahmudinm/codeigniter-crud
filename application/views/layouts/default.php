<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <script src="<?= base_url(); ?>assets/js/jquery-2.2.0.js"></script>

</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url(); ?>">Codeigniter KRS</a>
            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?= base_url(); ?>index.php/buku">Buku</a></li>
                    <li><a href="<?= base_url(); ?>index.php/pengarang">Pengarang</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($this->session->userdata('username')): ?>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User<span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="<?= base_url() ?>/index.php/auth/logout">Logout</a></li>
                          </ul>
                        </li>                        
                    <?php else: ?>
                        <li><a href="<?= base_url() ?>/index.php/auth">Login</a></li>
                        <li><a href="<?= base_url() ?>/index.php/auth/register">Register</a></li>
                    <?php endif ?>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>

    <div class="container">
        <?php echo $template['body']; ?>
    </div>

    <script src="<?= base_url(); ?>assets/js/bootstrap.js"></script>
</body>
</html>