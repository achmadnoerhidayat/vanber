<?php $this->load->view('layouts/dashboard/_alert') ?>
<div class="col-md-12">
	<img src="<?= base_url()?>asset/images/logos.png" alt="" srcset="">
</div>
	<nav class="navbar navbar-expand-sm navbar-light jingga p-0">
		<div class="navbar-nav">
			<ul class="hover nav-item m-0 p-0">
				<a href="<?= base_url('home') ?>" class="nav-link jingga text-white p-2">HOME</a>
			</ul>
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse-2" aria-controls="navbarCollapse"  aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon" style="color: black"></span>
		</button>
			<div class="collapse navbar-collapse" id="navbarCollapse-2">
					<?php foreach(getCategories() as $row): ?>
				<div class="navbar-nav">
					<ul class="hover nav-item m-0 p-0 borderd">
						<a href="<?= base_url("news/category/$row->slug") ?>" class="nav-link jingga text-white p-2"><?=$row->title ?></a>
					</ul>
				</div>
					<?php endforeach ?>
			</div>
</nav>
