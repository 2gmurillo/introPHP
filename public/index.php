<?php
ini_set('display_errors', 1);
ini_set('display_starup_errors', 1);
error_reporting(E_ALL);

require_once('../vendor/autoload.php');

session_start();

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'intro_db',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();
$map->get('index', '/introPHP/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction'
]);
$map->get('addJob', '/introPHP/job/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction',
    'auth' => true
]);
$map->get('addProject', '/introPHP/project/add', [
    'controller' => 'App\Controllers\ProjectsController',
    'action' => 'getAddProjectAction',
    'auth' => true
]);
$map->get('addUser', '/introPHP/user/add', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'getAddUserAction'
]);
$map->get('loginForm', '/introPHP/login', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLoginAction'
]);
$map->get('admin', '/introPHP/admin', [
    'controller' => 'App\Controllers\AdminController',
    'action' => 'getAdminAction',
    'auth' => true
]);
$map->get('logout', '/introPHP/logout', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogoutAction'
]);
$map->post('saveJob', '/introPHP/job/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);
$map->post('saveProject', '/introPHP/project/add', [
    'controller' => 'App\Controllers\ProjectsController',
    'action' => 'getAddProjectAction'
]);
$map->post('saveUser', '/introPHP/user/add', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'getAddUserAction'
]);
$map->post('auth', '/introPHP/auth', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'postLoginAction'
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
    echo "Esta ruta no coincide";
} else {
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];
    $needsAuth = $handlerData['auth'] ?? false;
    $sessionUserId = $_SESSION['userId'] ?? null;
    $isAdmin = $_SESSION['isAdmin'] ?? null;
    if ($needsAuth && !$sessionUserId) {
        header('Location: /introPHP/login');
    } else {
        $controller = new $controllerName;
        $response = $controller->$actionName($request);
        foreach ($response->getHeaders() as $name => $values) {
            foreach ($values as $value) {
                header(sprintf('%s: %s', $name, $value), false);
            }
        }
        http_response_code($response->getStatusCode());
        if (!$isAdmin && ($actionName == 'getAdminAction' || $actionName == 'getAddJobAction' || $actionName == 'getAddProjectAction')) {
            header('Location: /introPHP/');
        } else {
            echo $response->getBody();
        }
    }
}
