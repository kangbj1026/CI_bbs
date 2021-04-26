<article id="board_area">
	<table cellspacing="0" cellpadding="0" class="table">
		<thead>
			<tr>
				<th scope="col"><?=$views->subject?></th>
				<th scope="col">아이디: <?=$views->user_id?></th>
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
					<?php
					if (@$this->session->userdata('logged_in')) {
					?>
						<a href="/bbs/board/modify/<?=$this->uri->segment(3)?>/board_id/<?=$this->uri->segment(4)?>/page" class="btn btn-warning"> 수정 </a>
						<a href="/bbs/board/delete/<?=$this->uri->segment(3)?>/board_id/<?=$this->uri->segment(4)?>/page" class="btn btn-danger"> 삭제 </a>
						<a href="/bbs/board/write/<?=$this->uri->segment(3)?>/page/<?=$this->uri->segment(7)?>" class="btn btn-success">쓰기</a>
					<?php
					}
					?>
				</th>
			</tr>
		</tfoot>
	</table>

	<form class="form-comments" method="POST" action="" id="comment_action" name="com_add">
	<fieldset>
		<label class="control-label" for="input01"> 댓글 추가 </label>
			<div class="comments">
					<textarea class="input-xlarge" id="input01" name="comment_contents" ></textarea>
					<input class="btn" type="button" onclick="document.getElementById('input01').value='';" value="취소" />
					<input class="btn" type="button" id="comment_btn" onclick="comment_add()" value="작성" />
			</div>
		</fieldset>
	</form>

	<!-- <form class="form-comments" method="POST" action="" name="com_add">
		<fieldset>
		<label class="control-label" for="input01"> 댓글 추가 </label>
			<div class="comments">
					<textarea class="input-xlarge" id="input01" name="comment_contents" ></textarea>
					<input class="btn" type="button" onclick="document.getElementById('input01').value='';" value="취소" />
					<input class="btn" type="button" onclick="comment_add()" value="작성" />
			</div>
		</fieldset>
	</form> -->
	
	<!-- <div id="comment_area">
		<table cellspacing="0" cellpadding="0" class="table">
			<tbody>
				<?php
				foreach ($comment_lists as $lt) {
				?>
					<tr>
						<th scope="row">
							<?=$lt->user_id;?>
						</th>
						<td><?=$lt->contents;?></td>
						<td>
							<time datetime="<?=mdate("%Y-%M-%j", human_to_unix($lt->reg_date))?>">
								<?=$lt->reg_date?>
							</time>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div> -->
</article>