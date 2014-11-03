<?php 
	if (isset($_GET['code'])) {
		$user = User::model()->findByAttributes (array('confirm_code' => $_GET['code']), '1=1');
		if (count($user) < 1) {
			?>
				<h3>Упс!</h3>
				К сожалению код подтверждения не найден <br />
				Возможно вы ошиблись в наборе или он уже был использован <br /><br />

			<?php
		}
		if ($user->confirm_code == $_GET['code']) {
			$user->confirm_code = 0;
			$user->rule = 'user';
			$user->save();
			if (!Yii::app()->user->isGuest) {

				Yii::app()->user->confirm_code = 0;
				KV::set('confirmCode', 0);
				Yii::app()->user->rule = 'user';
			}
			?>
				<h3>Спасибо!</h3>
				Регистрация успешно подтверждена <br />
				Теперь вы полноценный пользователь сайта.
			<?php
		}
	} else {
		?>
			<h3>Здравствуйте!</h3>

			На ваш адрес эл почты отправлено письмо. <br />
			Перейдите по ссылке из письма, либо введи отправленный код ниже <br /><br />

			<form action = "" method = "GET">
				<input type = "text" name = "code" placeholder = "Введите код из письма" />
				<input type = "submit" value = "Продолжить" />
			</form>

			<a href = "<?=$this->createUrl("user/auth/signout")?>">Выйти</a>
		<?php
	}
?>

