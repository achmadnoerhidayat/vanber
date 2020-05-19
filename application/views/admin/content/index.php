<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 ">
		<div class="box">
			<div class="box-header">
	<?php $this->load->view('layouts/dashboard/_alert') ?>
				<h3 class="pr-2 float-left">Data User</h3>
				<a href="<?= base_url('admin/content/create')?>" class="btn btn-primary">Tambah</a>
			</div>
			<div class="box-body">
				<div class="table-responsive pt-3">
			
					<table class="table border-0" id="datatable">
						<thead class="border-bottom-0">
							<tr>
								<th>No</th>
								<th>Title</th>
								<th>Categori</th>
								<th>Deskripsi</th>
								<th>Gambar</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php $no = 0; foreach($konten as $row) :  $no++;?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $row->content_title ?></td>
									<td><span class="badge badge-info text-lowercase pb-0"><i class="fas fa-tags"></i><?= $row->category_title ?></span></td>
									<td><?= expert($row->description,0,100) ?></td>
									<td><img class="w-100" src="<?= $row->image ? base_url("images/content/$row->image") : base_url('images/content/default.png') ?>" alt="" srcset="" ></td>
									<td style="width:100px">
										<?= form_open("admin/content/delete/$row->id",['method' => 'post']) ?>
										<?=form_hidden('id', $row->id) ?>
										<a href="<?= base_url("admin/content/edit/$row->id") ?>" class="btn btn-sm"><i class="fas fa-edit text-info"></i></a>
										<button class="btn btn-sm" onclick="return confirm('Apakah kamu yakin')"><span class="fas fa-trash text-danger"></span></button>
										<?= form_close() ?>
									</td>
								</tr>
						<?php endforeach ?>
								</tbody>
							</table>
			
			</div>
			<nav>
				<?= $pagination ?>
			</nav>
			</div>
</main>
<?php $this->load->view('layouts/dashboard/_script') ?>
<script>
	$(function(){
		$('#datatable').DataTable();
	});
</script>
