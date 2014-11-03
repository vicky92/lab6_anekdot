<?php 
return array(
	'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR."..",
	'name' => 'Dialog',
	'import' => array (
		'application.models.*',
		'application.components.*'
	),
	'defaultController'=>'Main',
 	'components' => array (
        'db' => array(
            'enableProfiling' => true,
            'enableParamLogging' => true,

            'connectionString' => 'mysql:host=openserver;dbname=anekdot',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'writery255',
			'charset' => 'utf8',
			'tablePrefix' => ''
        ),
	    'urlManager' => array (
	        'urlFormat' => 'path',
	        'showScriptName' => false,
	        'rules' => array(
	            
	        ),
	    ),
	    'user'=>array(
	    	'class' => 'WebUser',
            'allowAutoLogin'=>true,
        ),
        'authManager' => array(
			// Будем использовать свой менеджер авторизации
			'class' => 'PhpAuthManager',
			// Роль по умолчанию. Все, кто не админы, модераторы и юзеры — гости.
			'defaultRoles' => array('guest'),
		),
    ),
);