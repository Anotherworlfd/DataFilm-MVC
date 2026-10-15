<?php
session_start();

require __DIR__ . '/../config/database.php';
require __DIR__ . '/../app/models/Film.php';
require __DIR__ . '/../app/controllers/FilmController.php';

try {
    $db = (new Database())->connect();
} catch (PDOException $e) {
    http_response_code(500);
    exit('Koneksi database gagal. Periksa MySQL dan config/database.php.');
}

$controller = new FilmController(new Film($db));

$page   = $_GET['page'] ?? 'film';
$action = $_GET['action'] ?? 'index';

if ($page !== 'film') {
    http_response_code(404);
    exit('Halaman tidak ditemukan.');
}

$hanyaPost = ['store', 'update', 'delete'];
if (in_array($action, $hanyaPost, true) && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Metode request tidak diizinkan.');
}

match ($action) {
    'index'  => $controller->index(),
    'create' => $controller->create(),
    'store'  => $controller->store(),
    'edit'   => $controller->edit(),
    'update' => $controller->update(),
    'delete' => $controller->delete(),
    default  => exit('Action tidak ditemukan.')
};