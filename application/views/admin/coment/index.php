<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 ">
<?php $this->load->view('layouts/dashboard/_alert') ?>
    <div class="box">
        <div class="box-header">
			<h5 class="float-left pr-2">Data User</h5>
			<a href="<?= base_url('admin/category/create')?>" class="btn btn-primary">Tambah</a>
        </div>
            <div class="box-body">
				<div class="table-responsive pt-3">
					<table class="table" id="datatable">
						<thead>
							<tr>
								<th>No</th>
								<th>Berita</th>
								<th>Username</th>
								<th>E-mail</th>
								<th>isi komentar</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php $no = 0; foreach($content as $row) :  $no++;?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $row->title?></td>
									<td><?= $row->name ?></td>
									<td><?= $row->email ?></td>
									<td><?= expert($row->description,0,50) ?></td>
									<td>
										<?= form_open("admin/coment/delete/$row->id",['method' => 'post']) ?>
										<?=form_hidden('id', $row->id) ?>
										<a href="<?= base_url("admin/coment/edit/$row->id") ?>" class="btn btn-sm"><i class="fas fa-edit text-info"></i></a>
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
