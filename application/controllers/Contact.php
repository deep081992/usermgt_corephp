<?php 
class Contact extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model("contact_model");
	}
	public function index()
	{
		$data['records']=$this->contact_model->getRecords();
		$this->load->view("contact_view",$data);
	}
}

?>