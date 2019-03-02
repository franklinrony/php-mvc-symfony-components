<?php
/**
 * Creado por equipo de desarrollo RE.
 * Fecha: 17/02/2019
 * Hora: 09:21 PM
 * Editado por:
 * Fecha:
 * Editado por:
 * Fecha:
 */
require '/../'.'vendor/autoload.php';

use pdes\paquete_a\ArchivoA;
use pdes\paquete_b\ArchivoB;
use pdes\model\usuario;
use Bramus\Router\Router;
//Creear instancia del router
$router = new Router();

// Custom 404 Handler
$router->set404(function () {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo '404, route not found!';
});

// Static route: / (homepage)
$router->get('/', function () {
    echo 'Working fine';
});

$router->setNamespace('\pdes\controller');
$router->get('/registro/', 'UsuarioController@registro');

$router->run();

/*
$prueba= new ArchivoA();
$prueba->setName('Rony');
$pruebaB= new ArchivoB();
$pruebaB->setA('Cortez');

$usuario=new usuario();
$usuario->setDireccion('6 avenida norte 53');
echo $prueba->getName();
echo $pruebaB->getA();
echo $usuario->getDireccion();
echo __DIR__;*/
?>