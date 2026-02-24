<?php

define('ROOT_PATH', dirname(__DIR__));

require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/app/controladores/LibroController.php';
require_once ROOT_PATH . '/app/controladores/VentaController.php';

$url = $_GET['url'] ?? '';

switch($url){

    case 'crear':
        (new LibroController())->crear();
        break;

    case 'vender':
        (new VentaController())->vender();
        break;

    case 'historial':
        (new VentaController())->historial();
        break;
    
    case 'eliminar':
        (new LibroController())->eliminar();
        break;
        
    default:
        (new LibroController())->index();
        break;
}
?>