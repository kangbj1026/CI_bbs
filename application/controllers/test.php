<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// 테스트용 컨트롤러
class Test extends CI_Controller {
 
	function __construct() {
		parent::__construct();
	}
 
	public function index() {
		$this -> forms();
	}
 
	public function _remap($method) {
		$this -> load -> view('header_v');
 
		if (method_exists($this, $method)) {
			$this -> {"{$method}"}();
		}
 
		$this -> load -> view('footer_v');
	}
	
	// 폼 검증 테스트
	public function forms() {
		// Form validation 라이브러리 로드
		// system/language/english/form_validation_lang.php
		$this->load->library('form_validation');
		
		// 폼 검증 필드와 규칙 사전 정의
		// 검증 룰을 선언, 프로그램 단에서 체크하는 것이라 이곳에서 선언
		// set_rules(필드 이름, 에러 메세지를 표시할 내용, 폼 검증에 필요한 검사 규칙을 선언)
		// required =  검사 대상이 비어있으면 FALSE
		// callback_username_check - ID 중복 여부를 체크
		$this->form_validation->set_rules('username', '아이디', 'required|callback_username_check');
		// $this->form_validation->set_rules('username', '아이디', 'required|min_length[5]|max_length[12]');
		// min_length[5]|max_length[12] = 아이디 검증 규칙에 최소 5 글자, 최대 12 글자 이내로 제한하는 규칙을 추가

		$this->form_validation->set_rules('password', '비밀번호', 'required|matches[passconf]');
		// passconf 필드와 일치하는지의 여부를 체크하는 규칙을 추가

		$this->form_validation->set_rules('passconf', '비밀번호 확인', 'required');
		$this->form_validation->set_rules('email', '이메일', 'required|valid_email'); 
		// 입력한 이메일이 이메일 규칙에 맞는지 체크하는 규칙을 추가
		
		$this->form_validation->set_rules('count', '기본 값', 'numeric');
		$this->form_validation->set_rules('myselect', 'select 값', '');
		$this->form_validation->set_rules('mycheck[]', '체크 박스 값', '');
		$this->form_validation->set_rules('myradio', '라디오 버튼 값', '');

		if ($this->form_validation->run() == FALSE) {
			// 뷰에서 다시 돌려받은 값을 어떻게 표시하고 에러 메세지를 표시
			$this->load->view('test/forms_v');
		} else {
			$this->load->view('test/form_success_v');
		}
	}

	// id를 받아오면 db에서 중복되었는지 확인
	public function username_check($id) {
		$this->load->database();
		
		if ($id) {
			$result = array();
			$sql = "SELECT * FROM users WHERE username = '".$id."'";
			$query = $this->db->query($sql);
			$result = @$query->row();
			
			if ($result) {
				$this->form_validation->set_message('username_check', $id.'은(는) 중복된 아이디 입니다.');
				return FALSE;
			} else {
				return TRUE;
			}
		} else {
			return FALSE;
		}
	}
}
?> 