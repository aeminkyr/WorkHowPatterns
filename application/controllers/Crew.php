<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * created by aemin on FEB2820
 */
class Crew extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}



	public function index(){
		$this->load->model('Crew_model');
		$userdata = $this->Crew_model->select();
		$viewdata = array(
			'title' =>"Squadron Ekibi" ,
			'userdata'=>$userdata );
		$this->load->view("crew",$viewdata);
	}
}