<?php 
class Test extends CI_Controller
{
	public function index()
	{
		$data['subjects']=array("HTML","CSS","Bootstrap","Jquery","PHP","MYSQL");
		$this->load->view("myview",$data);
	}
}
?>