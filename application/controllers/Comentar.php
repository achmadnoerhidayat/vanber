<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Comentar extends MY_Controller {
	
		public function create()
		{
			if (!$_POST) {
				$data['input'] = (object) $this->comentar->getDevaultvalues();
			}else {
				$data['input'] = (object) $this->input->post(null,true);
				$this->comentar->table = 'content';
				$content = $this->comentar->where('id',$data['input']->id_content)->first();
				$this->comentar->table = 'coment';
				$coment = $this->comentar->where('id_content',$data['input']->id_content)->first();
			}
			$data = [
				'id_content' => $data['input']->id_content,
				'name' => $data['input']->name,
				'email' => $data['input']->email,
				'description' => $data['input']->description,
			];
			if ($this->comentar->create($data)) {
				$this->session->set_flashdata('success', 'Berhasil Menambahkan komentar');
				
			}else {
				$this->session->set_flashdata('error', 'GGal');
			}
		}
	
	}
	
	/* End of file Comentar.php */
	
?>
