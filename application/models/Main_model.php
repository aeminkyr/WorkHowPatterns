<?php


/**
 * created by aemin on 27FEB20
 */
class Main_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}

	public $listTable= "lists";


	public function select($where,$join,$order){ 
		$sWhere= array(
			'whichlist' =>$where ,
			'active' 	=> "1"
		);
		$this->db->select('*');
		$this->db->from($this->listTable);
		$this->db->where($sWhere);
		$this->db->join('users', 'users.user_id = lists.'.$join)->order_by('lists.'.$order, 'DESC');
		return $this->db->get()->result();

	}

	public function insert($data){

		return $this->db->insert($this->listTable, $data);
	}


	public function delete($id){
		$data = array(
			"active" =>"0" ,
		);
		$this->db->where('lists_id', $id);
		return $this->db->update($this->listTable, $data);

		//return $this->db->delete($this->listTable,$data);
	}

	public function update($id,$data){
		/*echo $id."<br>";
		print_r($data);
		*/
		$this->db->where('lists_id', $id);
		return $this->db->update($this->listTable, $data);
	}

	public function rowcount($data){
		$sWhere= array(
			'whichlist' =>$data ,
			'active' 	=> "1"
		);
		$this->db->from($this->listTable);
		return $this->db->where($sWhere)->count_all_results();

	}




}