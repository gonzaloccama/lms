<?php defined('BASEPATH') or exit('No direct script access allowed');

class Instructor_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function ListTable($id = 0)
	{

	}

	public function rowTable($table = null, $dt = null)
	{
		$this->db->select("$table.*");
		$this->db->from($table);

		if (isset($dt) && !empty($dt)):
			$this->db->where($dt);
		endif;

		$query = $this->db->get();

		if (isset($dt['id']) && !empty($dt['id'])):

			$result = $query->result();
			return $result[0];

		else:

			return $result = $query->result();

		endif;
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

