<?php
require_once(__DIR__ . '/../orm/config.php');
require_once(__DIR__ . '/../orm/ArticlesORM.php');

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href='?page=articles/index';</script>";
    exit;
}

$artikel = ArticlesORM::find_one($id);

if ($artikel) {
    $artikel->delete();
    echo "<script>alert('Artikel berhasil dihapus'); window.location.href='?page=articles/index';</script>";
} else {
    echo "<script>alert('Artikel tidak ditemukan'); window.location.href='?page=articles/index';</script>";
}
?>