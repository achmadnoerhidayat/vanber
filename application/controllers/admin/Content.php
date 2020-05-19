<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Content extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$role = $this->session->userdata('id_akses');
		if ($role != 1) {
			$this->session->set_flashdata('warning', 'Halaman Admin');
			redirect(base_url('home'));
		}
	}
	
		public function index($page = null)
		{
			$data['title'] = 'Admin: Content';
			$data['konten'] = $this->content->select(
				[
					'content.id','content.title AS content_title','content.description','content.image','content.is_avilable','category.title AS category_title'
				])
				->join('category')
				->paginate($page)
				->get();
			$data['total_rows'] = $this->content->count();
			$data['pagination'] = $this->content->makePagination(
				base_url('admin/content'), 3, $data['total_rows']
			);
			$data['page'] = 'admin/content/index';
			$this->dash($data);
		}
		
		public function search($page = null)
		{
			if (isset($_POST['find'])) {
				$this->session->set_userdata('find', $this->input->post('find'));
			}else {
				redirect(base_url('admin/content'));
			}
			$find = $this->session->userdata('find');
			$data['title'] = 'Admin: search Content';
			$data['konten'] = $this->content->select(
				[
					'content.id','content.title AS content_title','content.description','content.image','content.is_avilable','category.title AS category_title'
				])
				->join('category')
				->like('content.title',$find)
				->paginate($page)
				->get();
			$data['total_rows'] = $this->content->like('content.title',$find)->count();
			$data['pagination'] = $this->content->makePagination(
				base_url('admin/content/search'), 4, $data['total_rows']
			);
			$data['page'] = 'admin/content/index';
			$this->dash($data);
		}

		public function create()
		{
			/**
			 * cek apakah user masukan dengan post
			 */
			if (!$_POST) {
				$input = (object) $this->content->getDefaultValues();
			}else {
				$input = (object) $this->input->post(null,FALSE);
			}
			// cek apakah image ya tida kosong
			if (!empty($_FILES) && $_FILES['image'] !== '') {
				$imageName = url_title($input->title, '-',FALSE). '-'.date('YmdHis');
				$upload = $this->content->uploadImage('image',$imageName);
				if ($upload) {
					$input->image = $upload['file_name'];
				}else {
					redirect(base_url('admin/content/create'));
				}
			}
			if (!$this->content->validate()) {
				$data['title'] = 'Admin Tambah Content';
				$data['input'] = $input;
				$data['form_action'] = base_url('admin/content/create');
				$data['page'] = 'admin/content/form';
				$this->dash($data);
				return;
			}
			if ($this->content->create($input)) {
				$this->session->set_flashdata('success','Menambahkan Content');
			}else {
				$this->session->set_flashdata('error','Menambahkan Content');
			}
			redirect(base_url('admin/content'));
		}
		public function edit($id)
		{
			$data['kontent'] = $this->content->where('id',$id)->first();
			if (!$data['kontent']) {
				$this->session->set_flashdata('warning','Maaf data tidak ditemukan');
				redirect(base_url('admin/content'));
			}
			if (!$_POST) {
				$data['input'] = $data['kontent'];
			}else {
				$data['input'] = (object) $this->input->post(null,FALSE);
			}
			if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
				$imageName = url_title($data['input']->title, '-' ,FALSE). '-' .date('YmdHis');
				$upload = $this->content->uploadImage('image',$imageName);
				if ($upload) {
					if ($data['kontent']->image !== '') {
						$this->content->deletImage($data['kontent']->image);
					}
					$data['input']->image = $upload['file_name'];
				}else {
					redirect(base_url('admin/content/create'));
				}
			}
			if (!$this->content->validate()) {
				$data['title'] = 'Admin Edit COntent';
				$data['form_action'] = base_url("admin/content/edit/$id");
				$data['page'] = 'admin/content/form';
				$this->dash($data);
				return;
			}
			if ($this->content->where('id',$id)->update($data['input'])) {
				$this->session->set_flashdata('success','berhasil Mengupdate conent');
			}else {
				$this->session->set_flashdata('error','gagl mengupdate data');
			}
			redirect(base_url('admin/content'));
		}
		public function delete($id)
		{
			if (!$_POST) {
				redirect(base_url('admin/content'));
			}
			$content = $this->content->where('id',$id)->first();
			if (!$content) {
				$this->session->set_flashdata('warning','maaf data tidak dapat ditemukan');
				redirect(base_url('admin/content'));
				
			}
			if ($this->content->where('id', $id)->delete()) {
				$this->content->deletImage($content->image);
				$this->session->set_flashdata('success','Menghapus data content');
			}else {
				$this->session->set_flashdata('error','gagal menghapus data');
				
			}
			redirect(base_url('admin/content'));
		}
		public function unique_slug()
		{
			$slug		= $this->input->post('slug');
			$id			= $this->input->post('id');
			$content	= $this->content->where('slug', $slug)->first();
			if($content){
				if ($id == $content->id) {
					return true;
				}
				$this->load->library('form_validation');
				$this->form_validation->set_message('unique_slug', '%s sudah di gunakan');
				return false;
			}
			return true;

		}
	
	}
	
	/* End of file Content.php */
	
?>
