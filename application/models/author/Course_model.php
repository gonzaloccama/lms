<?php defined('BASEPATH') or exit('No direct script access allowed');

class Course_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function rowTable($id = null, $table = null, $field_id = null)
	{
		$this->db->select("$table.*");
		$this->db->from($table);

		if ($id):
			$this->db->where("$field_id = $id");
		endif;

		$query = $this->db->get();

		return $result = $query->result();
	}

	public function rowTableWhere($table = null, $dt)
	{
		$this->db->select("$table.*");
		$this->db->from($table);

		if (isset($dt) && !empty($dt)):
			$this->db->where($dt);
		endif;

		$query = $this->db->get();

		return $result = $query->result();
	}

	public function listCategoryforUser($id = null, $table = null, $field_id = null)
	{
		$this->db->select("$table.*, course.sub_category_id");
		$this->db->from($table);

		$this->db->join("course", "$table.id = course.sub_category_id", "inner");

		if ($id):
			$this->db->where("course.$field_id = $id");
		endif;

		$this->db->group_by("course.sub_category_id");

		$query = $this->db->get();

		return $result = $query->result();
	}

	public function listCourses($table, $id = 0, $author = 0)
	{
		$this->db->select("$table.*, category.name as category, level.level as lvl, category.color");

		if (!$id):
			$this->db->from($table);
		endif;

		$this->db->join("category", "$table.sub_category_id = category.id", "inner");
		$this->db->join("level", "$table.level = level.id_level", "inner");

		if ($id):

			$query = $this->db->get_where($table, array("$table.id" => $id, "$table.user_id" => $author));
			$data = $query->result();
			return $data[0];

		else:

			$this->db->where("$table.user_id = $author");
			$query = $this->db->get();
			return $result = $query->result();

		endif;

	}

	public function get_max_min($table = null, $id = null, $author = null, $lm = 'max')
	{
		if ($lm == 'max'):
			$this->db->select_max("$id");
		else:
			$this->db->select_min("$id");
		endif;

		$this->db->from("$table");

		$this->db->where("user_id = $author");

		$query = $this->db->get();

		return $result = $query->result();
	}

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function updateData($table, $data, $field, $id)
	{
		$this->db->where("$field", $id);
		$this->db->update($table, $data);
	}

}

