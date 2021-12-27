<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

	public function rowTable($table = null, $dt = null)
	{
		$this->db->select("$table.*");
		$this->db->from($table);

		if ($dt):
			$this->db->where($dt);
		endif;

		$query = $this->db->get();

		if (!$query->result())
			return false;

		return $result = $query->result();
	}

	function authSession($email)
	{
		$data = $this->db->get_where("users", array("email" => $email), 1);

		if (!$data->result())
			return false;

		return $data->row();
	}

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function updateData($table, $data, $dt = null)
	{
		$this->db->where($dt);
		$this->db->update($table, $data);
	}
}
