<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Auth_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	// 게시물 작성자 아이디 반환
	// return string 작성자 아이디
	function user_check() {
		$username = $this->session->userdata('username');
		
		$sql = "SELECT username FROM users WHERE username = '$username'";
		$query = $this->db->query($sql);
		
		return $query->row();
	}

	// 아이디 비밀번호 체크
	// param array $auth 폼 전송받은 아이디, 비밀번호	
	// return array
	function login($auth) {
		extract($auth);
		// 아이디와 비밀번호를 전송하여 데이터베이스의 데이터와 일치하면 세션을 생성
		$sql = "SELECT username, email, name FROM users WHERE username = '$username' AND password = '$password' ";
		$query = $this->db->query($sql);

		return $query->row();
	}

	// 회원가입
	function insert_join($arrays){
		extract($arrays);
		$insert_array = array(
			'username' => $id,
			'password' => $password,
			'name' => $name,
			'email' => $email,
			'reg_date' => date("Y-m-d H:i:s")
		);
		$result = $this->db->insert($table, $insert_array);
		return $result;
	}
	
	// 회원수정
	function modify($modeif){
		// extract 배열에서 현재 기호 테이블로 변수 가져오기
		extract($modeif);
		$this->db->where('username', $username);
		$fields = array(
			'password' => $password,
			'name' => $name,
			'email' => $email,
		);
		$result = $this->db->update($table, $fields);
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