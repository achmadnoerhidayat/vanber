<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 ">
    <div class="card">
        <div class="card-header">
			<h5 class="float-left pr-2">Data Contents</h5>
        </div>
        <div class="card-body">
				<?= form_open_multipart($form_action, ['method' => 'POST']) ?>
						<?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
						<div class="form-group">
							<label for="">Title</label>
							<?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'onkeyup' => 'createSlug()', 'required' => true, 'autofocus' => true]) ?>
							<?= form_error('title') ?>
						</div>
						<div class="form-group">
							<label for="">descripsi</label>
							<?= form_textarea(['name' => 'description','id' => 'keterangan','value' => $input->description,'row' => 4, 'class' => 'form-control']) ?>
							<?= form_error('description') ?>
						</div>
						<?= form_dropdown('id_category',getDropdownList('category',['id','title']),$input->id_category,['class' => 'form-control']) ?>
						<?= form_error('id_category')?>
						<div class="form-group">
							<label for="">Publikasi Tidak</label><br>
							<div class="form-check form-check-inline">
						  <?= form_radio(['name' => 'is_avilable', 'value' => 1, 'checked' => $input->is_avilable == 1 ? true : false, 'form-check-input']) ?>
                          <label for="" class="form-check-label">Publikasi</label>
                        </div>
                        <div class="form-check form-check-inline">
						  <?= form_radio(['name' => 'is_avilable', 'value' => 0, 'checked' => $input->is_avilable == 0 ? true : false, 'form-check-input']) ?>
                          <label for="" class="form-check-label">Tunggu</label>
                        </div>
						</div>
						<div class="form-group">
                        <label for="">Photo</label>
						<?= form_upload('image') ?>
						<?php if($this->session->flashdata('image_error')) : ?>
							<small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
						<?php endif ?>
						<?php if($input->image): ?>
								<img src="<?= base_url("./images/content/$input->image") ?>" alt="" height="150">
								<?php endif ?>
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
