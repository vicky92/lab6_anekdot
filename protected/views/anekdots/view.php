<h1>Анекдоты</h1>

<table style = "width: 100%;" border = "1">
    <thead>
        <tr>
            <td style = "width: 70%;">Анекдот</td>
            <?php if (Yii::app()->user->checkAccess('admin')) { ?>
                <td>Действие</td>
            <?php } ?>
        </tr>
    </thead>
<?php foreach($model as $item) { ?>
    <tr>
        <td style = "padding: 0px 20px 30px 0px;">
            <?=$item->text?> <br />
            <font color = "grey"><small>Метки: </small></font>
            <?php
                $relations = (array) $item->label_relations;
                foreach($relations as $relation) {
                    ?>
                        <small><a href = "<?=$this->createUrl("anekdots/view", array("label" => $relation->label_id))?>"><?=$relation->label->title?></a>,</small>
            <?php  }  ?> 
            <br /><br />
            
            <?php
                $criteria = new CDbCriteria();

                $criteria->condition = "anekdot_id = :aid and user_id = :uid";
                $criteria->params = array(
                    ":aid" => $item->id,
                    ":uid" => Yii::app()->user->id
                );

                if (FavoritAnekdots::model()->exists( $criteria )) {
                    ?><font color = "green"><small>В избранном</small></font><br /><?php
                } else {
                     if (!Yii::app()->user->isGuest) { ?>
                        <a href = "<?=$this->createUrl('favorits/add', array('anekdot_id' => $item->id, 'user_id' =>  Yii::app()->user->id))?>">Добавить в избранное</a> <br />
                    <?php }
                }
            ?>
        </td>
        <?php if (Yii::app()->user->checkAccess('admin')) { ?>
            <td style = "vertical-align: top;">
                <a href = "<?=$this->createUrl('anekdots/remove', array('id' => $item->id))?>">Удалить</a>
                <a href = "<?=$this->createUrl('anekdots/edit', array('id' => $item->id))?>">Редактировать</a>
            </td>
        <?php } ?>
    </tr>
<? } ?>
</table>
<?php if (Yii::app()->user->checkAccess('admin')) { ?>
<a href = "<?=$this->createUrl('anekdots/add')?>">Добавить анекдот</a> <br />  <br /> 
<?php } ?>
