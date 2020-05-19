<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class MY_Model extends CI_Model {
	
		protected $table = '';
		protected $perPage = 5;

		public function __construct()
		{
			parent::__construct();
			if(!$this->table){
				$this->table = strtolower(
					str_replace('_model','', get_class($this))
				);
			}
		}
		/**
		 * fungsi validasi input
		 * 
		 * @return void
		 */
		
		public function validate()
		{
			$this->load->library('form_validation');

			$this->form_validation->set_error_delimiters(
				'<small class="form-text text-danger">','</small>'
			);
			$validationRules = $this->getValidationRules();

			$this->form_validation->set_rules($validationRules);

			return $this->form_validation->run();
		}

		/**
		 * seleksi data perkolom
		 * chain method
		 * 
		 * @param [type] $columns
		 * @return void
		 */
		public function start()
		{
			return $this->db->group_start();
		}
		public function end()
		{
			return $this->db->group_end();
		}
		 public function select($columns)
		 {
			$this->db->select($columns);
			return $this;
		 }

		 /**
		  * mencari satu data pada kolom tertentu dengan data yang sama
		  *
		  */

		  public function where($column,$condition)
		  {
			$this->db->where($column,$condition);
			return $this;
		  }
		  /**
		   * mencari satu data pada kolom tertentu dengan data yang mirip
		   * 
		   */

		public function like($column,$condition)
		{
			$this->db->like($column,$condition);
			return $this;
		}
		/**
		 * mencari data selanjutnya pada kolom tertentuv dengan data yang mirip
		 */
		public function orLike($column,$condition)
		{
			$this->db->or_like($column,$condition);
			return $this;
		}
		/**
		 * menggabungkan table yang berelasi yang memiliki foreign key id_namatable
		 */

		 public function join($table,$type='left')
		 {
			 $this->db->join($table,"$this->table.id_$table = $table.id", $type);
			 return $this;
		 }
		 /**
		  * mengurutkan data dari hasil query dan kondisi 
		  */
		  public function orderBy($coloumn,$order = 'asc')
		  {
			  $this->db->order_by($coloumn, $order);
			  return $this;
		  }
		  /**
		   * melampirkan satu kata dari hasil query dan kondisi
		   * hasil akhir chain method
		   */
		  public function first()
		  {
			  return $this->db->get($this->table)->row();
		  }
		  /**
		   * menampilkan banyak data dari hasil query
		   */
		  public function get()
		  {
			 return $this->db->get($this->table)->result();
		  }
		  public function getRow()
		  {
			 return $this->db->get($this->table)->num_rows();
		  }
		  /**
		   * menampilkan nilai jumlah data dari hasil query
		   */
		  public function count()
		  {
			  return $this->db->count_all_results($this->table);
		  }
		  public function from($table)
		  {
			  return $this->db->from($table);
		  }
		  /**
		   * menyimpan data baru kedalam satu table 
		   * 
		   */
		  public function create($data)
		  {
			$this->db->insert($this->table, $data);
			return $this->db->insert_id();
		  }
		  /**
		   * mengubah data yang ada pada suatu table dengan data baru 
		   */
		  public function update($data)
		  {
			  return $this->db->update($this->table, $data);
		  }
		  /**
		   * menghapus suatu data dari hasil query dan kondisi
		   */
		  public function delete()
		  {
			  $this->db->delete($this->table);
			  return $this->db->affected_rows();
		  }
		  public function limit($no)
		  {
			  $this->db->limit($no);
			  return $this;
		  }
		  /**
		   * menentukan limit data untuk di tampilkan
		   */
		  public function paginate($page)
		  {
			  $this->db->limit(
				  $this->perPage,
				  $this->calculateRealOffset($page)
			  );
			  return $this;
		  }
		  /**
		   * mengganti offset dengan nilai sesuai halaman 
		   */
		  public function calculateRealOffset($page)
		  {
			  if (is_null($page) || empty($page)) {
				 $offset = 0;
			  }else {
				  $offset = ($page * $this->perPage) - $this->perPage; 
			  }
			  return $offset;
		  }
		  /**
	 * Membuat Pagination dengan style bootstrap 4
	 *
	 * @param [type] $baseUrl
	 * @param [type] $uriSegment
	 * @param [type] $totalRows
	 * @return void
	 */
	public function makePagination($baseUrl, $uriSegment, $totalRows = null)
	{
		$this->load->library('pagination');

		$config = [
			'base_url'			=> $baseUrl,
			'uri_segment'		=> $uriSegment,
			'per_page'			=> $this->perPage,
			'total_rows'		=> $totalRows,
			'use_page_numbers'	=> true,
			
			'full_tag_open'		=> '<ul class="pagination">',
			'full_tag_close'	=> '</ul>',
			'attributes'		=> ['class' => 'page-link'],
			'first_link'		=> false,
			'last_link'			=> false,
			'first_tag_open'	=> '<li class="page-item">',
			'first_tag_close'	=> '</li>',
			'prev_link'			=> '&laquo',
			'prev_tag_open'		=> '<li class="page-item">',
			'prev_tag_close'	=> '</li>',
			'next_link'			=> '&raquo',
			'next_tag_open'		=> '<li class="page-item">',
			'next_tag_close'	=> '</li>',
			'last_tag_open'		=> '<li class="page-item">',
			'last_tag_close'	=> '</li>',
			'cur_tag_open'		=> '<li class="page-item active"><a href="#" class="page-link">',
			'cur_tag_close'		=> '<span class="sr-only">(current)</span></a></li>',
			'num_tag_open'		=> '<li class="page-item">',
			'num_tag_close'		=> '</li>',
		];

		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}
	}
	
	/* End of file MY_Model.php */
	
?>
