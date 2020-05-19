<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

	public function index()
	{
		$ses_data = ['id','id_akses','username','email','is_active'];
		$this->session->unset_userdata($ses_data);
		$this->session->sess_destroy();
		redirect(base_url('home'));
	}

}

/* End of file Logout.php */

?>
