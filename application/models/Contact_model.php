<?php
class Contact_model extends CI_Model
{
	public function getRecords()
	{
		$data=$this->db->query("select *from contact");
		if($data->num_rows()>0)
		{
			return $data->result();
		}
		else
		{
			return false;
		}
	}
}
?>