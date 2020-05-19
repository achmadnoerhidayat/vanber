<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Category extends MY_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$login = $this->session->userdata('id_akses');
			if ($login != 1) {
				redirect(base_url('home'));
			}
		}
		
	
		public function index($page = null)
		{
			$data['title'] = 'Admin: Category';
			$data['konten'] = $this->category->paginate($page)->get();
			$data['total_rows'] = $this->category->count();
			$data['pagination'] = $this->category->makePagination(base_url('admin/category'),3 ,$data['total_rows']);
			$data['page'] = 'admin/category/index';
			$this->dash($data);
		}

		public function create()
		{
			if (!$_POST) {
				$input = (object) $this->category->getDefaultValues();
			}else {
				$input = (object) $this->input->post(null, true);
			}

			if (!$this->category->validate()) {
				$data['title'] = 'Tambah kategori';
				$data['input'] = $input;
				$data['form_action'] = base_url('admin/category/create');
				$data['page'] = 'admin/category/form';

				$this->dash($data);
				return;
			}
			if ($this->category->create($input)) {
				$this->session->set_flashdata('success','Data berhasil di tambahkan');
			}else {
				$this->session->set_flashdata('error','Gagal Memasukan Data');
			}
			redirect(base_url('admin/category'));
		}
		public function edit($id = null)
		{
			$data['content'] = $this->category->where('id', $id)->first();
			if (!$data['content']) {
				$this->session->set_flashdata('warning','Maaf Data tidak d temukan');
				redirect(base_url('admin/category'));
			}
			if (!$_POST) {
				$data['input'] = $data['content'];
			}else {
				$data['input'] = $this->input->post(null, true);
			}
			if (!$this->category->validate()) {
				$data['title'] = 'Admin: Edit Category';
				$data['form_action'] = base_url("admin/category/edit/$id");
				$data['page'] = 'admin/category/form';

				$this->dash($data);
				return;
			}
			if ($this->category->where('id',$id)->update($data['input'])) {
				$this->session->set_flashdata('success','Data Berhasil Ditambahkan');
			}else {
				$this->session->flashdata('error','OOps Data gagal ditambahkan');
			}
			redirect(base_url('admin/category'));
		}
		public function delete($id)
		{
			if (!$_POST) {
				redirect(base_url('admin/category'));
			}
			if (!$this->category->where('id',$id)->first()) {
				$this->session->set_flashdata('warning', 'data tidak ditemukan');
				redirect(base_url('admin/category'));
			}
			if ($this->category->where('id',$id)->delete()) {
				$this->session->set_flashdata('success', 'Berhasil Menghapus Data');
			}else {
				$this->session->set_flashdata('error','Gagal Menghapus Data');
			}
			redirect(base_url('admin/category'));
		}

		public function unique_slug()
		{
			$slug = $this->input->post('slug');
			$id = $this->input->post('id');
			$category = $this->category->where('slug',$slug)->first();
			if ($category) {
				if ($id == $category->id) {
					return true;
				}
				$this->load->library('form_validation');
				$this->form_validation->set_message('unique_slug', '%s sudah digunakan');
				return false;
			}
			return true;
		}
	
	}
	
	/* End of file Category.php */
	
?>
