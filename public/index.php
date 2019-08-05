<?php

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\DI\FactoryDefault;
use Phalcon\Session\Adapter\Files as Session;

try
{
	//Register autoLoader for Analytics
	$loader = new Loader();
	$loader->registerDirs(array(
		'../app/controllers/',
		'../app/models/'
	))->register();

	//Create Run DI
	$di = new FactoryDefault();

	// Setup the view component for Analytics
	$di->set('view', function () {
		$view = new View();
		$view->setViewsDir('../app/views/');
		return $view;
	});

	// starts a new session
	$di->setShared('session', function () {
		$session = new Session();
		$session->start();
		return $session;
	});

	$di->set('db', function() {
		return new \Phalcon\Db\Adapter\Pdo\Mysql([
			"host" => "localhost",
			"username" => "root",
			"password" => "",
			"dbname" => "surtable"
		]);
	});

	// Handle the request
	$application = new Application($di);
	echo $application->handle()->getContent();
}
catch(Exception $e)
{
	die("We encounter an error " . $e->getMessage());
}
