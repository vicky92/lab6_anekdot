<?php
class FavoritAnekdots extends CActiveRecord {
	public $user_id = null;
	public $anekdot_id = null;

	public static function model ($className=__CLASS__) {
		return parent::model ($className);
	}

	public function tableName () { return 'favorit_anekdots'; }

	public function primaryKey () { return 'id'; }

	

	public function attributeLabels () {
		return array(
			array ('user_id', 'user_id'),
			array ('anekdot_id', 'anekdot_id'),
		);
	}
	
	public function relations () {
		return array(
			'anekdot' => array(self::BELONGS_TO, "Anekdots", "anekdot_id")
		);
	}

}
