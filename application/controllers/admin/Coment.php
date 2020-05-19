<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Coment extends MY_Controller {
		public function __construct()
		{
			parent::__construct();
			//Do your magic here
			$role = $this->session->userdata('id_akses');
			if ($role != 1) {
				redirect(base_url('home'));
			}
		}
		
	
		public function index($page = null)
		{
			$data['title'] = 'Admin: Comentar';
			$data['content'] = $this->coment->select(
				[
					'coment.id','coment.name','coment.email','coment.description','content.is_avilable','content.title'
				]
				)
				->join('content')
				->paginate($page)
				->get();
				$data['total_rows'] = $this->coment->count();
				$data['pagination'] = $this->coment->makePagination(
					base_url('admin/coment'),3, $data['total_rows']
				);
				$data['page'] = 'admin/coment/index';
				$this->dash($data);
		}
		public function edit($id)
		{
			$data['content'] = $this->coment->where('id',$id)->first();
			if (!$data['content']) {
				$this->session->set_flashdata('warning','Maaf data yang anda cari tidak ada');
				redirect(base_url('admin/coment'));
			}
			if (!$_POST) {
				$data['input'] = $data['content'];
			}else {
				$data['input'] = (object) $this->input->post(null,true);
			}
			if (!$this->coment->validate()) {
				$data['title'] = 'Admin Edit Coment';
				$data['form_action'] = "admin/coment/edit/$id";
				$data['page'] = 'admin/coment/form';
				$this->dash($data);
				return;
			}
			if ($this->coment->where('id',$id)->update($data['input'])) {
				$this->session->set_flashdata('success','Mengupdate Coment');
			}else {
				$this->session->flashdata('error','mengupdate data');
			}
			redirect(base_url('admin/coment'));
		}
		public function delete($id)
		{
			if (!$_POST) {
				redirect(base_url('admin/coment'));
			}
			$coment = $this->coment->where('id',$id)->first();
			if (!$coment) {
				$this->session->flashdata('warning','maaf data tidak di temukan');
				
			}
			if ($this->coment->where('id',$id)->delete()) {
				$this->session->flashdata('success','menghapus data');
				
			}else {
				$this->session->flashdata('error','gagal menghapus data');
				
			}
		}
	
	}
	
	/* End of file Coment.php */
	

?>
