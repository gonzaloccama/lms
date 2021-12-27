<?php defined('BASEPATH') or exit('No direct script access allowed');

class Course_model extends CI_Model
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

		if ($query->num_rows() > 0) {
			return $result = $query->result();
		}
		else{
			return false;
		}

	}
}
