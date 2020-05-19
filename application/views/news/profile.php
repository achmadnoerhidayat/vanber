<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Load Bootstrap css -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/libs/bootstrap/css/bootstrap.min.css">
    <!-- Load Font awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/libs/fontawesome/css/all.min.css">
    <!-- load css modif -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/css/app.css">
</head>
<body>
    <nav class="navbar navbar-expand navbar-light warna prof justify-content-between">
        <div class="navbar-nav navbar-brand">
            <div class="nav-item">
                <a href="<?= base_url('home')?>" class="nav-link"><img src="<?= base_url() ?>asset/images/logos.png" class="img navbar-brand" alt="" srcset=""></a>
            </div>
        </div>
        <div class="navbar-nav">
            <div class="nav-item">
                <a href="<?=base_url('logout') ?>" class="nav-link btn btn-primary">Logout</a>
            </div>
        </div>
    </nav>
    <div class="jumbotron mt-1 ml-3 mr-3 jumbotron-position" style="background-image: url(<?= base_url()?>images/content/jumbo.png);">
    </div>
    <div class="bg-transparent pb-2 border-bottom">
        <div class=" test ml-3 mr-3 d-flex">
            <img class="jumbotron-img" src="<?= $content->image ? base_url("images/content/$content->image"): base_url('images/content/defaults.jpg')?>" alt="" srcset="">
            <div class="blockquote m-0">
                <h5 class="pt-5 m-0"><?= $content->username ?></h5>
                <small class="m-0">Member Sejak 01 jan 2020</small>
            </div>
        </div>
    </div>
    <div class="card">
		<div class="d-flex justify-content-between jingga">
		<h5 class="text-white">Informasi Acount</h5>
		<a href="<?= base_url("profile/update/$content->id") ?>" class="btn btn-primary">Edit</a>
		</div>
        <div class="card-body border">
            <div class="d-flex">
                <strong>Nama :</strong>
                <p><?=$content->username ?></p>
            </div>
            <div class="d-flex">
                <strong>Email :</strong>
                <p><?=$content->email ?></p>
            </div>
            <div class="d-flex">
                <strong>Status :</strong>
                <p><?= $content->role?></p>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-1 p-0">
        <div class="card-footer jingga border-bottom">
            <div class="col-md-12 border-bottom">
			
                <a class="" href=""><img src="<?= base_url() ?>asset/images/logos.png" alt="" srcset=""></a>
            </div>
            <p class="card-text text-white small">&copf; 2019 - <?= date('Y') ?> Website Portal Berita Online Jawa Barat </p>
        </div>
 </div>
    <script src="<?= base_url() ?>asset/libs/jquery/jquery.js"></script>
    <!-- slick -->
    <script src="<?= base_url() ?>asset/js/slick.min.js"></script>
    <!-- load js bootstrap -->
    <script src="<?= base_url() ?>asset/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>asset/js/app.js"></script>
</body>
</html>
