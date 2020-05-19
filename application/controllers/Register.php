<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$is_login	= $this->session->userdata('is_login');

		if ($is_login) {
			redirect(base_url('home'));
			return;
		}
	}
	
	public function index()
	{
		if (!$_POST) {
			$input = (object) $this->register->getDefaultValues();
		}else {
			$input = (object) $this->input->post(null, true);
		}
		if (!$this->register->validate()) {
			$data['title'] = 'Halaman Register';
			$data['input'] = $input;
			$data['form_action'] = base_url('register');
			$this->load->view('auth/register', $data);
			return;
		}
		if ($this->register->run($input)) {
			$this->session->flashdata('succes','berhasil register');
			redirect(base_url('home'));
		}else {
			$this->session->flashdata('error','GGal register');
			redirect(base_url('register'));
		}
	}

}

/* End of file Register.php */


?>
