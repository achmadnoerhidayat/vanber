<?php 
	function getDropdownList($table, $colomns)
	{
		$CI =& get_instance();
		$query = $CI->db->select($colomns)->from($table)->get();
		if ($query->num_rows() >= 1) {
			$option1 = ['' => '- Select -'];
			$option2 = array_column($query->result_array(),$colomns[1], $colomns[0]);
			$option = $option1 + $option2;
			return $option;
		}
		return $option = ['' => '- select -'];
	}
	
	function getCategories()
	{
		$CI =& get_instance();
		$query = $CI->db->get('category')->result();
		return $query;
	}
	function getComents($id)
	{
		$CI =& get_instance();
		$query = $CI->db->where('id_content',$id)->get('coment')->result();
		return $query;
	}
	function getContentside()
	{
		$CI =& get_instance();
		$query = $CI->db->limit(2)
		->select('content.title AS content_title','content.description','content.slug AS conten_slug','content..title',
				'category.id','category.title AS category_title','category.slug AS category_slug',
		)
		->join('category',"id_category = category.id", 'left')
		->get('content')->result();
		return $query;
	}
	function getContent()
	{
		$CI =& get_instance();
		$query = $CI->db->get('content')->result();
		return $query;
	}
	function getNewsCategory($aktif)
	{
		$CI =& get_instance();
		$query = $CI->db->where('id_category',$aktif)
		->order_by('id','desc')
		->get('content')
		->result();
		return $query;
	}
	function contentCount()
	{
		$CI =& get_instance();
		$query = $CI->db->count_all_results('content');
		return $query;
	}
	function comentCount()
	{
		$CI =& get_instance();
		$query = $CI->db->count_all_results('coment');
		return $query;
	}
	function userCount()
	{
		$CI =& get_instance();
		$query = $CI->db->count_all_results('user');
		return $query;
	}
	function getNewsContent()
	{
		$CI =& get_instance();
		$query = $CI->db->limit(8)->order_by('id', 'desc')->get('content')->result();
		return $query;
	}
	function getImageContent()
	{
		$CI =& get_instance();
		$query = $CI->db->limit(1)->order_by('id','desc')->get('content')->result();
		return $query;
	}
	function hashEncrypt($input)
	{
		$hash = password_hash($input,PASSWORD_DEFAULT);
		return $hash;
	}
	function hashEncryptVerify($input,$hash)
	{
		if (password_verify($input,$hash)) {
			return true;
		}else {
			return false;
		}
	}
	function token(){
		$CI =& get_instance();
		$token =$CI->session->userdata('token', md5(uniqid(rand(), true)));
		return $token;
	}
	function expert($string,$start,$limit)
		{
			$string = substr($string, $start, $limit);
			return $string. "..";
		}
?>

