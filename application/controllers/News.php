<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class News extends MY_Controller {
	
		public function category($slug, $page = null)
		{
			$data['title'] = 'Detail Category';
			$data['konten'] = $this->news->select([
				'content.id','content.slug AS content_slug','content.id_category','content.title AS content_title','content.description','content.is_avilable','content.image',
				'category.slug AS category_slug','category.title AS category_title'
			])
			->join('category')
			->limit(2)
			->get();
			$data['content'] = $this->news->select([
				'content.id','content.slug AS content_slug','content.id_category','content.title AS content_title','content.description','content.is_avilable','content.image',
				'category.slug AS category_slug','category.title AS category_title'
			])
			->join('category')
			->where('content.is_avilable',1)
			->where('category.slug',$slug)
			->paginate($page)
			->get();
			if (!$data['content']) {
				redirect(base_url('home'));
			}
			$data['total_rows'] = $this->news->where('content.is_avilable',1)->where('category.slug',$slug)->join('category')->count();
			$data['pagination'] = $this->news->makePagination(base_url("news/category/$slug"),3, $data['total_rows']);
			$data['category'] = ucwords(str_replace('-','',$slug));
			$this->load->view('news/category',$data);			
		}
		public function detail($slug)
		{
			$this->news->table = 'content';
			$data['konten'] = $this->news->select([
			'content.id','content.slug AS content_slug','content.id_category','content.title AS content_title','content.description','content.is_avilable','content.image',
			'category.slug AS category_slug','category.title AS category_title'
			])
			->join('category')
			->limit(2)
			->get();
			$data['berita'] = $this->news
			->where('content.slug',$slug)
			->first();
			$this->news->table = 'coment';
			$data['content'] = $this->news->select(['coment.id','coment.name','coment.email','coment.description AS coment_description','content.slug','content.title','content.description AS content_description','content.image'])
			->join('content')
			->where('content.slug',$slug)
			->first();
			$data['title'] = 'Halaman Detail'; 
			$this->load->view('news/detail', $data);
		}
		public function coment($id)
		{
			$this->news->table = 'coment';
			$data['content'] = $this->news->select(['coment.id','coment.name','coment.email','coment.description AS coment_description','content.slug','content.title','content.description AS content_description','content.image'])
			->join('content')
			->where('content.id',$id)
			->first();
			if (!$_POST) {
				$data['input'] = $data['content'];
			}else {
				$data['input'] =$this->input->post(null, true);
			}
			if ($this->news->where('slug',$slug)->create($data['input'])) {
				$this->session->set_flashdata('success','berhasil Mengupdate conent');
			}else {
				$this->session->set_flashdata('error','gagl mengupdate data');
			}
			redirect(base_url("news/detail/$slug"));
		}
	
	}
	
	/* End of file Detail.php */
	

?>
