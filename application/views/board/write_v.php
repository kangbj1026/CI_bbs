<?php $attributes = array('class' => 'form-horizontal', 'id' => 'write_action');?>
<article id="board_area">
	<!-- <form class="form-horizontal" method="post" action="" id="write_action"> -->
	<?php
	echo form_open('community/board/write/board', $attributes);
	?>
	<fieldset>
		<legend>
			게시물 쓰기
		</legend>
		<div class="control-group">
			<!-- script으로 구현한 alert 경고창을 없애고 text로 에러 메세지를 한번에 표현하는 방법 -->
			<h6><?=validation_errors()?></h6>
			<label class="control-label" for="input01"> 제목 : </label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="input01" name="subject" value="<?=set_value('subject')?>">
				<h6>게시물의 제목을 적어주세요.</h6>
			</div>
			<label class="control-label" for="input02"> 내용 : </label>
			<div class="controls">
				<textarea id="input02" name="contents" rows="10"><?=set_value('contents')?></textarea>
				<h6>게시물의 내용을 적어주세요.</h6>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn" id="write_btn"> 작성 </button>
				<input class="btn" type="button" onclick="document.location.reload();" value="새로고침">
				<input class="btn" type="button" onclick="window.history.back()" value="취소">
			</div>
		</div>
	</fieldset>
	</form>
</article>