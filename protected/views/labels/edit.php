<h1>Новый элемент</h1> <br />
<form action = "" method = "POST">
	<label>
		Название*: <br />
		<input type = "text" name = "edit[title]" value = "<?=$model->title?>" />
		<?php if ($model->hasErrors("title")) { ?>
			<span><?=$model->getError("title")?></span> 
		<?php } ?>
	</label> 
	<br /><br />
	<input type = "submit" value = "Изменить" /> <br />
</form>