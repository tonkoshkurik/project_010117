<?php

//require_once 'core/includes.php';
require_once 'core/functions.php';
require_once 'libs/ssp.class.php';
//require_once 'libs/DataTables/DataTables.php';
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
require_once 'core/App.php';
require_once 'core/component.php';
require_once 'libs/PHPMailer/PHPMailerAutoload.php';
require_once 'components/AuthComponent.php';
require_once 'components/DbComponent.php';


DbComponent::register('db');
AuthComponent::register('auth');

$app = App::getInstance();
$app->run();

//Route::start();