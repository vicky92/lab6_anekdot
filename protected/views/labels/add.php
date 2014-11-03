<h1>Новый элемент</h1> <br />
<form action = "<?=$this->createUrl("labels/add")?>" method = "POST">
	<label>
		Название*: <br />
		<input type = "text" name = "add[title]" value = "<?=$model->title?>" />
		<?php if ($model->hasErrors("title")) { ?> <br />
			<span><?=$model->getError("title")?></span> 
		<?php } ?>
	</label> 
	<br /><br />
	<input type = "submit" value = "Добавить" /> <br />
</form>