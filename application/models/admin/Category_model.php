<?php defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function ListTable($id = 0, $table)
	{
		$this->db->select("$table.*");
		$this->db->from($table);

		$query = $this->db->get();

		return $result = $query->result();
	}

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function rowTable($table = null, $dt = null)
	{
		$this->db->select("$table.*");

		$this->db->from($table);

		if ($dt):
			$this->db->where($dt);
		endif;

		$query = $this->db->get();
		$result = $query->result();

		if (isset($dt['id']) && !empty($dt['id'])) {
			return $result[0];
		} else {
			return $result;
		}

	}

	public function parents($table)
	{
		$this->db->select("a.`name` as `name`, a.id as id, b.total
					FROM $table AS a 
					INNER JOIN(
								SELECT parent, COUNT(1) as total
									FROM $table
									WHERE parent <> id
									GROUP BY parent
								 ) AS b 
					ON a.id = b.parent
					AND b.total>=0");

		$query = $this->db->get();

		return $result = $query->result();
	}

	public function updateData($table, $data, $field, $id)
	{
		$this->db->where("$field", $id);
		$this->db->update($table, $data);
	}

	public function delete_rows($id, $table, $field)
	{
		$this->db->where("$field", $id);
		$this->db->delete("$table");
	}
}

