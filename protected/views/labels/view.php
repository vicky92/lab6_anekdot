<h1>Список меток</h1>
<table style = "width: 100%;" border = "1">
    <thead>
        <tr>
            <td>Метка</td>
            <td>Количество анекдотов</td>
            <?php if (Yii::app()->user->checkAccess('admin')) { ?>	
                <td>Действие</td>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach($model as $item) { ?>
            <tr>
                <td><a href = "<?=$this->createUrl("anekdots/view", array("label" => $item->id))?>"><?=$item->title?></a></td>
                <td><?=$item->anekdotsCount?></td>
                <?php if (Yii::app()->user->checkAccess('admin')) { ?>	
                    <td>
                        <a href = "<?=$this->createUrl('labels/remove', array('id' => $item->id))?>">Удалить</a>
                        <a href = "<?=$this->createUrl('labels/edit', array('id' => $item->id))?>">Редактировать</a>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>


<a href = "<?=$this->createUrl('labels/add', array('id' => $item->id))?>">Добавить новую метку</a> <br />  <br /> 
