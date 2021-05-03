<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Auth_m extends CI_Model
{
	function __construct()
	{
		$this->load->library('session');
		parent::__construct();
		$sql = "ALTER TABLE users AUTO_INCREMENT=1";
		$query = $this->db->query($sql);
		$sql1 = "SET @COUNT = 0";
		$query = $this->db->query($sql1);	 
		$sql2 = "UPDATE users SET id = @COUNT:=@COUNT+1";
		$query = $this->db->query($sql2);
	}
	// 게시물 작성자 아이디 반환
	// @return string 작성자 아이디
	function user_check() {
		$username = $this->session->userdata('username');
		
		$sql = "SELECT username FROM users WHERE username = '$username'";
		$query = $this->db->query($sql);
		
		return $query->row();
	}
	// 아이디 비밀번호 체크
	// @param array $auth 폼 전송받은 아이디, 비밀번호	
	// @return array
	function login($auth)
	{
		// 아이디와 비밀번호를 전송하여 데이터베이스의 데이터와 일치하면 세션을 생성
		$sql = "SELECT username, email, name FROM users WHERE username = '" . $auth['username'] . "' AND password = '" . $auth['password'] . "' ";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return FALSE;
		}
	}

	// 회원가입
	function insert_join($arrays){
		$insert_array = array(
			'username' => $arrays['id'],
			'password' => $arrays['password'],
			'name' => $arrays['name'],
			'email' => $arrays['email'],
			'reg_date' => date("Y-m-d H:i:s")
		);
		$result = $this->db->insert($arrays['table'], $insert_array);

		return $result;
	}
	
	// 회원수정
	function modify($modeif){
		extract($modeif);
		$this->db->where('username', $modeif['username']);
		$fields = array(
			'password' => $modeif['password'],
			'name' => $modeif['name'],
			'email' => $modeif['email'],
		);
		$result = $this->db->update('users',$fields);
		return $result;
	}

	// 회원탈퇴
	function leave(){
		$delete_array = array(
			'username' => $this->session->userdata('username')
		);
		$result = $this->db->delete('users', $delete_array);

		return $result;
	}
}
?>