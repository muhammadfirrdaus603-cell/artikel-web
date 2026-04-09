<?php
require_once(__DIR__ . '/../orm/config.php');
require_once(__DIR__ . '/../orm/AuthorsORM.php');

if (isset($_POST['simpan'])) {
    try {
        $author = AuthorsORM::create();
        $author->nama = $_POST['nama'];
        
        if ($author->save()) {
            echo "<script>alert('Berhasil menambah author!'); window.location.href='?page=authors/index';</script>";
        } else {
            echo "<script>alert('Gagal menambah author. Silakan coba lagi.');</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Error: " . addslashes($e->getMessage()) . "');</script>";
    }
}
?>

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Tambah Author</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="?page=authors/index">Modul Author</a></li>
                                            <li class="breadcrumb-item"><a href="#!">Tambah Baru</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Form Entri Data Author</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label">Nama Author</label>
                                                        <input type="text" class="form-control" name="nama" placeholder="Contoh: John Doe" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" name="simpan" class="btn btn-primary">
                                                    <i class="feather icon-plus-circle"></i> Simpan Author
                                                </button>
                                                <a href="?page=authors/index" class="btn btn-light">Batal</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>