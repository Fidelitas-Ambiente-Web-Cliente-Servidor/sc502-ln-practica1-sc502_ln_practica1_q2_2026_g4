<?php

declare(strict_types=1);
$controllerSolicitado = strtolower(
    trim($_GET['controller'] ?? 'index')
);

$actionSolicitada = strtolower(
    trim($_GET['action'] ?? 'index')
);
$rutas = [
    'index' => [
        'archivo' => __DIR__ . '/controllers/IndexController.php',
        'clase' => 'IndexController',
        'acciones' => ['index']
    ],
    'cursos' => [
        'archivo' => __DIR__ . '/controllers/CursosController.php',
        'clase' => 'CursosController',
        'acciones' => ['index', 'edit', 'update', 'delete']
    ],
    'profesores' => [
        'archivo' => __DIR__ . '/controllers/ProfesoresController.php',
        'clase' => 'ProfesoresController',
        'acciones' => ['index', 'show']
    ],
    'contacto' => [
        'archivo' => __DIR__ . '/controllers/ContactoController.php',
        'clase' => 'ContactoController',
        'acciones' => ['index', 'store']
    ]
];

if (!isset($rutas[$controllerSolicitado])) {
    http_response_code(404);
    exit('Controlador no encontrado.');
}

$ruta = $rutas[$controllerSolicitado];

if (!in_array($actionSolicitada, $ruta['acciones'], true)) {
    http_response_code(404);
    exit('Acción no encontrada.');
}

if (!file_exists($ruta['archivo'])) {
    http_response_code(503);
    exit(
        'El módulo solicitado todavía no ha sido implementado.'
    );
}

require_once $ruta['archivo'];

$nombreClase = $ruta['clase'];

if (!class_exists($nombreClase)) {
    http_response_code(500);
    exit('La clase del controlador no existe.');
}

$controller = new $nombreClase();

if (!method_exists($controller, $actionSolicitada)) {
    http_response_code(404);
    exit('La acción solicitada no existe en el controlador.');
}

$metodo = new ReflectionMethod(
    $controller,
    $actionSolicitada
);

if ($metodo->getNumberOfRequiredParameters() > 0) {
    $id = filter_input(
        INPUT_GET,
        'id',
        FILTER_VALIDATE_INT
    );
    if ($id === false || $id === null || $id < 1) {
        http_response_code(400);
        exit('Identificador inválido.');
    }
    $controller->{$actionSolicitada}($id);
} else {
    $controller->{$actionSolicitada}();
}