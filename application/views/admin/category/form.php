<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 ">
    <div class="card">
        <div class="card-header">
			<h5 class="float-left pr-2">Data User</h5>
        </div>
        <div class="card-body">
				<?= form_open($form_action, ['method' => 'POST']) ?>
						<?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
						<div class="form-group">
							<label for="">Kategori</label>
							<?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'onkeyup' => 'createSlug()', 'required' => true, 'autofocus' => true]) ?>
							<?= form_error('title') ?>
						</div>
						<div class="form-group">
							<label for="">Slug</label>
							<?= form_input('slug', $input->slug, ['class' => 'form-control', 'id' => 'slug', 'required' => true]) ?>
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
