<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// 모델 데이터베이스 연결 통로
class Board_m1 extends CI_Model 
{
	function __construct() 
	{
		parent::__construct();
		$sql1 = "ALTER TABLE test AUTO_INCREMENT=1";
		$query = $this->db->query($sql1);
		$sql0 = "SET @COUNT = 0";
		$query = $this->db->query($sql0);
		$sql01 = "UPDATE test SET no = @COUNT:=@COUNT+1";
		$query = $this->db->query($sql01);
	}

	function data_post($data){
		$data_insert = array(
			'subject' => $data['subject'],
			'contents' => $data['contents']
		);
		$result = $this->db->insert('test', $data_insert);

		return $result;
	}

	function get_list() {
		$sql = "SELECT * FROM test";
		$query = $this->db->query($sql);
		$result = $query->result();

		return $result;
	}

	function get_view($no) {
		$sql = "SELECT * FROM test where no = '$no'";
		$query = $this->db->query($sql);
		$result = $query->row();

		return $result;
	}

	function update_post($data, $no){
		$data_update = array(
			'subject' => $data['subject'],
			'contents' => $data['contents']
		);
		$where = array(
			'no' => $no
		);
		$result = $this->db->update('test', $data_update, $where);

		return $result;
	}

	function data_delete($no) {
		$delete = array(
			'no' => $no
		);
		$where = array(
			'no' => $no
		);
		$result = $this->db->delete('test',$delete, $where);

		return $result;
	}
}
?>