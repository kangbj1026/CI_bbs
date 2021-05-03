<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// board 컨트롤러
class Board extends CI_Controller 
{
	
	function __construct() // __construct() - 생성자의 메서드 이름
	{
		parent::__construct(); // 부모 controller 를 수동으로 호출
		$this->load->database(); // 데이터베이스 수동 연결
		$this->load->model('board_m'); // 모델은 일반적으로 컨트롤러(controller) 내에서 로드되어 호출
		$this->load->library('pagination');	// 페이지 네이션 설정
		$this->load->library('form_validation'); // system/language/english/form_validation_lang.php
		$this->load->helper(array('url', 'date')); // 핼퍼에 정의되어 있는 함수를 사용
		$this->load->helper('alert'); // 경고창
		$this->load->helper('form');
	}
	
	public function index() // 가장 기본 적으로 페이지를 열어주는 함수
	{
		$this->lists(); // $this 는 자신을 속하며 lists()는 자신안에 있는 lists() 함수를 호출
	}

	// board 사이트 헤더, 푸더
	public function _remap($method) {
		// application/views/header_v.php 를 불러옴
		$this->load->view('header_v');

		// 메소드가 존재하는지 확인 후에 if 문 실행
		if (method_exists($this, $method)) {
			// $method 는 lists 불러오기
			$this->{"{$method}"}();
		}
		// application/views/footer_v.php 를 불러옴
		$this->load->view('footer_v');
	}
   
	// board 목록
	public function lists() 
	{
		// $this->output->enable_profiler(TRUE);
		// 검색어 초기화
		$search_word = $page_url = '';
		// 세그먼트는 페이지 정하기
		$uri_segment = 5; 
 
		// 주소 중에서 q(검색어) 세그먼트가 있는 지 검사하기 위해 주소를 배열로 반환
		$uri_array = $this->segment_explode($this->uri->uri_string());
		// $uri_array[0] = board, $uri_array[1] = lists, $uri_array[2] = ci_board, $uri_array[3] = page

		// 값이 배열에 존재하는지 확인
		if (in_array('q', $uri_array)) {
			// 주소에 검색어가 있을 경우 처리 , 검색어를 반환
			$search_word = urldecode($this->url_explode($uri_array, 'q'));
			// 페이지네이션 용 주소
			$page_url = '/q/' . $search_word;
			// alert($page_url);
 
			// 검색을 하고 나서는 url 주소가 /q/$search_word 가 추가되므로 uri_segment 를 5 -> 7 로 변경
			$uri_segment = 7;
		}

		// 페이징 주소
		$config['base_url'] = '/community/board/lists/board'.$page_url.'/page';
		// 게시물 전체 개수
		$config['total_rows'] = $this->board_m->get_list($this->uri->segment(3), 'count', '', '', $search_word);
		// 한 페이지에 표시할 게시물 수
		$config['per_page'] = 5;
		// 페이지 번호가 위치한 세그먼트
		$config['uri_segment'] = $uri_segment;
 
		// 페이지네이션 초기화
		$this->pagination->initialize($config);
		// 페이지 링크를 생성하여 view에서 사용하 변수에 할당
		$data['pagination'] = $this->pagination->create_links();
 
		// 게시물 목록을 불러오기 위한 offset, limit 값 가져오기
		$page = $this->uri->segment($uri_segment, 1);

		// 만약 페이지수가 0보다 작을 경우 if문 실행
		if ($page < 0) {
			$start = (($page / $config['per_page'])) * $config['per_page'];
		} else {
			$start = ($page - 1) * $config['per_page'];
		}
		
		// ( 페이지 - 1 ) * 게시물 수
		$start = ($page - 1) * $config['per_page'];

		// 게시물 수 변수에 담기
		$limit = $config['per_page'];

		// 모델에서 쿼리문을 받아와서 list에 담기
		$data['list'] = $this->board_m->get_list($this->uri->segment(3), '', $start, $limit, $search_word);

		// list_v.php 를 불러오기
		$this->load->view('board/list_v', $data);
	}

	// url 중 키 값을 구분하여 값을 가져오도록
	// @param Array $url : segment_explode 한 url 값
	// @param String $key :  가져오려는 값의 key
	// @return String $url[$k] : 리턴 값
	function url_explode($url, $key) {
		$cnt = count($url);
 
		for ($i = 0; $cnt > $i; $i++) {
			if ($url[$i] == $key) {
				$k = $i + 1;
				return $url[$k];
			}
		}
	}
 
	// HTTP의 URL을 "/"를 Delimiter로 사용하여 배열로 바꿔 리턴
	// @param String 대상이 되는 문자열
	// @return string[]
	function segment_explode($seg) {
		// 세그먼트 앞 뒤 "/" 제거 후 uri를 배열로 반환
		// $seg = board/lists/ci_board
		$len = strlen($seg);
		// $len = 20
		if (substr($seg, 0, 1) == '/') {
			$seg = substr($seg, 1, $len);
		}
 
		$len = strlen($seg);
		if (substr($seg, -1) == '/') {
			$seg = substr($seg, 0, $len - 1);
		}

		$seg_exp = explode("/", $seg);
		return $seg_exp;
	}

