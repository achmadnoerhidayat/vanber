<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <!-- Load Bootstrap css -->
    <link rel="stylesheet" href="<?= base_url()?>asset/libs/bootstrap/css/bootstrap.min.css">
    <!-- Load Font awesome -->
	<link rel="stylesheet" href="<?= base_url()?>asset/libs/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url()?>asset/summernote/summernote-bs4.css">
    <!-- load css modif -->
    <link rel="stylesheet" href="<?= base_url()?>asset/css/app.css">
</head>
<body>
	<!-- navbar -->
	<?php $this->load->view('layouts/frontend/_navbar') ?>
	<!-- tutup navbar -->
	<main role="main">
	<div class="container p-0">
		<!-- header  -->
		<?php $this->load->view('layouts/frontend/_header') ?>
		<!-- tutup header -->
		<div class="row mt-1">
			<div class="col-sm-9 carousel pr-1" data-ride="carousel" id="postCarousel">
				<!-- halaman card slide -->
				<?php $this->load->view('layouts/frontend/_card') ?>
				<!-- tutup halaman slide -->
				<!-- halaman gambar -->
				<?php $this->load->view('layouts/frontend/_image') ?>
				<!-- tutup halaman -->
				
                    <div class="row mt-1">
                        <!-- sidebar -->
						<?php $this->load->view('layouts/frontend/_sidebar') ?>
						<!-- tutup -->
                        <!-- content -->
                        <?php $this->load->view($page) ?>
                        <!-- tutup content -->
                    </div>
                </div>
				
                <aside class="col-sm-3 p-0 pr-3 sidebar-sticky hilang">
                    <!-- aside -->
					<?php $this->load->view('layouts/frontend/_aside') ?>
					<!-- tutup -->
                </aside>
		</div>
		
            <footer class="col-sm-12 mt-3 p-0">
                    <div class="card-footer jingga border-bottom">
                        <div class="col-sm-12 border-bottom">
                            <a class="" href=""><img src="<?= base_url()?>asset/images/logos.png" alt="" srcset="" width="150px"></a>
                        </div>
                        <p class="card-text text-white small">&copf; 2019-<?=date('Y')?> Website Portal Berita Online Jawa Barat </p>
                    </div>
             </footer>
</div>
</main>

        <!-- load jquery -->
        <script src="<?= base_url() ?>asset/libs/jquery/jquery.js"></script>
        <!-- slick -->
        <script src="<?= base_url() ?>asset/js/slick.min.js"></script>
        <!-- load js bootstrap -->
		<script src="<?= base_url() ?>asset/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>asset/js/app.js"></script>
</body>
</html>
