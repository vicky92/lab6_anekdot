<h1>Новый элемент</h1> <br />
<form action = "" method = "POST">
	<label>
		Текст анекдота*: <br />
		<textarea rows="10" cols="45" name="add[text]"><?=$model->text?></textarea>
		<?php if ($model->hasErrors("text")) { ?> <br />
			<span><?=$model->getError("text")?></span> 
		<?php } ?>
	</label> 
	<br /><br />
	Метки: <br />
	<?php
        $labels = Labels::getAll();
        foreach ($labels as $label) {
            ?>
                <label>
                    <input type = "checkbox" name = "add[labels][]" value = "<?=$label->id?>" />
                    <?=$label->title?>
                </label> <br />
            <?php
        }
    ?>
	<br />
	<input type = "submit" value = "Добавить" /> <br />
</form>