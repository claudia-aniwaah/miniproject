<?php
require_once 'Libraries/ReadEnv.php';
(new ReadEnv(dirname(__DIR__) . '/.env'))->load();
//echo dirname(__DIR__) . '/.env';
require_once 'Helpers/Validation.php';
require_once 'Libraries/BluePrint.php';
require_once 'Libraries/Core.php';
require_once 'Libraries/Controller.php';
require_once 'Libraries/Database.php';
require_once 'Libraries/Table.php';
require_once 'config/config.php';

$table = new Table();
$init = new Core();