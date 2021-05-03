<?php $attributes = array('class' => 'form-horizontal', 'id' => 'auth_join');
if(@$this->session->userdata('logged_in') == false) {
?>
<article id="board_area">
	<?=form_open('community/auth/join', $attributes)?>
	<!-- <form class="form-horizontal" method="POST" id="auth_join" action=""> -->
	<fieldset>
		<legend> 회원가입 </legend>
		<div class="control-group">
			<label class="control-label" for="input1">아이디</label>
			<div>
				<input type="text" class="input-xlarge" id="input1" name="id" value="<?=set_value('id')?>" />
				<h6><?=form_error('id')?></h6>
			</div>
			<label class="control-label" for="input3">비밀번호</label>
			<div>
				<input type="password" class="input-xlarge" id="input2" name="password" value="<?=set_value('password')?>" />
				<h6><?=form_error('password')?></h6>
			</div>
			<label class="control-label" for="input3">비밀번호 확인</label>
			<div>
				<input type="password" class="input-xlarge" id="input2" name="passconf" value="<?=set_value('passconf')?>" />
				<h6><?=form_error('passconf')?></h6>
			</div>
			<label class="control-label" for="input4">이름</label>
			<div>
				<input type="text" class="input-xlarge" id="input2" name="name" value="<?=set_value('name')?>" />
				<h6><?=form_error('name')?></h6>
			</div>
			<label class="control-label" for="input5">이메일</label>
			<div>
				<input type="text" class="input-xlarge" id="input2" name="email" value="<?=set_value('email')?>" />
				<h6><?=form_error('email')?></h6>
			</div>

			<div>
				<button type="submit" class="btn">확인</button>
				<input class="btn" type="button" onclick="window.history.back()" value="취소">
			</div>
		</div>
	</fieldset>
	</form>
	<?php } else { ?>
		<?=form_open('community/auth/modify', $attributes)?>
	<fieldset>
		<legend> 회원수정 </legend>
		<div class="control-group">
			<label class="control-label" for="input1">아이디</label>
			<div>
				<?=$this->session->userdata('username')?>
			</div>
			<label class="control-label" for="input3">비밀번호</label>
			<div>
				<input type="password" class="input-xlarge" id="input2" name="password" value="" />
				<h6><?=form_error('password')?></h6>
			</div>
			<label class="control-label" for="input3">비밀번호 확인</label>
			<div>
				<input type="password" class="input-xlarge" id="input2" name="passconf" value="" />
				<h6><?=form_error('passconf')?></h6>
			</div>
			<label class="control-label" for="input4">이름</label>
			<div>
				<input type="text" class="input-xlarge" id="input2" name="name" value="<?=$this->session->userdata('name')?>" />
				<h6><?=form_error('name')?></h6>
			</div>
			<label class="control-label" for="input5">이메일</label>
			<div>
				<input type="text" class="input-xlarge" id="input2" name="email" value="<?=$this->session->userdata('email')?>" />
				<h6><?=form_error('email')?></h6>
			</div>

			<div>
				<button type="submit" class="btn"> 수정 완료 </button>
				<input class="btn" type="button" onclick="window.history.back()" value="취소">
			</div>
		</div>
	</fieldset>
	</form>
	<?php  } ?>
</article>