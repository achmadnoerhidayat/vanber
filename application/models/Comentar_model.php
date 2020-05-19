<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Comentar_model extends MY_Model {
	
		public $table = 'coment';
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
	
	/* End of file Comentar_model.php */
	
?>
