<?php
require_once(__DIR__ . '/../orm/config.php');
require_once(__DIR__ . '/../orm/AuthorsORM.php');

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href='?page=authors/index';</script>";
    exit;
}

$author = AuthorsORM::find_one($id);

if ($author) {
    $author->delete();
    echo "<script>alert('Author berhasil dihapus'); window.location.href='?page=authors/index';</script>";
} else {
    echo "<script>alert('Author tidak ditemukan'); window.location.href='?page=authors/index';</script>";
}
?>