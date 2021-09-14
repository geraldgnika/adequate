<!Doctype HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Adequate. A">
        <meta name="author" content="Gerald Nika">
        <title><?=(isset($this->title)) ? $this->title : 'Adequate';?></title>
        <link rel="icon" type="image/x-icon" href="<?= Assets::get("images/wlogo16.png"); ?>">
        <link rel="stylesheet" href="<?= Assets::get("css/default.css"); ?>">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/sunny/jquery-ui.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?= Assets::get("js/custom.js"); ?>"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <?php if (isset($this->js)) {foreach ($this->js as $js) {echo '<script type="text/javascript" src="' . BASE . 'views/' . $js . '.js"></script>';}}?>
    </head>
    <body>
        <?php Session::init();?>
        <nav class="navbar navbar-expand-lg" id="navbar">
            <?php if (Session::get('loggedIn') == false && Session::get('admin') == false): ?>
            <a class="my-0 mr-md-auto font-weight-normal logo-header" href="<?php echo BASE; ?>">Adequate</a>
                <div class="my-2 my-md-0 md-3">
                    <a class="col-white" href="<?php echo BASE; ?>register">Register</a>
                    <a class="col-white" href="<?php echo BASE; ?>login">Login</a>
                </div>
            <?php endif;?>
            <?php if (Session::get('loggedIn') == true && Session::get('admin') == false): ?>
            <a class="my-0 mr-md-auto font-weight-normal logo-header" href="<?php echo BASE; ?>profile/index/<?= $this->data['id']; ?>">Adequate</a>
                <div class="my-2 my-md-0 md-3">
                    <a class="col-white" href="<?php echo BASE; ?>profile/index/<?= $this->data['id']; ?>">Profile</a>
                    <a class="col-white" href="<?php echo BASE; ?>settings/index/<?= $this->data['id']; ?>">Settings</a>
                    <a class="col-white" href="<?php echo BASE; ?>profile/logout">Logout</a>
                </div>
            <?php endif;?>
            <?php if (Session::get('admin') == true && Session::get('loggedIn') == false): ?>
            <a class="my-0 mr-md-auto font-weight-normal logo-header" href="<?php echo BASE; ?>admin/index/<?= $this->data['id']; ?>">Adequate</a>
                <div class="my-2 my-md-0 md-3">
                    <a class="col-white" href="<?php echo BASE; ?>admin/index/<?= $this->data['id']; ?>">Profile</a>
                    <a class="col-white" href="<?php echo BASE; ?>settings/index/<?= $this->data['id']; ?>">Settings</a>
                    <a class="col-white" href="<?php echo BASE; ?>admin/logout">Logout</a>
                </div>
            <?php endif;?>
        </nav>
        <main role="main" class="container">
            <?php if (isset($_GET['error'])) {?><div class="error_div"><span class="error"><?php echo $_GET['error']; ?></span></div><?php }?>