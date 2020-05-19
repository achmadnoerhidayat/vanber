<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$role = $this->session->userdata('id_akses');
		if ($role != 1) {
			$this->session->flashdata('warning','Halaman Husus admin');
			redirect(base_url('home'));
		}
		
	}
	

	public function index($page = null)
	{
		$data['title'] = 'Admin USer';
		$data['content'] = $this->user->select(
			[
				'user.id','user.username','user.email',
				'akses.role'
			]
		)
		->join('akses')
		->paginate($page)
		->get();
		$data['total_rows'] = $this->user->count();
		$data['pagination'] = $this->user->makePagination(base_url('admin/user'),3, $data['total_rows']);
		$data['page'] = 'admin/user/index';
		$this->dash($data);
	}
	public function create()
	{
		if (!$_POST) {
			$input = (object) $this->user->getDefaultValues();
		}else {
			$input = (object) $this->input->post(null,true);
		}

		if (!$this->user->validate()) {
			$data['title'] = 'Admin: Tambah User';
			$data['input'] = $input;
			$data['form_action'] = base_url('admin/user/create');
			$data['page']	= 'admin/user/form';
			$this->dash($data);
			return;
		}
		if ($this->user->run($input)) {
			$this->session->flashdata('success','menambahkan data user');
			
		}else {
			$this->session->flashdata('error','menambahkan data user');
			
		}
		redirect(base_url('admin/user'));
	}
	public function edit($id)
	{
		$data['content'] = $this->user->where('id',$id)->first();

		if (!$data['content']) {
			$this->session->flashdata('warning','maaf data tidak d temukan');
			redirect(base_url('admin/user'));
		}
		if (!$_POST) {
			$data['input'] = $data['content'];
		}else {
			$data['input'] = $this->input->post(null, true);
		}
		if (!$this->user->validate()) {
			$data['title'] = 'Admin edit user';
			$data['form_action'] = base_url("admin/user/edit/$id");
			$data['page'] = 'admin/user/form';
			$this->dash($data);
			return;
		}
		if ($this->user->where('id',$id)->update($data['input'])) {
			$this->session->flashdata('succes','Mengupdate Data user');
			
		}else {
			$this->session->flashdata('error','Gagal menambahkan data');
			
		}
		redirect(base_url('admin/user'));
	}

}

/* End of file User.php */

?>
