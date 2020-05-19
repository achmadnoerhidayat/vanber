<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Register_model extends MY_Model {
	
		protected $table = 'user';

		public function getDefaultValues()
		{
			return [
				'id_akses' => 2,
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
					'rules' => 'trim|required'
				],
				[
					'field' => 'email',
					'label' => 'E mail',
					'rules' => 'trim|required'
				],
				[
					'field' => 'password',
					'label'	=> 'Password',
					'rules'	=> 'required|min_length[8]',
				],
				[
					'field' => 'password_confirmation',
					'label'	=> 'Konfirmasi Password',
					'rules'	=> 'required|matches[password]',
				],
			];
			return $validationRules;
		}
		public function run($input)
		{
			$data = [
				'id_akses' => 2,
				'username' => $input->username,
				'email' => strtolower($input->email),
				'password' => hashencrypt($input->password),
			];
			$login = $this->create($data);
			$ses_data = [
				'id' => $login,
				'id_akses' => $data['id_akses'],
				'username' => $data['username'],
				'email' => $data['email'],
				'is_login' => true
			];
			$this->session->set_userdata($ses_data);
			return true;
		}
	
	}
	
	/* End of file Register_model.php */
	
?>
