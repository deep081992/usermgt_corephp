<?php 
class Enquiry_model extends CI_Model
{
	public function saveData($name,$email,$mob,$msg)
	{
		$this->db->query("insert into contact(name,email,mobile,message) values('$name','$email','$mob','$msg')");
		if($this->db->affected_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>