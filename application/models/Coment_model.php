<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Coment_model extends MY_Model {
	
		public function getDefaultValues()
		{
			return [
				'id_content' => '',
				'name' => '',
				'email' => '',
				'description' => '',
			];
		}
		public function getValidationRules()
		{
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
	
	/* End of file Coment_model.php */
	

?>
