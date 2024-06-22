<?php
require 'middleware/Router.php';
require 'controllers/MembersController.php';
require 'controllers/ProductsController.php';
require 'controllers/SalesController.php';
require 'config/Database.php';

$router = new Router();

$router->register('GET', '/api/members', function() {
    $db = new Database();
    $conn = $db->getConnection();
    $controller = new MembersController($conn);
    return $controller->readMembers();
});

$router->register('POST', '/api/members', function() {
    $db = new Database();
    $conn = $db->getConnection();
    $controller = new MembersController($conn);
    return $controller->addMembers();
});

$router->register('PUT', '/api/members', function() {
    $db = new Database();
    $conn = $db->getConnection();
    $controller = new MembersController($conn);
    return $controller->updateMembers(); // Nama metode yang benar
});

$router->register('DELETE', '/api/members', function() {
    $db = new Database();
    $conn = $db->getConnection();
    $controller = new MembersController($conn);
    return $controller->deleteMembers(); // Nama metode yang benar
});

$router->register('GET', '/api/products', function() {
    $db = new Database();
    $conn = $db->getConnection();
    $controller = new ProductsController($conn);
    return $controller->readProducts();
});

$router->register('POST', '/api/products', function() {
    $db = new Database();
    $conn = $db->getConnection();
    $controller = new ProductsController($conn);
    return $controller->addProducts();
});

$router->register('PUT', '/api/products', function() {
    $db = new Database();
    $conn = $db->getConnection();
    $controller = new ProductsController($conn);
    return $controller->updateProducts(); // Nama metode yang benar
});

$router->register('DELETE', '/api/products', function() {
    $db = new Database();
    $conn = $db->getConnection();
    $controller = new ProductsController($conn);
    return $controller->deleteProducts(); // Nama metode yang benar
});

$router->register('GET', '/api/sales', function() {
    $db = new Database();
    $conn = $db->getConnection();
    $controller = new SalesController($conn);
    return $controller->readSales();
});

$router->register('POST', '/api/sales', function() {
    $db = new Database();
    $conn = $db->getConnection();
    $controller = new SalesController($conn);
    return $controller->addSales();
});

$router->register('DELETE', '/api/sales', function() {
    $db = new Database();
    $conn = $db->getConnection();
    $controller = new SalesController($conn);
    return $controller->deleteSales(); // Nama metode yang benar
});

// Dispatch the request
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
?>
