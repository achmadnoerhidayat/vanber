<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 ">
<?php $this->load->view('layouts/dashboard/_alert') ?>
    <div class="box">
        <div class="box-header">
			<h5 class="float-left pr-2">Data Category</h5>
			<a href="<?= base_url('admin/category/create')?>" class="btn btn-primary">Tambah</a>
        </div>
            <div class="box-body">
				<div class="table-responsive pt-3">
					<table class="table" id="datatable">
						<thead>
							<tr>
								<th>No</th>
								<th>Title</th>
								<th>Slug</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php $no = 0; foreach($konten as $row) :  $no++;?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $row->title ?></td>
									<td><?= $row->slug ?></td>
									<td>
										<?= form_open("admin/category/delete/$row->id",['method' => 'post']) ?>
										<?=form_hidden('id', $row->id) ?>
										<a href="<?= base_url("admin/category/edit/$row->id") ?>" class="btn btn-sm"><i class="fas fa-edit text-info"></i></a>
										<button class="btn btn-sm" onclick="return confirm('Apakah kamu yakin')"><span class="fas fa-trash text-danger"></span></button>
										<?= form_close() ?>
									</td>
								</tr>
						<?php endforeach ?>
								</tbody>
							</table>

				</div>
						<nav aria-label="page navigation example">
							<?= $pagination ?>
						</nav>
                    </div>
                </div>
</main>
<?php $this->load->view('layouts/dashboard/_script') ?>
<script>
	$(function(){
		$('#datatable').DataTable();
	});
</script>
