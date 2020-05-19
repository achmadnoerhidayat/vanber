<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class News_model extends MY_Model {
	
		public $table = 'content';
		public function getDevaultvalues()
		{
			return [
				'name'	=> '',
				'email' => '',
				'description' => '',
			];
		}
		public function getValidationRules(){
			$validationRules = [
				[
					'field' => 'id_content',
					'label' => 'Content',
					'rules' => 'required'
				],
				[
					'field' => 'name',
					'label' => 'Username',
					'rules' => 'trim|required'
				],
				[
					'field' => 'email',
					'label' => 'E-mail',
					'rules' => 'trim|required'
				],
				[
					'field' => 'description',
					'label' => 'komentar',
					'rules' => 'required'
				],
			];
			return $validationRules;
		}
	}
	
	/* End of file News_model.php */
	
?>
