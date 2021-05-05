<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// 사용자 인증 컨트롤러
class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('auth_m');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('alert');
	}

	public function index()
	{
		$this->login();
	}

	public function _remap($method)
	{
		$this->load->view('header_v');

		if (method_exists($this, $method)) {
			$this->{"{$method}"}();
		}

		$this->load->view('footer_v');
	}

	// 회원가입
	public function join(){
		$this->form_validation->set_rules('id', '아이디', 'required|callback_username_check|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password', '비밀번호', 'required|min_length[6]|max_length[15]');
		$this->form_validation->set_rules('passconf', '비밀번호 확인', 'required|matches[password]');
		$this->form_validation->set_rules('name', '이름', 'required|min_length[2]|max_length[12]');
		$this->form_validation->set_rules('email', '이메일', 'required|valid_email');

			if ($this->form_validation->run() == TRUE) {
			$data = array(
				'table' => 'users',
				'id' => $this->input->post('id', true),
				'password' => $this->input->post('password', true),
				'name' => $this->input->post('name', true),
				'email' => $this->input->post('email', true),
			);
			// print_r($data);
			$result = $this->auth_m->insert_join($data);

			if ($result) {
				alert("회원가입 축하드립니다.", '/community/board/lists/board');
			} else {
				alert("다시 작성 부탁드립니다.", '/community/auth/join');
			}
		} else {
			$this->load->view('auth/join_v');
		}
	}

	// 로그인 처리
	public function login()
	{
		$this->form_validation->set_rules('username', '아이디', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', '비밀번호', 'required');

		if ($this->form_validation->run() == TRUE) {
			$auth_data = array(
				'username' => $this->input->post('username', TRUE),
				'password' => $this->input->post('password', TRUE),
			);

			$result = $this->auth_m->login($auth_data);

			if ($result) {
				$newdata = array(
					'username' => $result->username,
					'name' => $result->name,
					'email' => $result->email,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($newdata);

				alert('로그인 되었습니다.', '/community/board/lists/board/page/1');
				exit;
			} else {
				alert('아이디나 비밀번호를 확인해 주세요. ', '/community/auth/login');
				exit;
			}
		} else {
			$this->load->view('auth/login_v');
		}
	}

	public function logout()
	{
		// sessions table delete column data - username, email, logged_in ;
		$this->session->sess_destroy();
		// delete from sessions where session_id;
		$this->session->unset_userdata('username');

		alert('로그아웃 되었습니다.', '/community/board/lists/board');
		exit;
	}

	// id를 받아오면 db에서 중복되었는지 확인
	public function username_check($id) {		
		if ($id) {
			$result = array();
			$sql = "SELECT * FROM users WHERE username = '".$id."'";
			$query = $this->db->query($sql);
			$result = @$query->row();
			
			if ($result) {
				$this->form_validation->set_message('username_check', $id.'은(는) 중복된 아이디 입니다.');
				return false;
			} else {
				return true;
			}
		}
	}

	// 회원수정
	function user_modify(){
		$this->form_validation->set_rules('password', '비밀번호', 'required|min_length[6]|max_length[15]');
		$this->form_validation->set_rules('passconf', '비밀번호 확인', 'required|matches[password]');
		$this->form_validation->set_rules('name', '이름', 'required|min_length[2]|max_length[12]');
		$this->form_validation->set_rules('email', '이메일', 'required|valid_email');

			if ($this->form_validation->run() == TRUE) {
			$fields = array(
					'table' => 'users',
					'username' => $this->session->userdata('username'),
					'password' => $this->input->post('password', true),
					'name' => $this->input->post('name', true),
					'email' => $this->input->post('email', true),
			);
			$result = $this->auth_m->modify($fields);
	
			if ($result) {
				$this->session->sess_destroy();
				alert("수정완료 되었습니다. 다시 로그인 시도 해주세요.", '/community/auth/login');
			} else {
				alert("다시 작성 부탁드립니다.", '/community/auth/user_modify');
			}
		} else {
			$this->load->view('auth/join_v');
		}
	}
	
	function user_leave(){
		$this->auth_m->leave();
		$this->session->sess_destroy();
		alert("회원 탈퇴 되셨습니다! 수고하셨습니다!", '/community/auth/login');
	}
}
?>