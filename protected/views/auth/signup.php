<h3>Регистрация нового пользователя</h3> <br />
<form action = "" method = "POST" class = "registration-form">
			<label for = "registration-email">Email</label><br />
			<input type = "text" name = "registration[email]" id = "registration-email" placeholder = "Ваш email адрес" value = "<?=$model->email?>" /><br />
			<?php if ($model->hasErrors('email')) { ?> <br />
				<font class = "error"><?=$model->getError('email')?></font>
			<?php } ?> <br /><br />
		
			<label for = "registration-password">Пароль</label><br />
			<input type = "password" name = "registration[password]" id = "registration-password" placeholder = "Не меньше 6 символов" />
			<br />
			<?php if ($model->hasErrors('password')) { ?> <br />
				<font class = "error"><?=$model->getError('password')?></font>
			<?php } ?> <br /><br />
	
			<label for = "registration-confirm-password">Проверка пароля</label><br />
			<input type = "password" name = "registration[compare_password]" id = "registration-confirm-password" placeholder = "Повторите пароль" />
			<br />
			<?php if ($model->hasErrors('compare_password')) { ?><br />
				<font class = "error"><?=$model->getError('compare_password')?></font>
			<?php } ?><br /><br />
		
			<label for = "registration-verifyCode" style = "line-height: 50px;">Код с картинки</label><br />
			
			
			<input type = "text" name = "registration[verifyCode]" id = "registration-verifyCode" style = "width: 200px;" />
			<?php if ($model->hasErrors('verifyCode')) { ?><br />
				<font class = "error"><?=$model->getError('verifyCode')?></font>
			<?php } ?> <br />
			<?$this->widget('CCaptcha', array('showRefreshButton' => false, 'clickableImage' => true))?><br /><br />
			<input type = "submit" value = "Продолжить регистрацию" />
</form>
