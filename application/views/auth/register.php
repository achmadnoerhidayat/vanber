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
    <!-- load css modif -->
    <link rel="stylesheet" href="<?= base_url()?>asset/css/app.css">
	<style type="text/css">
		body{
			background-color: #003471;
		}
	</style>
</head>
<body>
<main role="main" class="container">
      <div class="row">
          <div class="col-md-8 mx-auto">
              <div class="card">
                      <h1 class="text-center card-header-pills pt-2">Register</h1>
                  <div class="card-body">
                      <form action="<?= $form_action ?>" method="POST">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="username" class="form-control" value="<?= $input->username ?>" required autofocus>
                            <?=form_error('username') ?>
                          </div>
                          <div class="form-group">
                              <label for="">Email</label>
                              <input type="email" name="email" class="form-control" value="<?=$input->email?>" required>
                              <?=form_error('email') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" required>
                                <?=form_error('password') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                                <?=form_error('password_confirmation') ?>
                            </div>
                            <input type="submit" value="masuk" class="btn btn-primary">
                        </form>
                    </div>
                </div>
          </div>
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
