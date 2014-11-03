<?php
class AnekdotsController extends Controller {
	
	/*
	* Добавление нового элемента
	*/
	public function actionAdd () {
		$model = new Anekdots;

		if (isset ($_POST['add'])) {
			$model->attributes = $_POST['add'];

			if ($model->validate()) {
			if ($model->save()){
                $labels = $_POST['add']['labels'];
                
                $relations = new LabelRelations();
                
                $relations->anekdot_id = $model->id;
                
                foreach ($labels as $label_id) {
                    $relations->addRelation( $label_id );
                }
                
                $this->redirect(
                    $this->createUrl("anekdots/view", array('message' => 'success_create')));
                }
			}
		}
		$this->render('add', array('model' => $model));
	}

	/*
	* Удаление элемента
	*/
	public function actionRemove ($id) {
		$model = Anekdots::model()->findByPK($id);
		
		if ($model->delete()) {
            
            // Задаем критерии поиска для всех связей с анекдотом
            $criteria = new CDbCriteria();
            
            $criteria->condition = "anekdot_id = :aid";
            $criteria->params = array(
                ":aid" => $id  
            );
            
            // Заметаем следы за удаляемым анекдотом
            // Удаляем связи с метками
            LabelRelations::model()->deleteAll( $criteria );
            
            // Удаляем связи из избранного
            FavoritAnekdots::model()->deleteAll( $criteria );
            
			$this->redirect(
			     $this->createUrl("anekdots/view", array('message' => 'access_delete'))
            );
		} else {
			$this->redirect(
			     $this->createUrl("anekdots/view", array('message' => 'error_delete'))
            );
		}
	}

	/*
	* Просмотр элемента
	*/
	public function actionView ( $label = 0 ) {
        $anekdots = array();
        
        if ($label < 1) {
            $anekdots = Anekdots::model()->with('label_relations.label')->findAll();
        } else {
            $model = Labels::model()->with('relations.anekdot.label_relations.label')->findByPK( $label );
            $relations = $model->relations;
            
            foreach ($relations as $relation) {
                $anekdots[] = $relation->anekdot;
            }
            
            //var_dump($anekdots[0]->label_relations[0]->label->title);
            //die();
        }
		
        
		$this->render('view', array('model' => $anekdots));
	}

	/*
	* Редактирование элемента
	*/
	public function actionEdit ($id) {
		$model = Anekdots::model()->findByPK($id);
		
		if (isset ($_POST['edit'])) {
			$model->attributes = $_POST['edit'];

			if ($model->validate()) {
				if ($model->save()) {
				$labels = $_POST['edit']['labels'];
                
				$relations = new LabelRelations();
                
				$relations->anekdot_id = $model->id;
                
				foreach ($labels as $label_id) {
					$relations->addRelation( $label_id );
				}
					$this->redirect(
					$this->createUrl("anekdots/view", array('message' => 'access_edit')));
				} else {
					$this->redirect(
					$this->createUrl("anekdots/view", array('message' => 'error_edit')));
		}
			}
		}
		$this->render('edit', array('model' => $model));
	}
}