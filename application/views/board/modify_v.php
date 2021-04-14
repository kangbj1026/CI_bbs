<article id="board_area">
	<header>
		<h1></h1>
	</header>
	<form class="form-horizontal" method="post" action="" id="write_action">
		<fieldset>
			<legend>게시물 수정</legend>
			<div class="control-group">
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