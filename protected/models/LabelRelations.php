<?php
class LabelRelations extends CActiveRecord {
	public $anekdot_id = 0;
    public $label_id = 0;
    
	public static function model ($className=__CLASS__) {
		return parent::model ($className);
	}

	public function tableName () { return 'label_relations'; }

	public function primaryKey () { return 'id'; }
    
    public function addRelation ($label_id) {
        $relation = new LabelRelations();
        
        $relation->anekdot_id = $this->anekdot_id;
        $relation->label_id = $label_id;
        
        return $relation->save();
    }
    
    public function relations () {
        return array(
            'label' => array(self::BELONGS_TO, 'Labels', 'label_id'),
            'anekdot' => array(self::BELONGS_TO, 'Anekdots', 'anekdot_id'),
        );
    }
}
