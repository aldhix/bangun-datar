<?php

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

use App\Controllers\BangunDatarController;

$controller = new BangunDatarController();
$action = $_REQUEST['action'] ?? 'index';

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store($_POST);
        break;
    case 'edit':
        $controller->edit((int) ($_GET['id'] ?? 0));
        break;
    case 'update':
        $controller->update((int) ($_POST['id'] ?? 0), $_POST);
        break;
    case 'delete':
        $controller->delete((int) ($_GET['id'] ?? 0));
        break;
    default:
        $controller->index();
}
