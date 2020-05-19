<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <!-- Load Bootstrap css -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/libs/bootstrap/css/bootstrap.min.css">
    <!-- Load Font awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/libs/fontawesome/css/all.min.css">
    <!-- load css modif -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/css/app.css">
</head>
<body>
        <div class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
            <div class="container">
                <div class="navbar-brand">
                    <p>Rabu 20-Apr-2020</p>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"  aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color: black"></span>
                  </button>
                <div class="collapse navbar-collapse row" id="navbarCollapse">
                    <div class="navbar-nav col-sm-10 justify-content-center">
                        <form action="<?= base_url('home/search') ?>" method="POST">
                            <div class="input-group">
                                <input type="text" name="find" class="form-control" placeholder="search" value="<?= $this->session->set_userdata('find') ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="navbar-nav col-sm-2 justify-content-end">
					<?php if(!$this->session->userdata('is_login')): ?>
							<div class="nav-item pr-1">
								<a href="<?=base_url('login') ?>" class="nav-link jingga">Login</a>
							</div>
							<div class="nav-item">
								<a href="<?=base_url('register') ?>" class="nav-link">Register</a>
							</div>
							<?php else : ?>
							<li class="nav-item dropdown">
								<?php $user = $this->session->userdata('image'); ?>
								<a href="" class="nav-link dropdown-toggle" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="" alt="" srcset=""><img class="radius" src="<?=$user ? base_url("images/content/$user"): base_url('images/content/defaults.jpg') ?>" alt="" srcset="" width="50" height="50"></a>
								<div class="dropdown-menu" aria-labelledby="dropdown-2">
									<a href="<?= base_url('/profile') ?>" class="dropdown-item">Profile</a>
									<a href="<?= base_url('/logout') ?>" class="dropdown-item">Logout</a>
								</div>
							</li>
							<?php endif ?>
                    </div>
                  </div>
            </div>
        </div>
        <div class="container p-0 ">
            <div class="col-sm-12">
                <img src="<?= base_url()?>asset/images/logos.png" alt="" srcset="">
            </div>
            <div class="navbar navbar-expand-sm navbar-light jingga p-0">
				<div class="navbar-nav">
					<ul class="hover nav-item m-0 p-0">
						<a href="<?= base_url('home') ?>" class="nav-link jingga text-white p-2">HOME</a>
					</ul>
				</div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse-2" aria-controls="navbarCollapse"  aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color: black"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse-2">
							<?php foreach(getcategories() as $row): ?>
                            <div class="navbar-nav">
                                <ul class="hover nav-item m-0 p-0">
                                    <a href="<?= base_url("news/category/$row->slug") ?>" class="nav-link jingga text-white p-2"><?php echo $row->title ?></a>
                                </ul>
							</div>
							<?php endforeach ?>
                    </div>
            </div>
            <div class="row mt-1 ">
                <div class="col-sm-9 carousel pr-1" data-ride="carousel" id="postCarousel">
                    <div class="row mt-1">
                        <div class="col-sm-4 p-0 pl-3 sidebar-sticky hilang">
							<?php $get = getNewsContent()[0] ?>
							<div class="card">
								<div class="hover jingga">
									<strong class="mb-0 text-white">Berita Terbaru</strong>
								
								</div>
								<a href="<?= $get->slug?>" class="nav-link p-0" title="Permerintah mealkukan peraturan PSBB"><img src="<?= base_url("images/content/$get->image")?>" class="card-img-top" alt="" srcset=""></a>
								<div class="car-text">
									<small class="pl-2 t"><?= $get->title ?></small>
								</div>
								<?php foreach(getNewsContent() as $row): ?>
                               <div class="row no-gutters border-top">
                                   <div class="col-sm-4 pt-1">
                                    <img class="w-100 h-100 pr-1" title="Ruang terbuka hijau" src="<?= base_url("images/content/$row->image") ?>" alt="" srcset="">
                                   </div>
                                   <div class="col-sm-8">
                                            <a href="<?= base_url("news/detail/$row->slug")?>" class="nav-link p-0" ><strong class="card-title text-dark"><?= $row->title ?></strong></a>
                                            <p class="card-text small"><?= expert($row->description,0,50) ?></p>
                                   </div>
                               </div>
							<?php endforeach; ?>
						   </div>
                        </div>
                        <!-- content -->
                        <div class="col-sm-8 pl-0 jingga">
                            <div class="card jingga">
								<div class="hover">
									<strong class="text-white"><?= isset($category) ? $category : 'News Feed' ?></strong>
								</div>
								<?php foreach($content as $row): ?>
                                <div class="row no-gutters pb-1 border-bottom">
                                    <div class="col-sm-4 gambar">
                                        <a href="<?= base_url("news/detail/$row->content_slug")?>"><img class="w-100 h-100" src="<?=base_url("images/content/$row->image") ?>" alt="" srcset=""></a>
                                    </div>
                                    <div class="col-sm-8 text-white gambar">
                                        <a href="<?= base_url("news/detail/$row->content_slug")?>"><strong class="card-title d-block text-warning"><?= $row->content_title ?></strong></a>
                                        <small class="card-text"><?= expert($row->description,0,150) ?></small>
                                    </div>
                                </div>
								<?php endforeach ?>
                            </div>
						</div>
                        <!-- tutup content -->
                    </div>
                </div>
                <div class="col-sm-3 p-0 pr-3 sidebar-sticky hilang pt-1 ">
						<?php foreach($konten as $row): ?>
					<div class="card">
						<div class="hover jingga">
    						<strong class="mb-0 text-white"><?= $row->category_title ?></strong>
						</div>		
      					<img class="w-100 h-100" src="<?= $row->image ? base_url("images/content/$row->image"): base_url('images/content/default.png')?>" alt="" srcset="">
      						<div class="card-body p-0">
             	 				<a href="<?= base_url("news/detail/$row->content_slug")?>" class="text-decoration-none"><p class="card-title text-dark"><?=$row->content_title ?></p></a>
          					</div>
							<?php foreach(getNewsCategory($row->id_category) as $con): ?>
          					<div class="row no-gutters border-top">
              					<div class="col-sm-4">
                  					<img class="w-100 h-100" src="<?= $con->image ? base_url("images/content/$con->image"): base_url('images/content/default.png')?>" class="card-img" alt="...">
              					</div>
            					<div class="col-sm-8">
                					<div class="card-body p-0">
                    					<a href="<?= base_url("news/detail/$row->content_slug")?>" class="nav-link">
                        				<p class="card-title text-wrap text-dark"><small><?= expert($con->description,0,50) ?></small></p>
                    					</a>
              						</div>
      							</div>
          				</div>
					<?php endforeach ?>
 				</div>
				<?php endforeach ?>
        	</div>
	</div>
            <div class="col-sm-12 mt-3 p-0">
				<div class="card-footer jingga border-bottom">
					<div class="col-sm-12 border-bottom">
						<a class="" href=""><img src="<?= base_url() ?>asset/images/logos.png" alt="" srcset="" width="150px"></a>
					</div>
					<p class="card-text text-white small">&copf; 2020 Website Portal Berita Online Jawa Barat </p>
				</div>
			</div>
	</div>
        <!-- load jquery -->
        <script src="<?= base_url() ?>asset/libs/jquery/jquery.js"></script>
        <!-- slick -->
        <script src="<?= base_url() ?>asset/js/slick.min.js"></script>
        <!-- load js bootstrap -->
        <script src="<?= base_url() ?>asset/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>asset/js/app.js"></script>
</body>
</html>
