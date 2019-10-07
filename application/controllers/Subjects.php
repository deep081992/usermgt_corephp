<?php 
class Subjects extends CI_Controller
{
	public function index()
	{
		$this->load->model("subjects_model");
		$data['subjects']=$this->subjects_model->getAllSubjects();
		
		$this->load->view("subjects_view",$data);
	}
}
?>