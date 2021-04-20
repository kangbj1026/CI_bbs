<?php $attributes = array('class' => 'form-horizontal', 'id' => 'auth_login'); ?>
<article id="board_area">
	<header>
		<h1></h1>
	</header>
	<?=form_open('bbs/auth/login', $attributes)?>
	<fieldset>
		<legend> 회원가입 </legend>
		<div class="control-group">
			<label class="control-label" for="input1">아이디</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="input1" name="username" value="<?php echo set_value('username'); ?>" />
				<p class="help-block"></p>
			</div>
			<label class="control-label" for="input2">비밀번호</label>
			<div class="controls">
				<input type="password" class="input-xlarge" id="input2" name="password" value="<?php echo set_value('password'); ?>" />
				<p class="help-block"></p>
			</div>
			<label class="control-label" for="input2">비밀번호 확인</label>
			<div class="controls">
				<input type="password" class="input-xlarge" id="input2" name="password" value="<?php echo set_value('password'); ?>" />
				<p class="help-block"></p>
			</div>
			<div class="controls">
				<p class="help-block"><?php echo validation_errors(); ?></p>
			</div>

			<div class="form_actions">
				<button type="submit" class="btn btn-primary">확인</button>
			</div>
		</div>
	</fieldset>
	</form>
</article>