<article id="board_area">
	<!-- <form class="form-horizontal" method="post" action="" id="write_action"> -->
		<?php
		$attributes = array('class' => 'form-horizontal', 'id' => 'write_action');
		echo form_open('community/board/modify/board/board_id/'.$this->uri->segment(5).'/page', $attributes);
		?>
		<fieldset>
			<legend>
				게시물 수정
			</legend>
			<div class="control-group">
			<h6><?=validation_errors()?></h6>
				<label class="control-label" for="input01"> 제목 : </label> <br>
				<input type="text" class="input-xlarge" id="input01" name="subject" value="<?=$views->subject?>" /><br>
				<label class="control-label" for="input02"> 내용 : </label> <br>
				<textarea id="input02" name="contents"><?=$views->contents?></textarea>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-modify" id="write_btn"> 수정 </button>
				<input class="btn" type="button" onclick="document.location.reload()" value="새로고침">
				<input class="btn" type="button" onclick="window.history.back()" value="취소">
			</div>
			</div>
		</fieldset>
	</form>
</article>