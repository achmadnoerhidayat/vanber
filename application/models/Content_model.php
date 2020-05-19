<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Content_model extends MY_Model {

	public function getDefaultValues()
	{
		return [
			'id_category'	=> '',
			'slug'			=> '',
			'title'			=> '',
			'description'	=> '',
			'is_avilable'	=> 1,
			'image'			=> '',
		];
	}
	public function getValidationRules()
	{
		$validationRules = [
			[
				'field'		=> 'id_category',
				'label'		=> 'Kategori',
				'rules'		=> 'required'
			],
			[
				'field'		=> 'slug',
				'label'		=> 'Slug',
				'rules'		=> 'trim|required|callback_unique_slug'
			],
			[
				'field'		=> 'title',
				'label'		=> 'Nama kontent',
				'rules'		=> 'trim|required'
			],
			[
				'field'		=> 'description',
				'label'		=> 'deskripsi',
				'rules'		=> 'trim|required'
			],
			[
				'field'		=> 'is_avilable',
				'label'		=> 'aktiv',
				'rules'		=> 'required'
			],
		];
		return $validationRules;
	}

	public function uploadImage($fieldName, $fileName)
		{
			$config	= [
				'upload_path'		=> './images/content',
				'file_name'			=> $fileName,
				'allowed_types'		=> 'jpg|gif|png|jpeg|JPG|PNG',
				'max_size'			=>1024,
				'max_width'			=>0,
				'max_height'		=>0,
				'overwrite'			=> true,
				'file_ext_tolower'	=>true,
			];

			$this->load->library('upload', $config);
			if($this->upload->do_upload($fieldName)){
				return $this->upload->data();
			}else {
				$this->session->set_flashdata('image_error',$this->upload->display_errors('', ''));
				return false;
			}
		}
	public function deletImage($fileName)
		{
			if(file_exists("./images/content/$fileName")){
				unlink("./images/content/$fileName");
			}
		}
}

/* End of file Content_model.php */

?>
