<?php defined('BASEPATH') or exit('No direct script access allowed');

class Response_modal extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function ListTable($id = 0)
    {

    }

	function searched($limit, $offset, $dt, $count, $table)
	{
		$this->db->select("$table.*");
		$this->db->from("$table");

		$this->db->where("$table.parent = 0");


		if ($dt['keyword'] != '') {
			$keyword = $dt['keyword'];

			if ($keyword) {
				$this->db->like("$table.name", $keyword);
			}
		}

		if ($count) {

			$query = $this->db->get();

			if ($query->num_rows() > 0) {

				return $query->num_rows();
			}
			else
			{
				return 0;
			}
		} else {
			$this->db->limit($limit, $offset);

			$this->db->order_by("$table.last_modified DESC");

			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				return $query->result();
			}
		}
		return array();
	}

	function instructor_display($limit, $offset, $key, $dt, $count, $table)
	{
		$this->db->select("$table.*");
		$this->db->from("$table");

		if ($key['keyword'] != '') {
			$keyword = $key['keyword'];

			if ($keyword) {
				$this->db->like("$table.name", $keyword);
				$this->db->or_like("$table.email", $keyword);
				$this->db->or_like("concat($table.name,' ', $table.first_parent,' ',$table.last_parent)", $keyword);
				$this->db->or_like("concat($table.name,' ', $table.first_parent)", $keyword);
			}
		}

		if ($dt) {
			$this->db->where($dt);
		}

		if ($count) {

			$query = $this->db->get();

			if ($query->num_rows() > 0) {

				return $query->num_rows();
			}else{
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

	function slider_display($limit, $offset, $key, $dt, $count, $table)
	{
		$this->db->select("$table.*");
		$this->db->from("$table");

		if ($key['keyword'] != '') {
			$keyword = $key['keyword'];

			if ($keyword) {
				$this->db->like("$table.title", $keyword);
			}
		}

		if ($dt) {
			$this->db->where($dt);
		}

		if ($count) {

			$query = $this->db->get();

			if ($query->num_rows() > 0) {

				return $query->num_rows();
			}else{
				return 0;
			}
		} else {
			$this->db->limit($limit, $offset);

			$this->db->order_by("$table.order ASC");

			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				return $query->result();
			}
		}
		return array();
	}

	public function updateData($table, $data, $field, $id)
	{
		$this->db->where("$field", $id);
		$this->db->update($table, $data);
	}
}

