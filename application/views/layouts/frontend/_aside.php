<?php foreach($konten as $row): ?>
<div class="card">
		<div class="hover jingga">
    	<strong class="w-25 mb-0 text-white"><?= $row->category_title ?></strong>
		</div>
		<div class="card-image">
      <img class="w-100 h-100" src="<?= $row->image ? base_url("images/content/$row->image"): base_url('images/content/default.png')?>" alt="" srcset="">
		
		</div>
      		<div class="card-body p-0">
              <a href="<?= base_url("news/detail/$row->slug")?>" class="text-decoration-none"><p class="card-title text-dark"><?=$row->content_title ?></p></a>
          </div>
					<?php foreach(getNewsCategory($row->id_category) as $con): ?>
          <article class="row no-gutters border-top">
              	<div class="col-sm-4">
                  <img class="w-100 h-100" src="<?= $con->image ? base_url("images/content/$con->image"): base_url('images/content/default.png')?>" class="card-img" alt="...">
              	</div>
            	<div class="col-sm-8">
                	<div class="card-body p-0">
                    	<a href="<?= base_url("news/detail/$con->slug")?>" class="nav-link">
                        <?= expert($con->description,0,50) ?>
                    	</a>
              		</div>
      			</div>
          </article>
					<?php endforeach ?>
  </div>
<?php endforeach ?>
