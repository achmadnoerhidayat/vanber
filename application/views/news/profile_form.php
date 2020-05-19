<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Load Bootstrap css -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/libs/bootstrap/css/bootstrap.min.css">
    <!-- Load Font awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/libs/fontawesome/css/all.min.css">
    <!-- load css modif -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/css/app.css">
	<title><?= $title ? $title : 'Vanber' ?></title>
</head>
<body>
	<main role="main" class="container">
		<div class="row">
			<div class="col-sm-8 mx-auto">
				<div class="card">
					<strong class="h5 jingga text-center text-white card-header">edit Profile</strong>
					<div class="card-body">
						<?= form_open_multipart($form_action,['method' => 'POST'])?>
						<?= isset($input->id) ? form_hidden('id',$input->id): ''?>
						<div class="form-group">
							<label for="">Username</label>
							<?= form_input('username',$input->username,['class' => 'form-control', 'required' => true,'autofocus' =>true])?>
							<?= form_error('username') ?>
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<?= form_input('email',$input->email,['class' => 'form-control', 'required' => true])?>
							<?= form_error('email')?>
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<?= form_password('password','',['class' => 'form-control'])?>
							<?= form_error('password')?>
						</div>
						<div class="form-group">
							<label for="">Photo</label>
							<?= form_upload('image') ?>
							<?php if($this->session->flashdata('image_error')) : ?>
								<small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
							<?php endif ?>
							<?php if(isset($input->image)): ?>
							<img src="<?= base_url("/images/content/$input->image") ?>" alt="" height="150">
							<?php endif ?>
							</div>
							<button class="btn btn-primary" type="submit">Edit</button>
							<?= form_close()?>
					</div>
				</div>
			</div>
		</div>
	</main>

<script src="<?= base_url() ?>asset/libs/jquery/jquery.js"></script>
<!-- slick -->
<script src="<?= base_url() ?>asset/js/slick.min.js"></script>
<!-- load js bootstrap -->
<script src="<?= base_url() ?>asset/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>asset/js/app.js"></script>
</body>
</html>
