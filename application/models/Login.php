<?php
class Login extends CI_Model
{
	function validate()
	{
    /*$arr['email'] = $this->input->post('username');
    $arr['password'] = md5($this->input->post('password'));*/

    $data = array(
    	'email'		 => $this->input->post('email'),
    	'password' 	 => md5($this->input->post('password'))
    );
    return $this->db->get_where('users',$data)->row();
}

}

?>
