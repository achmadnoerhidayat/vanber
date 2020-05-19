<div class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
	<div class="container">
                <div class="navbar-brand">
                    <p><?= date('D.d.M.Y') ?></p>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"  aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color: black"></span>
                  </button>
                <div class="collapse navbar-collapse row" id="navbarCollapse">
                    <div class="navbar-nav col-md-10 justify-content-center">
                        <form action="<?= base_url('home/search') ?>" method="POST">
                            <div class="input-group">
                                <input type="text" name="find" class="form-control" placeholder="serch" value="<?= $this->session->userdata('find')?>">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="navbar-nav col-md-2 justify-content-end">
						<?php if(!$this->session->userdata('is_login')): ?>
                        <div class="nav-item pr-1">
                            <a href="<?= base_url('login') ?>" class="nav-link bg-primary">Login</a>
                        </div>
                        <div class="nav-item">
                            <a href="<?= base_url('register') ?>" class="nav-link">Register</a>
						</div>
						<?php else : ?>
							<li class="nav-item dropdown">
							<?php $user =$this->session->userdata('image'); ?>
					<a href="#" class="nav-link dropdown-toggle" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="radius" src="<?=$user ? base_url("images/content/$user"): base_url('images/content/defaults.jpg') ?>" alt="" srcset="" width="50" height="50"></a>
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
