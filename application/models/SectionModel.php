<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SectionModel extends CI_Model {


	function LoadMasterlist($fields = null) {
		if (empty($fields)) {
			$this->db->select('*');
		}else{
			$this->db->select($fields);
		}
		$this->db->from('tbl_sections');
		$this->db->order_by('Name','ASC');
		$query = $this->db->get();
		return $query;
	}	


}