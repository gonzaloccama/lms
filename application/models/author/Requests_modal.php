<?php defined('BASEPATH') or exit('No direct script access allowed');

class Requests_modal extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function ListTable($id = 0)
	{

	}

	public function rowTable($id = null, $table = null, $field = null, $order = 0, $fieldO = null, $field1 = null)
	{
		$this->db->select("$table.*");
		$this->db->from($table);

		if ($id):
			$this->db->where("$field = $id");
		endif;

		if ($order):
			$this->db->order_by("$fieldO", "ASC");
		endif;

		if ($order && $field1):
			$this->db->order_by("$fieldO", "ASC");
			$this->db->order_by("$field1", "ASC");
		endif;

		$query = $this->db->get();

		return $result = $query->result();
	}

	public function row_table($table, $dt = null, $order = null)
	{
		$this->db->select("$table.*");
		$this->db->from($table);

		if ($dt):
			$this->db->where($dt);
		endif;

		if ($order):
			$this->db->order_by($order, "ASC");
		endif;

		$query = $this->db->get();
		return $result = $query->result();
	}

	function sortLesson($id, $table)
	{
		$this->db->select("$table.*, section.order as secor");
		$this->db->from($table);

		$this->db->join("section", "$table.section_id = section.id", "inner");

		$this->db->where("$table.course_id = $id");

		$this->db->order_by("secor", "ASC");
		$this->db->order_by("$table.order", "ASC");

		$query = $this->db->get();
		return $result = $query->result();
	}

	function searched($limit = 0, $offset = 0, $key = null, $dt = null, $count = 0, $table = null)
	{
		$this->db->select("$table.*, category.name as category, level.level as lvl, category.color, 
							concat(users.name, ' ', users.first_parent, ' ', users.last_parent) as name, users.user_image");
		$this->db->from("$table");

		$this->db->join("category", "$table.sub_category_id = category.id", "inner");
		$this->db->join("level", "$table.level = level.id_level", "inner");
		$this->db->join("users", "$table.user_id = users.id", "inner");

		if ($key['keyword'] != '') {
			$keyword = $key['keyword'];

			if ($keyword) {
				$this->db->like("$table.title", $keyword);
				$this->db->or_like("category.name", $keyword);
				$this->db->or_like("concat(users.name, ' ', users.first_parent, ' ', users.last_parent)", $keyword);
			}
		}

		if ($dt) {
			$this->db->where($dt);
		}

		if ($count) {

			$query = $this->db->get();

			if ($query->num_rows() > 0) {

				return $query->num_rows();
			} else {
				return 0;
			}
		} else {
			$this->db->limit($limit, $offset);

			$this->db->order_by("$table.status DESC");

			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				return $query->result();
			}

		}

		return array();
	}

	public function get_section_for($dt = null, $order = null)
	{
		$this->db->select("section.*, COUNT(lesson.section_id) as num_lessons,
							SEC_TO_TIME(SUM(TIME_TO_SEC(lesson.duration))) as duration_section");
		$this->db->from("section");
		$this->db->join("lesson", "section.id = lesson.section_id", "inner");

		if ($dt) {
			$this->db->where($dt);
		}

		$this->db->group_by("lesson.section_id");

		if ($order) {
			$this->db->order_by($order);
		}

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


	public function deleterecords($id)
	{
		$query = "DELETE FROM `section` WHERE id=$id";
		$this->db->query($query);
	}

	public function delete_rows($id, $table, $field)
	{
		$this->db->where("$field", $id);
		$this->db->delete("$table");
	}
}

