<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$viewdata = array(
			'title' 	=> "Squadron Teknofest Work How",
			'logourl'	=> base_url('assets/img/loginlogo.png'),
			'actionurl'	=>base_url('auth/login_verify')
		);
		$this->load->view('auth/login',$viewdata);
	}

	public function register(){
		if(isset($_SESSION['logged_in'])){redirect('main');}
		$viewdata = array(
			'title' 	=> "Squadron Teknofest Kayıt",
			'logourl'	=> base_url('assets/img/loginlogo.png'),
			'actionurl'	=>base_url('auth/register')
		);
		$this->load->view('auth/register',$viewdata);

	}

	public function home()
	{
		if(!isset($_SESSION['logged_in'])){redirect("main");}
		$this->load->model("main_model");
		$todos = $this->main_model->select("0","user_id","reg_date");
		$inprocess = $this->main_model->select("1","owner_id","update_date");
		$finished = $this->main_model->select("2","owner_id","update_date");
		$issues = $this->main_model->select("3","user_id","update_date");
		$c0 = $this->main_model->rowcount("0");
		$c1 = $this->main_model->rowcount("1");
		$c2 = $this->main_model->rowcount("2");
		$c3 = $this->main_model->rowcount("3");
		$count = array(
			'c0' 	=>$c0,
			'c1'	=>$c1,
			'c2'	=>$c2,
			'c3'	=>$c3
		);
		$sum = $c0+$c1+$c2+$c3;
		if($sum!=0){
			$percent = round((100*$c2)/$sum);} else {
				$percent ="0";
			}
			$viewdata = array(
				'dbdata' =>$todos ,
				'inprocess' =>$inprocess,
				'finished' =>$finished,
				'issues'=> $issues,
				'count' => $count,
				'percent' => $percent,
				'title' =>"Ekip çalışması" 
			);
			$this->load->view('homepage',$viewdata);
		}
		public function insert(){
			$post = $this->input->post("content");
			$this->load->model("main_model");
			$data = array(
				'content' =>$post,
				'user_id' => $_SESSION['id'],
				'active'  => "1" 
			);
			$insert = $this->main_model->insert($data);
			if($insert){
				redirect("main");
			}
		}
		public function delete($id){
			$this->load->model("main_model");
			//$data = array('lists_id' =>$id);
			$delete = $this->main_model->delete($id);
			if($delete){
				redirect("main");
			}
		}
		public function update($id,$which){
			$this->load->helper('date');
			$turkey = now("Turkey");
			$update_date = mdate("%Y-%m-%d %H:%i:%s",$turkey);

			$data = array(
				'whichlist' => $which,
				"owner_id"	=>$_SESSION['id'],
				"update_date"=> $update_date );
			$this->load->model("main_model");
			$update= $this->main_model->update($id,$data);
			if($update){redirect("main");}
		}
		public function rowcount($data){
			$modeldata = array('whichlist' =>$data );
			$this->load->model("main_model");
			echo $this->main_model->rowcount($modeldata);
		}
	}