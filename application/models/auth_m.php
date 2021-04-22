<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Auth_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
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
}
?>