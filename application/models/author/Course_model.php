<?php defined('BASEPATH') or exit('No direct script access allowed');

class Course_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

	function listTable($id = 0, $table)
	{
		$this->db->select("$table.*");
		$this->db->from($table);

		$query = $this->db->get();

		return $result = $query->result();
	}

	function listCourses($table)
	{
		$this->db->select("$table.*, category.name as category, level.level, category.color");
		$this->db->from($table);

		$this->db->join("category", "$table.sub_category_id = category.id", "inner");
		$this->db->join("level", "$table.level = level.id_level", "inner");

		$query = $this->db->get();

		return $result = $query->result();
	}

	function insert($table, $data){
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

}

