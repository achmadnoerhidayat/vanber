<?php 

	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Home extends MY_Controller {
	
		public function index($page = null)
		{
			$data['title'] = 'Homepage';
			$data['content'] = $this->home->orderBy('id','desc')->paginate($page)->get();
			$data['konten'] = $this->home
			->select(
				[
					'content.id','content.slug','content.title AS content_title','content.id_category','content.description','content.is_avilable','content.image',
					'category.title AS category_title','category.slug AS category_slug'
				]
			)
			->join('category')
			->limit(2)
			->get();
			$data['total_rows'] = $this->home->count();
			$data['pagination'] = $this->home->makePagination(base_url('home'),2, $data['total_rows']);
			$data['page'] = 'news/index';
			$this->front($data);
		}

		public function search($page = null)
		{
			if (isset($_POST['find'])) {
				$this->session->set_userdata('find',$this->input->post('find'));
			}else {
				redirect(base_url('home'));
			}
			$find = $this->session->userdata('find');
			$data['title'] = 'Serch Home';
			$data['content'] = $this->home->orderBy('id','desc')
			->like('title',$find)
			->paginate($page)
			->get();
			$data['konten'] = $this->home
			->select(
				[
					'content.id','content.slug','content.title AS content_title','content.slug AS content_slug','content.id_category','content.description','content.is_avilable','content.image',
					'category.title AS category_title','category.slug AS category_slug'
				]
			)
			->join('category')
			->limit(2)
			->get();
			$data['total_rows'] = $this->home->like('title',$find)->count();
			$data['pagination'] = $this->home->makePagination(base_url('home/search'),3, $data['total_rows']);
			$this->load->view('news/pencarian', $data);
			
		}
	
	}
	
	/* End of file Home.php */
	
?>
