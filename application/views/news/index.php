<div class="col-sm-8 pl-0 contents">
        <div class="card jingga">
			<div class="hover">
				<strong class="text-white">News Feed</strong>
				
			</div>
			<?php foreach($content as $row): ?>
            <article class="row no-gutters pb-1 border-bottom">
                <div class="col-sm-4 reli gambar">
					<a href="<?= base_url("news/detail/$row->slug") ?>" class="hovers"><img class="w-100 h-100" src="<?= $row->image ? base_url("images/content/$row->image") : base_url("images/content/default.png") ?>" alt="" srcset=""></a>
					<span class="spans"></span>
                </div>
                <div class="col-sm-8 text-white gambar-2">
                <a href="<?= base_url("news/detail/$row->slug") ?>"><strong class="card-title d-block text-warning"><?=$row->title ?></strong></a>
                <?= expert($row->description,0,150) ?>
                </div>
            </article>
			<?php endforeach ?>
		<nav aria-label="page navigation example" style="padding: 1px 200px">
			<?= $pagination ?>
		</nav>
        </div>
</div>

