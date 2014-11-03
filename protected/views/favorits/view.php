<h1>Список</h1> <br />

<?php 
foreach($model as $item) { 
	print $item->anekdot_id.'<br />'; 
	print $item->anekdot->text.'<br />';
?>
	<font color = "grey"><small>Метки: </small></font>
		<?php
			$relations = (array) $item->anekdot->label_relations;
			foreach($relations as $relation) {
				?>
					<font color = "grey"><small><?=$relation->label->title?>,</small></font>
				<?php 
			} 
		?>
		<br />
		<br /><a href = "<?=$this->createUrl('favorits/remove', array('id' => $item->id))?>">Убрать из избранного</a> <br />
		
	
	


<? } ?>


