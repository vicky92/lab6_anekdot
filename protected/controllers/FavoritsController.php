<?php
class FavoritsController extends Controller {
	
	/*
	* Добавление нового элемента
	*/
	public function actionAdd ($user_id, $anekdot_id) {
		$model = new FavoritAnekdots;

		
		$model->user_id = $_GET['user_id'];
		$model->anekdot_id = $_GET['anekdot_id'];

			
		if ($model->save()){
			$this->redirect(
			$this->createUrl("anekdots/view", array('message' => 'success_create')));
		}
			
		
		//$this->render('add', array('model' => $model));
	}

	/*
	* Удаление элемента
	*/
	public function actionRemove ($id) {
		$model = FavoritAnekdots::model()->findByPK($id);

		if ($model->delete()) {
			$this->redirect(
			$this->createUrl("favorits/view", array('message' => 'access_delete')));
		} else {
			$this->redirect(
			$this->createUrl("favorits/view", array('message' => 'error_delete')));
		}
	}

	/*
	* Просмотр элемента
	*/
	public function actionView () {
	
		$criteria = new CDbCriteria();
		$criteria->condition = "user_id=:uid";
		$criteria->params = array(
			':uid' => Yii::app()->user->id
		);
	
		$anekdots = FavoritAnekdots::model()->with('anekdot.label_relations.label')->findAll( $criteria );
		
		$this->render('view', array('model' => $anekdots));
	}

	/*
	* Редактирование элемента
	*/
	public function actionEdit ($id) {
		
		$this->render('edit', array('model' => $model));
	}
	
   
}