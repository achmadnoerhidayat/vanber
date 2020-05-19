<div class="col-md-12 mt-1 p-0">
<?php foreach(getImageContent() as $con): ?>
    <div class="card">
        <div class="card-body p-0 jingga text-white-50">
				<img src="<?= $con->image ? base_url("images/content/$con->image"): base_url('images/content/default.png')?>" class="w-100 h-100 gambar-3" alt="" srcset="">
				<h5 class="card-title border-bottom"><?= $con->title?></h5>
				<?= $con->description ?>
        </div>
    </div>
	<?php endforeach ?>
</div>
