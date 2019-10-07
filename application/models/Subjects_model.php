<?php 
class Subjects_model extends CI_Model
{
	public function getAllSubjects()
	{
		$data=array("HTML","CSS","Javascript","JQuery","Bootstrap","AJAX","Node","Angular","JSON");
		return $data;
	}
}
?>