<?php
class LabelsController extends Controller {
	/*
	* Добавление нового элемента
	*/
	public function actionAdd () {
		$model = new Labels;

		if (isset ($_POST['add'])) {
			$model->attributes = $_POST['add'];

			if ($model->validate()) {
				if ($model->save()) {
					$this->redirect(
					$this->createUrl("labels/view", array('message' => 'error_create')));
				}
			}
		}
		$this->render('add', array('model' => $model));
	}

	/*
	* Удаление элемента
	*/
	public function actionRemove ($id) {
		if (!Yii::app()->user->checkAccess('admin')) {
			die('permission denied');
		}
		$model = Labels::model()->findByPK($id);

		if ($model->delete()) {
            // Заметаем следы за меткой
            // Задаем критерии поиска связей удаляемой метки с анекдотами
            
            $criteria = new CDbCriteria();
            
            $criteria->condition = "label_id = :id";
            $criteria->params = array(
                ":id" => $id
            );
            
            LabelRelations::model()->deleteAll( $criteria );
            
			$this->redirect(
                $this->createUrl("labels/view")
            );
		} else {
			print 'Не удалось удалить элемент.';
		}
	}

	/*
	* Просмотр элемента
	*/
	public function actionView () {
		$model = Labels::model()->findAll();

		$this->render('view', array('model' => $model));
	}
	
	/*
	* Редактирование элемента
	*/
	public function actionEdit ($id) {
		$model = Labels::model()->findByPK($id);
		
		if (isset ($_POST['edit'])) {
			$model->attributes = $_POST['edit'];

			if ($model->validate()) {
				if ($model->save()) {
					$this->redirect(
					$this->createUrl("labels/view", array('message' => 'access_edit')));
				};
			}
		}
		$this->render('edit', array('model' => $model));
	}

}