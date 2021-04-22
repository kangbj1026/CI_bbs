<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// AJAX 처리 컨트롤러
class Ajax_board extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	// AJAX 테스트
	public function test()
	{
		$this->load->view('ajax/test_v');
	}

	public function ajax_action()
	{
		echo '<meta http-equiv="Content-Type" content="test/html; charset=utf-8" />';

		$name = $this->input->post("name");

		echo $name . "님 반갑습니다 !";
	}

	// XMLHttpRequest 객체를 통해 전달받은 데이터를 가공하고, 댓글 리스트를 HTML 형태로 반환하는 ajax_comment_add() 함수를 작성
	public function ajax_comment_add()
	{
		if (@$this->session->userdata('logged_in') == TRUE) {
			$this->load->model('board_m');

			// XMLHttpRequest 객체를 통해 전달받은 각 데이터를 인식하기 편한 변수명으로 변경
			$table = $this->input->post('table', TRUE);
			$board_id = $this->input->post('board_id', TRUE);
			$user_id = $this->session->userdata('username');
			$comment_contents = $this->input->post('comment_contents', TRUE);

			if ($comment_contents != '') {
				$write_data = array(
					"table" => $table,
					"board_pid" => $board_id,
					"subject" => $comment_contents,
					"contents" => $comment_contents,
					"user_id" => $user_id
				);

				$result = $this->board_m->insert_comment($write_data);

				if ($result) {
					$sql = "SELECT * FROM " . $table . " WHERE board_pid = '" . $board_id . "' ORDER BY board_id DESC";
					$query = $this->db->query($sql);
?>
					<table cellspacing="0" cellpadding="0" class="table table-striped">
						<tbody>
							<?php
							foreach ($query->result() as $lt) {
							?>
								<tr>
									<th scope="row">
										<?php echo $lt->user_id; ?>
									</th>
									<td><?php echo $lt->contents; ?></td>
									<td>
										<time datetime="<?php echo mdate("%Y-%M-%j", human_to_unix($lt->reg_date)); ?>">
											<?php echo $lt->reg_date; ?>
										</time>
									</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
<?php
				} else {
					// 글 실패시
					echo "2000";
				}
			} else {
				// 글 내용이 없을 경우
				echo "1000";
			}
		} else {
			// 로그인 필요 에러
			echo "9000";
		}
	}
}
?>