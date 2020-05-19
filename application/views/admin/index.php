<main role="main" class="col-sm-9 ml-sm-auto col-lg-10 pt-3 px-4 ">
		<div class="row">
			<div class="col-sm">
				<div class="card bg-hijau">
					<div class="card-body">
						<div class="row pb-3">
							<div class="col-sm-4">
								<h1 class=" w-100 text-center radius bg-white"><i class="fas fa-book-reader"></i></h1>
							</div>
							<div class="col-sm-8 p-0 text-white">
								<p class="mb-0"><?= contentCount() ?></p>
								<p class="card-title">Total Post Berita</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm">
				<div class="card bg-grand">
					<div class="card-body">
						<div class="row pb-3">
							<div class="col-sm-4">
								<h1 class=" w-100 text-center radius bg-white"><i class="fas fa-comments"></i></h1>
							</div>
							<div class="col-sm-8 p-0 text-white">
								<p class="mb-0"><?= comentCount() ?></p>
								<p class="card-title">Total Coments</p>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<div class="col-sm">
				<div class="card jingga">
					<div class="card-body cards">
						<div class="row pb-3">
							<div class="col-sm-4">
								<h1 class=" w-100 text-center radius bg-white"><i class="fas fa-user-check"></i></h1>
							</div>
							<div class="col-sm-8 p-0 text-white">
								<p class="mb-0"><?= userCount() ?></p>
								<p class="card-title">Total Users</p>
							</div>
						</div>
					</div>
				</div>
					
				</div>
		</div>
		<div class="card mt-3">
			<h6 class="card-header">data Post Terbaru </h6>
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Judul Post</th>
							<th>descripsi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($conntent as $row): ?>
						<tr>
							<td>1</td>
							<td><?= $row->title ?></td>
							<td><?=expert( $row->description,0,50) ?></td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
</main>
<?php $this->load->view('layouts/dashboard/_script') ?>

