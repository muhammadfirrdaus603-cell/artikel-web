<?php
require_once(__DIR__ . '/../orm/config.php');
require_once(__DIR__ . '/../orm/CategoriesORM.php');

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<script>alert('ID tidak ditemukan!'); window.location='?page=categories/index';</script>";
    exit;
}

$category = CategoriesORM::find_one($id);

if (!$category) {
    echo "<script>alert('Data category tidak ditemukan!'); window.location='?page=categories/index';</script>";
    exit;
}

if (isset($_POST['update'])) {
    try {
        $category->nama_kategori = $_POST['nama_kategori'];
        
        if ($author->save()) {
            echo "<script>alert('Berhasil update author!'); window.location='?page=authors/index';</script>";
            exit;
        } else {
            echo "<script>alert('Gagal update author. Silakan coba lagi.');</script>";
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
                                            <h5 class="m-b-10">Edit Category</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="?page=categories/index">Modul Category</a></li>
                                            <li class="breadcrumb-item"><a href="#!">Edit</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Form Edit Data Category (ID: <?php echo htmlspecialchars($id); ?>)</h5>
                                    </div>
                                    <div class="card-body">
                                        <?php if ($category): ?>
                                            <form method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Nama Category</label>
                                                            <input type="text" name="nama_kategori" class="form-control" 
                                                                   value="<?php echo htmlspecialchars($category->nama_kategori ?? ''); ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <button type="submit" name="update" class="btn btn-warning">
                                                        <i class="feather icon-save"></i> Simpan Perubahan
                                                    </button>
                                                    <a href="?page=categories/index" class="btn btn-light">Batal</a>
                                                </div>
                                            </form>
                                        <?php else: ?>
                                            <div class="alert alert-danger">
                                                <i class="feather icon-alert-triangle"></i> 
                                                Data category tidak ditemukan. Cek apakah ID <strong><?php echo htmlspecialchars($id); ?></strong> tersedia di database.
                                            </div>
                                            <a href="?page=categories/index" class="btn btn-primary">Kembali ke Daftar</a>
                                        <?php endif; ?>
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