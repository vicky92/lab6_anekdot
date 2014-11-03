<?php
	class User extends CActiveRecord {
		public $email = null;
		public $password = null;
		public $compare_password = null;
		public $verifyCode = null;
		public $is_deleted = 0;
		public $rule = 'guest';

		// Переменные профиля

		var $lastname, $firstname, $sex;

	    public static function model ($className=__CLASS__) {
	        return parent::model ($className);
	    }
	// Указываем имя таблицы
	public function tableName () { return 'users'; }

	// Указываем наименование поля (первичного ключа)
	public function primaryKey() { return 'id'; }
		
	/*
	Правила валидации
	*/
	public function rules () {
	    	return array(
	    		array('email', 'email', 'on' => 'registration, login'),
	    		array('email, password', 'required', 'on' => 'registration, login'),
	    		array('compare_password', 'required', 'on' => 'registration'),
			array('password', 'length', 'max' => '35', 'min' => '6', 'on' => 'registration'),
	    		array('password', 'compare', 'compareAttribute' => 'compare_password', 'on' => 'registration'),
	    		array('password', 'authenticate', 'on' => 'login'),
			array('verifyCode', 'captcha', 'on' => 'registration'),
	    	);
	}

	    public function authenticate ($attribute, $params) {
	    	if (!$this->hasErrors()) {
	           
	    		$identity = new UserIdentity ($this->email, $this->password);
	    		$identity->authenticate();

	    		if ($identity->errorCode === UserIdentity::ERROR_NONE)  {
	    			// Если авторизация прошла успешно
	           		Yii::app()->user->login($identity, 3600*24*7);
	    		} else if ($identity->errorCode === UserIdentity::ERROR_USERNAME_INVALID) {
	    			$this->addError('email', 'Пользователь c таким email не зарегестрирован в системе');
	    		} else if ($identity->errorCode === UserIdentity::ERROR_PASSWORD_INVALID) {
	    			$this->addError('password', 'Вы указали неверный пароль');
	    		}
	        }
	    }
	}
?>