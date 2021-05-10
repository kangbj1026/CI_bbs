<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// board 컨트롤러
class Board1 extends CI_Controller 
{
	function __construct() // __construct() - 생성자의 메서드 이름
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('board_m1');
		$this->load->helper('alert');
	}

	public function index() {
		$this->main();
	}

	function main() {
		$data['list'] = $this->board_m1->get_list();

		if ($_POST) {
			$data_array = array(
				'subject' => $this->input->post('subject'),
				'contents' => $this->input->post('contents')
			);
			$result = $this->board_m1->data_post($data_array);

			if ($result) {
				alert('입력 성공!', 'board1/main');
			}
		}
		$this->load->view('board1/list_v', $data);
	}

	function read() {
		$no = $this->uri->segment(3);
		$data['view'] = $this->board_m1->get_view($no);

		$this->load->view('board1/read_v', $data);
	}

	function modify1() {
		$no = $this->uri->segment(3);
		$data['view'] = $this->board_m1->get_view($no);
		if ($_POST) {
			$data_array = array(
				'subject' => $this->input->post('subject'),
				'contents' => $this->input->post('contents')
			);
			$result = $this->board_m1->update_post($data_array, $no);

			if ($result) {
				alert('수정 성공!', '../read/'.$no);
			}
		}

		$this->load->view('board1/modify_v', $data);
	}

	function delete1() {
		$no = $this->uri->segment(3);
		$result = $this->board_m1->data_delete($no);

		if ($result) {
			alert('삭제 성공!', '../main');
		}
	}
}
?>