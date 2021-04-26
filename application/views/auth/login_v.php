<?php $attributes = array('class' => 'form-horizontal', 'id' => 'auth_login'); ?>
<article id="board_area">
	<header>
		<h1></h1>
	</header>
	<?=form_open('community/auth/login', $attributes)?>
	<fieldset>
		<legend>로그인</legend>
		<div class="control-group">
			<label class="control-label" for="input1">아이디</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="input1" name="username" value="<?=set_value('username')?>" />
				<h6><?=form_error('username')?></h6>
			</div>
			<label class="control-label" for="input2">비밀번호</label>
			<div class="controls">
				<input type="password" class="input-xlarge" id="input2" name="password" value="<?=set_value('password')?>" />
				<h6><?=form_error('password')?></h6>
			</div>
			<div class="controls">
			</div>

			<div class="form_actions">
				<button type="submit" class="btn">확인</button>
			</div>
		</div>
	</fieldset>
	</form>
</article>