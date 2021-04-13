<script>
	$(document).ready(function() {
		$("#write_btn").click(function() {
			if ($("#input01").val() == '') {
				alert('제목을 입력해 주세요.');
				$("#input01").focus();
				return false;
			} else if ($("#input02").val() == '') {
				alert('내용을 입력해 주세요.');
				$("#input02").focus();
				return false;
			} else {
				$("#write_action").submit();
			}
		});
	});
</script>
<article id="board_area">
		<form class="form-horizontal" method="post" action="" id="write_action">
			<fieldset>
				<legend>
					게시물 쓰기
				</legend>
				<div class="control-group">
					<label class="control-label" for="input01"> 제목 : </label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="input01" name="subject" value="게시물의 제목을 써주세요.">
					</div>
					<label class="control-label" for="input02"> 내용 : </label>
					<div class="controls">
						<textarea id="input02" name="contents" rows="10" wrap="hard">게시물의 내용을 써주세요.
						</textarea>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn" id="write_btn"> 작성 </button>
						<input class="btn" type="button" onclick="document.location.reload()" value="새로고침">
						<input class="btn" type="button" onclick="window.history.back()" value="취소">
					</div>
				</div>
			</fieldset>
		</form>
</article>