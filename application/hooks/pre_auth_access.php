<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
class PreAuthAccessCheck {
	private $CI;
	public function auth()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('session');
		$this->CI->load->helper('url');

		// 로그인 상태(X) 아니고 수정,삭제,쓰기 페이지 접근시 아래로 강제 이동시킴!!
		if (@$this->CI->session->userdata('logged_in') == false 
		&& in_array($this->CI->uri->segment(2), ['modify', 'delete', 'write'])) {
			alert('로그인후 사용 가능합니다.', '/bbs/board/lists/board/');
		} // 로그인 상태(o) 
		else if (@$this->CI->session->userdata('logged_in') == true
		&& in_array($this->CI->uri->segment(2), ['modify', 'delete'])) {
			$write_id = $this->CI->board_m->writer_check();
			// username 일치 하지 않을 경우
			if ($write_id->user_id != $this->CI->session->userdata('username')) {
				alert('본인이 작성한 글이 아닙니다.', '/bbs/board/view/board/' .$this->CI->uri->segment(5));
			}
		}
	}
}
?>