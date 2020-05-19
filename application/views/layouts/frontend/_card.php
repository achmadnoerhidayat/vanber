<div class="col-md-12 p-0">
    <div class="berita card-block">
	<?php foreach(getContent() as $row): ?>
		<div class="item pr-1">
			<img src="<?= $row->image ? base_url("images/content/$row->image") : base_url('images/content/default.png') ?>" alt="" class="card-img-top h-100">
			<a href="<?= base_url("news/detail/$row->slug") ?>"><span class="judul"><?= $row->title ?> jan</span></a>
		</div>
	<?php endforeach ?>
    </div>
        <strong class="next bg-white"><i class="fas fa-chevron-circle-right"></i></strong>
    	<strong class="pref bg-white"><i class="fas fa-chevron-circle-left"></i></strong>
</div>
