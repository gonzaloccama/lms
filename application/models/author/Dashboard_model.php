<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
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

	public function count_field($table = null, $dt = null)
	{
		$this->db->select("$table.*");
		$this->db->from($table);

		if ($dt) {
			$this->db->where($dt);
		}

		$query = $this->db->get();

		return $query->num_rows();

	}
}

