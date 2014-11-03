<?php
class Labels extends CActiveRecord {
	public $title = null;

	public static function model ($className=__CLASS__) {
		return parent::model ($className);
	}

	public function tableName () { return 'labels'; }

	public function primaryKey () { return 'id'; }

	public function rules () {
		return array(
			array ('title', 'required'), 
			array ('title', 'length', 'min' => 3, 'max' => 25, ),
		);
	}
    
    public static function getAll() {
        return Labels::model()->findAll();
    }

	public function attributeLabels () {
		return array(
			array ('title', 'Название'),
		);
	}

    public function relations(){
        return array(
            'relations' => array( self::HAS_MANY, 'LabelRelations', 'label_id' ),
            'anekdotsCount'=>array( self::STAT, 'LabelRelations', 'label_id' ),
        );
    }
}