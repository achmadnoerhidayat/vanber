<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
	
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
			$input = (object) $this->login->getdefaultValues();
		}else {
			$input = (object) $this->input->post(null,true);
		}
		if (!$this->login->validate()) {
			$data['title']  = 'Halaman Login';
			$data['input'] = $input;
			$data['form_action'] = base_url('login');
			$this->load->view('auth/login', $data);
			return;
		}

		if ($this->login->where('id_akses',1)->run($input)) {
			$this->session->set_flashdata('success','Berhasil Login Sebagai admin');
			redirect(base_url('admin/dashboard'));
		}
		elseif ($this->login->where('id_akses',2)->run($input)) {
			$this->session->set_flashdata('success','berhasil Login');
			redirect(base_url('home'));
		}else {
			$this->session->set_flashdata('error', 'E-Mail atau Password salah atau akun Anda sedang tidak aktif!');
			redirect(base_url('login'));
		}
	}

}

/* End of file Login.php */


?>
