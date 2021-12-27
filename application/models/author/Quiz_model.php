<?php defined('BASEPATH') or exit('No direct script access allowed');

class Quiz_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

	function ListTable($table, $dt = null)
	{
		$this->db->select("$table.*");
		$this->db->from($table);

		if ($dt)
		{
			$this->db->where($dt);
		}

		$query = $this->db->get();

		return $result = $query->result();
	}

	public function listCategoryforUser($table = null, $dt = null)
	{
		$this->db->select("$table.*, course.sub_category_id");
		$this->db->from($table);

		$this->db->join("course", "$table.id = course.sub_category_id", "inner");

		if ($dt):
			$this->db->where($dt);
		endif;

		$this->db->group_by("course.sub_category_id");

		$query = $this->db->get();

		return $result = $query->result();
	}
}

