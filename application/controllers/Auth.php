<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends CI_Controller
{

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		//redirect(base_url("auth/login"), 'refresh');
		header("Location : http://localhost/teknofestworkhow ");
		//Buraya

	}

	public function login()
	{
		if(!isset($_SESSION['logged_in']))
		{
			$this->load->view("auth/login");
		}else
		{
			redirect("homepage");
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('main');
	}

	public function login_verify()
	{
		$this->load->model('login');
		$check = $this->login->validate();
		if($check)
		{
			echo "correct credentials";
			$email = $this->input->post('email');
			$remember = $this->input->post('rememberme');
			$query = $this->db->query("SELECT * FROM users WHERE email='".$email."'")->row_array();
			if(isset($remember)){
				$cookie = array(
					'name'   => 'email',
					'value'  => $email,
					'expire' => time()+(30*(60*60*24)),
					'domain' => 'localhost',
					'path'   => '/',
					'prefix' => ''
				);
				$this->input->set_cookie($cookie);
			} else {
				delete_cookie('email');
			}

			$sessiondata = array(
				'email'  => $email,
				'logged_in' => TRUE,
				'id' => $query['user_id']
			);

			$this->session->set_userdata($sessiondata);
			redirect('main');

		}
		else
		{
			$this->session->set_flashdata('error', 'Birtakım yanlış bilgiler girdiniz!');

			redirect('main');
		}
	}

	public function register()
	{
		/**
		 * Edited by loquat on 06FEB2020
		 */
		if($this->input->post('name'))
		{
			$n=$this->input->post('name');
			$e=$this->input->post('email');
			$p=$this->input->post('password');
			$p2=$this->input->post('password2');
			
			if($p!=$p2){
				$this->session->set_flashdata('error', 'Şifreler eşleşmedi!');
				redirect('main/register');}
				$p=md5($p);
				$que=$this->db->query("select * from users where name='".$n."' and davet='1'");
				$row = $que->num_rows();
				if($row)
				{
				//$data['error']="<h3 >This user already exists.</h3>";
					$que=$this->db->query("update users set password= '$p', email='$e',davet='0' where name='".$n."'");
					$this->session->set_flashdata('error', 'Kayıt başarılı giriş yapabilirsiniz!');
					redirect('main');

				}
				else
				{
				//$que=$this->db->query("insert into users(name,password,email) values('$n','$p','$e')");

					$this->session->set_flashdata('error', 'Adınız davetliler listesinde yok! Bir kontrol edin belli ki bir hata var.');
					redirect('main/register');

				}

			}
		//$this->load->view('auth/register',@$data);
		}

	}
