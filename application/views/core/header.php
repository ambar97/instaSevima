<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type = "text/javascript"
         src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="<?= base_url() ?>style.css">
    <!-- end css -->
    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <!-- end font -->
    <!-- dropzone -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: gray;">
        <div class="container">
            <a class="navbar-brand " href="<?= base_url('Home') ?>">Ambaraif</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
            <form class="form-inline mr-4">
    <input class="form-control mr-sm-2" style="height: 30px;" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline my-2 my-sm-0" type="submit" style="height: 30px; align-items: center;"><i class="fa fa-search"></i></button>
  </form>
                <a class="nav-link <?php if($this->uri->segment(1) == 'Home'){
                    echo "active";
                } ?>" href="<?= base_url('Home') ?>"> <i class="fa fa-home"></i> </a>
                <a class="nav-link" href="#"><i class="fa fa-envelope"></i></a>
                <a class="nav-link" href="#"><i class="fa fa-wpexplorer"></i></a>
                <a class="nav-link" href="#"><i class="fa fa-heart"></i></a>
                
                <a class="nav-link <?php if($this->uri->segment(1) == 'Akun'){
                    echo "active";
                } ?>" href="<?= base_url('Akun') ?>" title="Akun"><i class="fa fa-user-circle-o"></i></a>
            </div>
            </div>
        </div>
    </nav>