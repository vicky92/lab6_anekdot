<?php if (Yii::app()->user->isGuest) { ?>
	<a href = "<?=$this->createUrl("auth/signIn")?>">Авторизация</a> <br />
	<a href = "<?=$this->createUrl("auth/signUp")?>">Регистрация</a> <br />
<?php } else { ?>
	<a href = "<?=$this->createUrl("auth/signOut")?>">Выход</a> <br /> <br />
<?php } ?>
<?php 
	if (Yii::app()->user->checkAccess('admin')) { 
		// Здесь выполняется код для администратора
	}
	
	if (Yii::app()->user->checkAccess('user')) { 
		// Здесь выполняется код для зарегестрированного пользователя
	}
	
	if (Yii::app()->user->checkAccess('guest')) { 
		// Здесь выполняется код для гостя
	}
	
	if (!Yii::app()->user->checkAccess('guest')) { 
		// Здесь выполняется код для всех кроме гостей
	}
	
	if (!Yii::app()->user->checkAccess('admin')) { 
		// Здесь выполняется код для всех кроме администратора
	}
if (Yii::app()->user->checkAccess('admin')) {	
?>
<a href = "<?=$this->createUrl('labels/view')?>">Метки</a><br /> <?php } ?>
<a href = "<?=$this->createUrl('anekdots/view')?>">Анекдоты</a><br />
<?php if (!Yii::app()->user->isGuest) { ?>
<a href = "<?=$this->createUrl('favorits/view')?>">Избранное</a><br />
<?php } ?>
