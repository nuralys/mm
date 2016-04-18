<div class="admin_enter">
				<div class="title_admin">Авторизация</div>
<div class="form_enter">
<?php 
	echo $this->Form->create('User');
	echo $this->Form->input('username', array('label' => '', 'class' => 'admin_input_f', 'placeholder' => 'Логин'));
	echo $this->Form->input('password', array('label' => '', 'class' => 'admin_input_f', 'placeholder' => 'Пароль'));
	?>
	<a href="/users/forgetpwd" class="zab_pass">Забыли пароль?</a>
	<?php
	echo $this->Form->end('Войти');
?>
</div>
</div>
