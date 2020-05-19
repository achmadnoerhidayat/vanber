<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends MY_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$login = $this->session->userdata('id_akses');
			if ($login != 1) {
				redirect(base_url('home'));
			}
		}
		
	
		public function index()
		{
			$data['conntent'] = $this->dashboard->limit(5)->orderBy('id','desc')->get();
			$data['page'] ='admin/index';
			$this->dash($data);
		}
	
	}
	
	/* End of file Admin.php */
	
?>
