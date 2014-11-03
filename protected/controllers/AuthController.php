<?php
class AuthController extends Controller {

	public function actions() {
		return array(
			'captcha' => array(
				'class' => 'CCaptchaAction',
				'maxLength' => 4,
				'minLength' => 4,
			),
		);
	}

	/*
		Регистрация пользователя
	*/
	public function actionSignUp () {

		// Подключаем модель User
		$model = new User('registration');

		// Проверяем наличие данных с формы
		if (isset($_POST['registration'])) {

			// Загружаем данные из формы в модель
			$model->attributes = $_POST['registration'];

			// Проверяка на занятость email в базе данных
			if (User::model()->count("email = :email", array(':email' => $model->email))) {
				$model->addError('email', 'На данный email уже проводилась регистрация');

			} else {

				// Проверка формы
				if ($model->validate()) {

					// Создаем пользователя
					if ($model->save()) {
						$this->redirect(
						$this->createUrl("auth/signIn", array('message' => 'error_create'))
					);
					}
				}
			}
		}

		$this->render("signup", array(
				'model' => $model
			));
	}

	/*
		Вход пользователя
	*/
	public function actionSignIn () {
		// Подключаем модель
		$model = new User('login');

		// Проверяем наличие данных
		if (isset($_POST['enter'])) {

			// Загружаем данные из формы в модель
			$model->attributes = $_POST['enter'];

			if ($model->validate()) {
				// Валидация формы авторизации прошла успешно
				$this->redirect($this->createUrl("main/index", array(
						'message' => 'enter_success' 
					)));
			}
		}

		$this->render("signin", array(
				'model' => $model
			));
	}

	/*
		Выход пользователя
	*/
	public function actionSignOut () {
		Yii::app()->user->logout();
		$this->redirect(
				$this->createUrl("main/index", array(''))
			);
	}
}