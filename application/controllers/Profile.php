<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Profile extends MY_Controller {
		private $id;
		public function __construct()
		{
			parent::__construct();
			$is_login = $this->session->userdata('is_login');
			$this->id = $this->session->userdata('id');
			if (!$is_login) {
				$this->session->set_flashdata('warning', 'anda harus login');
				redirect(base_url('home'));
			}
		}
		
	
		public function index()
		{
			$data['content'] = $this->profile->select(['user.id','user.username','user.email','user.image','akses.role'])
			->join('akses')
			->where('user.id',$this->id)
			->first();
			$data['title'] = 'Halaman Profile';
			$this->load->view('news/profile', $data);
			
		}
		public function update($id)
		{
			$data['content'] = $this->profile->where('id',$id)->first();
			if (!$data['content']) {
				$this->session->set_flashdata('warning', 'Maaf data yang anda cari tidak ketemu');
				redirect(base_url("profile/$id"));
			}
			if (!$_POST) {
				$data['input'] = $data['content'];
			}else {
				$data['input'] = (object) $this->input->post(null,true);
				if ($data['input']->password !== '') {
					$data['input']->password = hashencrypt($data['input']->password); 
				}else {
					$data['input']->password = $data['content']->password;
				}
			}
			if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
				$imageName = url_title($data['input']->name,'-', true).'-' .date('ymdHis');
				$upload = $this->profile->uploadImage('image',$imageName);
				if ($upload) {
					if ($data['content']->image !== '') {
						$this->profile->deleteImage($data['content']->image);
					}
					$data['input']->image = $upload['file_name'];
				}else {
					redirect(base_url("profile/update/$id"));
				}
			}
			if (!$this->profile->validate()) {
				$data['title'] = 'Halaman Edit Profile';
				$data['form_action'] = base_url("profile/update/$id");
				$this->load->view('news/profile_form', $data);
				return;
			}
			if ($this->profile->where('id', $id)->update($data['input'])) {
				$this->session->set_flashdata('success', 'Data berhasil disimpan!');
			} else {
				$this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
			}
			redirect(base_url('profile'));
		}
		public function unique_email()
	{
		$email		= $this->input->post('email');
		$id			= $this->input->post('id');
		$user		= $this->profile->where('email', $email)->first();

		if ($user) {
			if ($id == $user->id) {
				return true;
			}
			$this->load->library('form_validation');
			$this->form_validation->set_message('unique_email', '%s sudah digunakan!');
			return false;
		}

		return true;
	}

	}
	
	/* End of file Profile.php */
	
?>
