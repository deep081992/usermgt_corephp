<?php 
class Example2 extends CI_Controller
{
	public function index()
	{
		$this->load->helper("url");
		$url = prep_url('example.com');
		echo $url;
}
}
?>