<h1>Новый элемент</h1> <br />
<form action = "" method = "POST">
	<label>
		Текст анекдота*: <br />
		<textarea rows="10" cols="45" name="edit[text]"><?=$model->text?></textarea>
		<?php if ($model->hasErrors("text")) { ?>
			<span><?=$model->getError("text")?></span> 
		<?php } ?>
	</label> 
	<br /><br />
	Метки: <br />
	<?php
        $anekdot_labels = array();
        foreach ($model->label_relations as $relation) {
            $anekdot_labels[] = $relation->label_id;
        }

        $labels = Labels::getAll();
        foreach ($labels as $label) {
            ?>
                <label>
                    <input 
                        type = "checkbox" 
                        name = "edit[labels][]" 
                        value = "<?=$label->id?>" 
                        <?=(in_array($label->id, $anekdot_labels))?"checked":""?>
                    />
                    <?=$label->title?>
                </label> <br />
            <?php
        }
    ?>
	<br />
	<br /><br />
	<input type = "submit" value = "Изменить" /> <br />
</form>