	// 게시물 보기
	function view() {
		$table = $this->uri->segment(3);
		$board_id = $this->uri->segment(5);

		// 게시판 이름과 게시물 번호에 해당하는 게시물 가져오기
		$data['views'] = $this->board_m->get_view($this->uri->segment(3), $this->uri->segment(4));

		// 게시판 이름과 세미루 번호에 해당하는 댓글 리스트 가져오기
		$data['comment_lists'] = $this->board_m->get_comment($table, $board_id);

		
			$comment_data = array(
				'table' => 'comments',
				'comment' => $this->input->post('comment_contents', TRUE)
			);
			$result = $this->board_m->insert_comment($comment_data);
		
			// view 호출
			$this->load->view('board/view_v', $data);
	}

	// 게시물 쓰기
	function write() {
		// 주소 중에서 page 세그먼트가 있는지 검사하기 위해 주소를 배열로 반환
		$uri_array = $this->segment_explode($this->uri->uri_string());

		// 값이 배열에 존재하는지 확인 
		if (in_array('/page/', $uri_array)) {
			$pages = urldecode($this->url_explode($uri_array, '/page/'));
		} else {
			$pages = 1;
		}
		// 폼 검증할 필드와 규칙 사전 정의
		$this->form_validation->set_rules('subject', '제목', 'required');
		$this->form_validation->set_rules('contents', '내용', 'required');

		// 글쓰기 POST 전송 시
		if ($this->form_validation->run() == TRUE) {

			// if (!$this->input->post('subject', TRUE) || !$this->input->post('contents', TRUE)) {
			// 	글 내용이 없을 경우, 프로그램 단에서 한 번 더 체크
			// 	alert('다시 입력해주세요.', '/community/board/write/' . $this->uri->segment(3) . '/page/' . $pages);
			// 	exit;
			// }

			$write_data = array(
				// 실제 입력된 부분 저장
				'subject' => $this->input->post('subject', TRUE),
				'contents' => $this->input->post('contents', TRUE),
				'table' => $this->uri->segment(3),
				'user_id' => $this->session->userdata('username'),
				'user_name' => $this->session->userdata('name')
			);
			// print_r($this->session->userdata());

			// 모델로 저장된 부분 보냄
			$result = $this->board_m->insert_board($write_data);

			if ($result) {
				alert("입력되었습니다.", '/community/board/lists/' . $this->uri->segment(3) . '/page/' . $pages);
				exit;
			} else {
				alert("다시 입력해주세요.", '/community/board/write/' . $this->uri->segment(3) . '/page/' . $pages);
				exit;
			}
		} else {
			// 쓰기 폼 view 호출
			$this->load->view('board/write_v');
		}
	}

	// 게시글 수정
	function modify() {
		$uri_array = $this->segment_explode($this->uri->uri_string());

		if (in_array('/page/', $uri_array)) {
			$pages = urldecode($this->url_explode($uri_array, '/page/'));
		} else {
			$pages = 1;
		}

		$this->form_validation->set_rules('subject', '제목', 'required');
		$this->form_validation->set_rules('contents', '내용', 'required');

		if ($this->form_validation->run() == TRUE) {

			// db로 보낼 데이터를 배열에 담기
			$modify_data = array(
				'table' => $this->uri->segment(3),
				'board_id' => $this->uri->segment(5),
				'subject' => $this->input->post('subject', TRUE),
				'contents' => $this->input->post('contents', TRUE),
				'user_id' => $this->session->userdata('username')
			);

			// 담은 데이터를 db(model)로 보냄
			$result = $this->board_m->modify_board($modify_data);

			if ($result) {
				alert('수정되었습니다.', '/community/board/view/' . $this->uri->segment(3) . '/' . $this->uri->segment(5));
				exit;
			} else {
				alert('다시 수정해 주세요.', '/community/board/modify/' . $this->uri->segment(3) . '/board_id/' . $this->uri->segment(5) . '/page/' . $pages);
				exit;
			}
		} else {
			$data['views'] = $this->board_m->get_view($this->uri->segment(3), $this->uri->segment(5));

			$this->load->view('board/modify_v', $data);
		}
		
	}

	// 게시글 삭제
	function delete() {
		// model에서 쿼리문을 실행
		$return = $this->board_m->delete_content($this->uri->segment(3), $this->uri->segment(5));
		
		if ( $return ) {
			alert('삭제되었습니다.', '/community/board/lists/' . $this->uri->segment(3) . '/page/' . $this->uri->segment(7));
			exit;
		} else {
			alert('삭제 실패하였습니다.', '/community/board/view/' . $this->uri->segment(3) . $this->uri->segment(5));
			exit;
		}
	}
}
?>