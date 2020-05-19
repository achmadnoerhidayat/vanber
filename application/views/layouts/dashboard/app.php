<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('layouts/dashboard/_head') ?>
<body>
    <!-- navbar -->
    <?php $this->load->view('layouts/dashboard/_navbar') ?>
    <!-- tutup navbar -->
    <!-- asside -->
    <div class="container-fluid">
        <div class="row d-flex">
			<!-- sidebar -->
            <?php $this->load->view('layouts/dashboard/_sidebar') ?>
			<!-- tutup sidebar -->
			<!-- content -->
            <?php $this->load->view($page) ?>
			<!-- tutup content -->
        </div>
    </div>
		<!-- tutup -->
		<!-- slick -->
		

</body>
</html>
