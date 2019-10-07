<?php 
class Example extends CI_Controller
{
	public function index()
	{
		$this->benchmark->mark('start');
		$prefs = array(
			'day_type'     => 'short',
			'show_next_prev'=>true
		);
		$this->load->library("calendar",$prefs);
		
		if($this->uri->segment(3)===FALSE)
		{
			$data['year']=date("Y");
		}
		else
		{
			$data['year']=$this->uri->segment(3);
		}
		
		if($this->uri->segment(4)===FALSE)
		{
			$data['month']=date("m");
		}
		else
		{
			$data['month']=$this->uri->segment(4);
		}
		
		$this->load->view("cal_view",$data);
		
		$this->benchmark->mark('end');
		
		echo $this->benchmark->elapsed_time('start', 'end');
		
	}
}
?>