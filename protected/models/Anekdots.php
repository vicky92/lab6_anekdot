<?php
class Anekdots extends CActiveRecord {
	public $text = null;
    
	public static function model ($className=__CLASS__) {
		return parent::model ($className);
	}

	public function tableName () { return 'anekdots'; }

	public function primaryKey () { return 'id'; }

	public function rules () {
		return array(
			array ('text', 'required'), 
			array ('text', 'length', 'min' => 3, 'max' => 1000, ),
		);
	}

	public function attributeLabels () {
		return array(
			array ('text', 'Текст анекдота'),
		);
	}
    
    public function relations () {
        return array(
            'label_relations' => array(self::HAS_MANY, 'labelRelations', 'anekdot_id'),
	    
        );
    }
}