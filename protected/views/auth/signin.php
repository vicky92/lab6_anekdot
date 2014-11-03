<h3>Вход на сайт</h3> <br />
<form action = "" method = "POST" class = "enter-form">
	<div class="row">
		<div class="small-2 columns">
			<label for = "enter-email">Email</label>
		</div>
		<div class="small-10 columns">
			<input type = "text" name = "enter[email]" <?=($model->hasErrors('email'))?'class = "error"':''?> id = "enter-email" value = "<?=$model->email?>" placeholder = "Ваш электронный ящик" />
			<?php if ($model->hasErrors('email')) { ?><br />
				<small class = "error"><?=$model->getError('email')?></small>
			<?php } ?>
		</div>
	</div>
	<div class="row">
		<div class="small-2 columns">
			<label for = "enter-password">Пароль</label>
		</div>
		<div class="small-10 columns">
			<input type = "password" name = "enter[password]" <?=($model->hasErrors('password'))?'class = "error"':''?> id = "enter-password" placeholder = "Ваш пароль" />
			<?php if ($model->hasErrors('password')) { ?><br />
				<small class = "error"><?=$model->getError('password')?></small>
			<?php } ?>
		</div>
	</div>
	<div class="row">
		<div class="small-2 columns"></div>
		<div class="small-10 columns">
			<input type = "submit" class = "button small radius" value = " Войти" />
		</div>
	</div>
</form>