<article id="board_area">
	<table cellspacing="0" cellpadding="0" class="table">
		<thead>
			<tr>
				<th scope="col"><?=$views->subject?></th>
				<th scope="col">이름: <?=$views->user_name?></th>
				<th scope="col">조회수: <?=$views->hits?></th>
				<th scope="col">등록일: <?=$views->reg_date?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th colspan="4">
				<div class="pre"><?=$views->contents?></div>
				</th>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">
					<a href="/bbs/board/lists/<?=$this->uri->segment(3)?>/page/<?=$this->uri->segment(7)?>" class="btn btn-primary">목록 </a>
					<a href="/bbs/board/modify/<?=$this->uri->segment(3)?>/board_id/<?=$this->uri->segment(4)?>/page" class="btn btn-warning"> 수정 </a>
					<a href="/bbs/board/delete/<?=$this->uri->segment(3)?>/board_id/<?=$this->uri->segment(4)?>/page" class="btn btn-danger"> 삭제 </a>
					<a href="/bbs/board/write/<?=$this->uri->segment(3)?>/page/<?=$this->uri->segment(7)?>" class="btn btn-success">쓰기</a>
				</th>
			</tr>
		</tfoot>
	</table>
</article>