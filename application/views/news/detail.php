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
                    <div class="navbar-nav col-md-10 justify-content-center">
                        <form action="<?= base_url("home/search") ?>" method="POST">
                            <div class="input-group">
                                <input type="text" name="find" class="form-control" placeholder="search" value="<?= $this->session->set_userdata('find') ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="navbar-nav col-md-2 justify-content-end">
                        <div class="nav-item pr-1">
                            <a href="<?=base_url('login') ?>" class="nav-link jingga">Login</a>
                        </div>
                        <div class="nav-item">
                            <a href="<?=base_url('register') ?>" class="nav-link">Register</a>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
        <div class="container p-0 ">
            <div class="col-md-12">
                <img src="<?= base_url()?>asset/images/logos.png" alt="" srcset="">
            </div>
            <div class="navbar navbar-expand-sm navbar-light jingga p-0">
			<div class="navbar-nav">
				<ul class="hover nav-item m-0 p-0 border-right">
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
                	<div class="col-md-9 carousel pr-1" data-ride="carousel" id="postCarousel">
                        <!-- content -->
                        <div class="col-md-12 pl-0 pr-0 jingga">
                            <div class="card jingga text-white">
                                <div class="card-body p-0">
									<small class="card-text">Rab 10 November 2020</small>
									<h3 class="card-title text-truncate"><?= $berita->title ?></h3>
									<img class="w-100 h-25" src="<?= base_url("images/content/$berita->image") ?>" alt="" srcset="">
									<?=$berita->description ?>
								</div>
							</div>
						</div>
							<div class="card-footer pt-3 bg-white p-0">
								<?php foreach(getComents($berita->id) as $row):?>
								<div class="be-coment d-flex">
									<img class="" src="<?= base_url('images/content/defaults.jpg') ?>" alt="" srcset="" width="50">
									<div class="card">
										<div class="card-body">
											<blockquote class="blockquote" style="width:800px">
												<small><?= $row->name?></small>
												<footer class="card-blockquote">coment :<cite title="Source title"><small><?= $row->description ?></small></cite></footer>
											</blockquote>
										</div>
									</div>
								</div>
								<?php endforeach ?>
								<?= form_open(base_url('comentar/create'),['method' => 'POST']) ?>
								<?= form_hidden('id_content',$berita->id) ?>
									<div class="row">
										<div class="col-sm-6 gambar">
											<div class="input-group">
												<div class="input-group-append">
													<i class="far fa-address-book fa-border p-2"></i>
												</div>
												<?= form_input('name','',['class' => 'form-control','required' => true]) ?>
												<?= form_error() ?>
											</div>
										</div>
										<div class="col-sm-6 gambar">
											<div class="input-group">
												<div class="input-group-append">
													<i class="far fa-envelope fa-border p-2"></i>
												</div>
												<?= form_input('email','',['class' => 'form-control','required' => true]) ?>
												<?= form_error() ?>
											</div>
										</div>
									</div>
								<?= form_textarea(['name' => 'description', 'class' => 'form-control','row' =>4]) ?>
								<button class="btn btn-primary">Submit</button>
							</form>
						</div>
                        <!-- tutup content -->
                </div>
                <div class="col-md-3 p-0 pr-3 sidebar-sticky hilang">
						<?php foreach($konten as $row): ?>
						<div class="card">
							<h5 class="jingga mb-0 text-white"><?= $row->category_title ?></h5>
							<img class="w-100 h-100" src="<?= $row->image ? base_url("images/content/$row->image"): base_url('images/content/default.png')?>" alt="" srcset="">
								<div class="card-body p-0">
									<a href="<?= base_url("news/detail/$row->content_slug")?>" class="text-decoration-none"><p class="card-title text-dark"><?=$row->content_title ?></p></a>
								</div>
								<?php foreach(getNewsCategory($row->id_category) as $con): ?>
								<div class="row no-gutters border-top">
									<div class="col-md-4">
										<img class="w-100 h-100" src="<?= $con->image ? base_url("images/content/$con->image"): base_url('images/content/default.png')?>" class="card-img" alt="...">
									</div>
									<div class="col-md-8">
										<div class="card-body p-0">
											<a href="<?= base_url("news/detail/$con->slug")?>" class="nav-link">
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
        <!-- load jquery -->
        <script src="<?= base_url() ?>asset/libs/jquery/jquery.js"></script>
        <!-- slick -->
        <script src="<?= base_url() ?>asset/js/slick.min.js"></script>
        <!-- load js bootstrap -->
        <script src="<?= base_url() ?>asset/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>asset/js/app.js"></script>
</body>
</html>
