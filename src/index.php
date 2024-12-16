<?php

include_once "environment.php";
include_once "vendor/autoload.php";

use App\Router\Router;



$router = new Router();


//Rutas de páginas estáticas
$router->addRoute('get','/',function(){
    include_once DIRECTORIO_VISTAS."informacion.php";
});

$router->addRoute('post','/estudiante',function(){
    $estudiante = new \App\Class\Estudiante();
    $estudiante->setNIA($_POST['nia']);
    $estudiante->setNombre($_POST['nombre']);
    $estudiante->setCorreo($_POST['correo']);

    $estudiante->save();
});

$router->addRoute('get','/api/estudiante/{id}',function(){
    $estudiante = new Estudiante();
    $estudiante->setNIA('12345678');
    $estudiante->setNombre('Carlos');
    $estudiante->setCorreo('mail@mail.com');
    echo json_encode($estudiante);

});


$router->addRoute('delete','/expediente/{id}',[\App\Model\ExpedienteModelo::class,'destroy']);
$router->addRoute('get','/expediente/{id}',[\App\Model\ExpedienteModelo::class,'show']);

//Rutas enlazadas a controladores, lógica de la aplicación
//Usuarios
//$router->addRoute('get','/users',[\App\Controller\UsuarioController::class,'index']);


//Usuario API
//$router->addRoute('post','/api/users/{id}',[\App\Controller\UsuarioController::class,'store']);

$router->resolver($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI']);

