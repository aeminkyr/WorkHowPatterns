<?php 
/**
 * created by aemin on FEB2920
 */
class Deadlines extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}


	public function index(){

		

		$datestr="2020-03-20 00:00:00";//Your date
		$date=strtotime($datestr);//Converted to a PHP date (a second count)

		//Calculate difference
		$diff=$date-time();//time returns current time in seconds
		$days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
		$hours=round(($diff-$days*60*60*24)/(60*60));

		$timeleft = array(
			'days' =>$days ,
			'hours'=>$hours
		);
		$viewdata = array(
			'title' => "Deadlines" ,
			'timeleft'=>$timeleft
		);

		$this->load->view("deadlines",$viewdata);

	}
}