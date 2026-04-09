<?php
require_once(__DIR__ . '/../orm/config.php');
require_once(__DIR__ . '/../orm/CategoriesORM.php');

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href='?page=categories/index';</script>";
    exit;
}

$category = CategoriesORM::find_one($id);

if ($category) {
    $category->delete();
    echo "<script>alert('Category berhasil dihapus'); window.location.href='?page=categories/index';</script>";
} else {
    echo "<script>alert('Category tidak ditemukan'); window.location.href='?page=categories/index';</script>";
}
?>