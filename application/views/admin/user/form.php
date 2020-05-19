<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 ">
    <div class="card">
        <div class="card-header">
			<h5 class="float-left pr-2">Data User</h5>
        </div>
        <div class="card-body">
				<?= form_open($form_action, ['method' => 'POST']) ?>
						<?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
						<div class="form-group">
							<label for="">Username</label>
							<?= form_input('username', $input->username, ['class' => 'form-control', 'required' => true, 'autofocus' => true]) ?>
							<?= form_error('username') ?>
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true]) ?>
							<?= form_error('email') ?>
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<?= form_input(['type' => 'password', 'name' => 'password', 'value' => $input->password, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true]) ?>
							<?= form_error('email') ?>
						</div>
						<div class="form-group">
							<label for="">Role</label>
							<?= form_dropdown('id_akses',getdropdownList('akses',['id','role']),$input->id_akses,['class' => 'form-control'])?>
							<?= form_error('slug') ?>
						</div>
						<button type="submit" class="btn btn-primary">Simpan</button>
					<?= form_close() ?>
    	</div>
    </div>
</main>
<?php $this->load->view('layouts/dashboard/_script') ?>
<script type="text/javascript">
	$(function(){
	$('#keterangan').summernote({
		height: 150,   //set editable area's height
  		codemirror: { // codemirror options
    	theme: 'monokai'
 	 }
	});
});
</script>
