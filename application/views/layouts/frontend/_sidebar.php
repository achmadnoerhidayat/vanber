<section class="col-sm-4 p-0 pl-3 siderbar-sticky hilang">
		<div class="card">
			<?php $get = getNewsContent()[3] ?>
			<div class="hover jingga">
				<strong class="mb-0 text-white">Berita Terbaru</strong>
			</div>
				<a href="<?= base_url("news/detail/$get->slug")?>" class="nav-link p-0" title="Permerintah mealkukan peraturan PSBB"><img src="<?= base_url("images/content/$get->image")?>" class="card-img-top" alt="" srcset=""></a>
			<div class="car-text">
				<small class="pl-2 t"><?= $get->title ?></small>
			</div>
			<?php foreach(getNewsContent() as $row): ?>
			<article class="row no-gutters border-top">
				<div class="col-sm-4 pt-1">
					<img class="w-100 h-100 pr-1" title="<?= $row->title ?>" src="<?= $row->image ? base_url("images/content/$row->image") : base_url('images/content/default.png') ?>" alt="" srcset="">
				</div>
				<div class="col-sm-8">
					<a href="<?= base_url("news/detail/$row->slug")?>" class="nav-link p-0" ><strong class="card-title text-dark"><?= $row->title ?></strong></a>
					<?= expert($row->description,0,50) ?>
				</div>
			</article>
			<?php endforeach ?>
		</div>
</section>
