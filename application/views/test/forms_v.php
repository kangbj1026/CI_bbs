<article id="board_area">
	<header>
		<h1></h1>
	</header>
	<!-- validation_errors() - 에러 메세지를 한번에 리스트로 표현하는 방법 -->
	<?php // echo validation_errors(); ?>
	<?php
		// 에러 메세지를 개별적으로 표시하는 방법
        if ( form_error('username')) {
            $error_username = form_error('username');
        } else {
            $error_username = form_error('username_check');
        }
		echo "<script>console.log('$error_username');</script>";
   ?>

	<form method="POST" class="form-horizontal">
		<fieldset>
			<legend> 폼 검증</legend>
			<div class="control-group">
				<label class="control-label" for="input01">아이디</label>
				<div class="controls">
					<!--
					set_value() 
					input 이나 textarea의 폼 데이터 복원에 사용
					첫 번째 파라미터로 필드 이름을 넘겨줌, 두 번째 파라미터에 값을 입력할 경우 폼이 처음 로드될 때 기본 값으로 사용
					-->
					<input type="text" name="username" class="input-xlarge" id="input01" value="<?php echo set_value('username'); ?>" />
					<p class="help-block">
						<?php
							if($error_username == false){
								echo "아이디를 입력해주세요.";
							} else {
								echo $error_username;
							}
						?>
					</p>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="input02">비밀번호</label>
				<div class="controls">
					<input type="password" name="password" class="input-xlarge" id="input02" />
					<p class="help-block">
						<?php
							if ( form_error('password') == false) {
								echo "비밀번호를 입력해주세요.";
							} else {
								echo form_error('password');
							}
						?>
					</p>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="input03">비밀번호 확인</label>
				<div class="controls">
					<input type="password" name="passconf" class="input-xlarge" id="input03" />
					<p class="help-block">비밀번호를 한 번 더 입력하세요.</p>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="input04">이메일</label>
				<div class="controls">
					<input type="text" name="email" class="input-xlarge" id="input04" value="<?php echo set_value('email'); ?>" />
					<p class="help-block">이메일을 입력하세요.</p>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="input05">기본 값 설정</label>
				<div class="controls">
					<input type="text" name="count" class="input-xlarge" id="input05" value="<?php echo set_value('count', 0); ?>" />
					<p class="help-block">기본 값이 출력됩니다.</p>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="input06">Select 값 복원</label>
				<div class="controls">
					<select name="myselect" id="input06">
					<!--
						set_select()
						<select> 태그를 사용할 때 선택했던 값을 표시
						첫 번째 파라미터는 select의 name, 두 번째 파라미터는 각 아이템의 값,
						세 번째 파라미터에는 TRUE 또는 FALSE를 설정할 경우 선택된 값
					-->
						<option value="one" <?php echo set_select('myselect', 'one', TRUE); ?>>
							One
						</option>
						<option value="two" <?php echo set_select('myselect', 'two'); ?>>
							Two
						</option>
						<option value="three" <?php echo set_select('myselect', 'three'); ?>>
							Three
						</option>
					</select>
					<p class="help-block">선택 하세요.</p>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="input07">체크박스</label>
				<div class="controls">
				<!--
					set_checkbox()
					전송할 당시의 체크박스의 값을 복원
					첫 번째 파라미터는 체크박스 필드 이름, 두 번째 파라미터는 선택된 값
					세 번째 파라미터는 불리언 값으로 선택된 값
				-->
					1번 <input type="checkbox" name="mycheck[]" id="input07" value="1" <?php echo set_checkbox('mycheck[]', '1', TRUE); ?> />
					2번 <input type="checkbox" name="mycheck[]" id="input07" value="2" <?php echo set_checkbox('mycheck[]', '2'); ?> />
					<p class="help-block">체크박스를 선택하세요.</p>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="input08">라디오</label>
				<div class="controls">
				<!--
					set_radio()
					라디오 버튼을 전송할 당시의 값으로 복원, 사용법은 set_checkbox()와 동일
				-->
					1번 <input type="radio" name="myradio" id="input08" value="1" <?php echo set_radio('myradio', '1', TRUE); ?> />
					2번 <input type="radio" name="myradio" id="input08" value="2" <?php echo set_radio('myradio', '2'); ?> />
					<p class="help-block">라디오 버튼을 선택하세요.</p>
				</div>
			</div>
		</fieldset>

		<div><input type="submit" value="전송" class="btn btn-primary" /></div>
	</form>
</article>