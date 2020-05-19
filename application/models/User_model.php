<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class User_model extends MY_Model {
	
		public function getDefaultValues()
		{
			return [
				'id_akses' => '',
				'username' => '',
				'email' => '',
				'password' => '',
				'is_active' => '',
			];
		}
		public function getvalidationRules()
		{
			$validationRules = [
				[
					'field' => 'username',
					'label' => 'Nama lengkap',
					'rules' => 'required|trim'
				],
				[
					'field' => 'email',
					'label' => 'E-mail',
					'rules' => 'required|trim|valid_email'
				],
				[
					'field' => 'id_akses',
					'label' => 'Roles',
					'rules' => 'required|trim'
				],
			];
			return $validationRules;
		}

		public function run($input)
		{
			$data = [
				'id_akses' => $input->id_akses, 
				'username' => $input->username,
				'email' => strtolower($input->email),
				'password' => hashEncrypt($input->password),
			];

			$user = $this->create($data);
			$sess_data = [
				'id' => $user,
				'id_akses' => $data['id_akses'],
				'username' => $data['username'],
				'email' => $data['email'],
				'is_login' => true,
			];
			$this->session->set_userdata($sess_data);
			return true;
		}

		public function uploadImage($fieldName, $fileName)
	{
		$config	= [
			'upload_path'		=> './images/user',
			'file_name'			=> $fileName,
			'allowed_types'		=> 'jpg|gif|png|jpeg|JPG|PNG',
			'max_size'			=> 1024,
			'max_width'			=> 0,
			'max_height'		=> 0,
			'overwrite'			=> true,
			'file_ext_tolower'	=> true
		];

		$this->load->library('upload', $config);

		if ($this->upload->do_upload($fieldName)) {
			return $this->upload->data();
		} else {
			$this->session->set_flashdata('image_error', $this->upload->display_errors('', ''));
			return false;
		}
	}

	public function deleteImage($fileName)
	{
		if (file_exists("./images/user/$fileName")) {
			unlink("./images/user/$fileName");
		}
	}
	
	}
	
	/* End of file User_model.php */
	
?>
