<div class="col-md-2 d-none d-md-block sidebar mt-5 bg-dark">
    <div class="sidebar-sticky">
				<ul class="list-group">
					<li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed bg-dark">
							<a href="<?= base_url('admin/dashboard') ?>"><strong class="text-white">Dashboard</strong></a>
					</li>
					<a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-start align-items-center text-white">
							<i class="fa fa-columns fa-fw mr-3"></i>
							<span class="menu-collapsed">My Berita</span>
							<span><i class="fas fa-angle-down pl-2"></i></span>
						</div>
					</a>
					<div id='submenu1' class="collapse sidebar-submenu">
						<a href="<?= base_url('admin/user')?>" class="list-group-item list-group-item-action bg-dark text-white">
							<span class="menu-collapsed"><i class="fas fa-user"></i> User</span>
						</a>
						<a href="<?= base_url('admin/content')?>" class="list-group-item list-group-item-action bg-dark text-white">
							<span class="menu-collapsed"><i class="fas fa-book"></i> Content</span>
						</a>
						<a href="<?= base_url('admin/coment')?>" class="list-group-item list-group-item-action bg-dark text-white">
							<span class="menu-collapsed"><i class="fas fa-comment-dots"></i> Coments</span>
						</a>
						<a href="<?= base_url('admin/category')?>" class="list-group-item list-group-item-action bg-dark text-white">
							<span class="menu-collapsed"><i class="fas fa-cubes"></i> Category</span>
						</a>
					</div>
					<a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-start align-items-center text-white">
							<span class="fa fa-audio-description fa-fw mr-3"></span>
							<span class="menu-collapsed">add Content</span>
							<span><i class="fas fa-angle-down pl-2"></i></span>
						</div>
					</a>
					<div id='submenu2' class="collapse sidebar-submenu">
					<a href="<?= base_url('admin/user/create')?>" class="list-group-item list-group-item-action bg-dark text-white">
							<span class="menu-collapsed"><i class="fas fa-table"></i> Table User</span>
						</a>
						<a href="<?= base_url('admin/content/create')?>" class="list-group-item list-group-item-action bg-dark text-white">
							<span class="menu-collapsed"><i class="fas fa-table"></i> Table Content</span>
						</a>
						<a href="<?= base_url('admin/coment/create')?>" class="list-group-item list-group-item-action bg-dark text-white">
							<span class="menu-collapsed"><i class="fas fa-table"></i> Table Coments</span>
						</a>
						<a href="<?= base_url('admin/category/create')?>" class="list-group-item list-group-item-action bg-dark text-white">
							<span class="menu-collapsed"><i class="fas fa-table"></i> Table Category</span>
						</a>
					</div>            
				
				</ul>
    	</div>
    </div>
</div>
