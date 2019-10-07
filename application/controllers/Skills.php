<?php 
class Skills extends CI_Controller
{
	public function index()
	{
		$this->load->model("skills_model");
		$data['subjects']=$this->skills_model->getSkills();
		$this->load->view("skills_view",$data);
	}
}
?>