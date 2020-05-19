<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 ">
    <div class="card">
        <div class="card-header">
			<h5 class="float-left pr-2">Data User</h5>
        </div>
        <div class="card-body">
				<?= form_open($form_action, ['method' => 'POST']) ?>
						<?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
						<div class="form-group">
							<label for="">username</label>
							<?= form_input('name', $input->name, ['class' => 'form-control', 'id' => 'title']) ?>
							<?= form_error('name') ?>
						</div>
						<div class="form-group">
							<label for="">E mail</label>
							<?= form_input('email', $input->email, ['class' => 'form-control', 'id' => 'title']) ?>
							<?= form_error('email') ?>
						</div>
						<div class="form-group">
						<label for="">Konten berita</label>
						<?= 
								form_dropdown('id_content', getdropdownList('content',['id','title']), $input->id_content,['class' => 'form-control']);
								 ?>
								 <?= form_error()?>
						</div>
						<div class="form-group">
							<label for="">Isi Komentar</label>
							<?= form_textarea(['name' => 'description', 'value' => $input->description, 'row' => 4,'class' => 'form-control']) ?>
							<?= form_error('email') ?>
						</div>
						<button type="submit" class="btn btn-primary">Simpan</button>
					<?= form_close() ?>
    	</div>
    </div>
</main>
