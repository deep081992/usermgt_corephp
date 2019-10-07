<?php 
class Enquiry extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper("form");
		$this->load->helper("url");
		$this->load->library("form_validation");
		$this->load->library("session");
		$this->load->model("enquiry_model");
	}
	public function index()
	{
		//define validation rules
		$this->form_validation->set_rules("name","Name","required");
		$this->form_validation->set_rules("email","Email","required|valid_email");
		$this->form_validation->set_rules("mobile","Mobile","required|numeric|exact_length[10]");
		
		if($this->form_validation->run()==TRUE)
		{
			$name=$this->input->post("name");
			$email=$this->input->post("email");
			$mob=$this->input->post("mobile");
			$msg=$this->input->post("msg");
			
			$status=$this->enquiry_model->saveData($name,$email,$mob,$msg);
			if($status==true)
			{
				$this->session->set_tempdata("success","Thanks, We will get back you soon",2);
				redirect(current_url());
			}
			else
			{
				$this->session->set_tempdata("error","Sorry! unable to submit, try again",2);
				redirect(current_url());
			}
			
		}
		else
		{
			$this->load->view("enquiry_view");
		}
	}
}
?>