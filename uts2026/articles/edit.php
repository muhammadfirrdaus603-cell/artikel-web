<?php
// --- Koneksi Database menggunakan ORM ---
require_once(__DIR__ . '/../orm/config.php');
require_once(__DIR__ . '/../orm/ArticlesORM.php');

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<script>alert('ID tidak ditemukan!'); window.location='?page=articles/index';</script>";
    exit;
}

// --- 1. AMBIL DATA DARI DATABASE UNTUK MENGISI FORM ---
$artikel = ArticlesORM::find_one($id);

if (!$artikel) {
    echo "<script>alert('Data artikel tidak ditemukan!'); window.location='?page=articles/index';</script>";
    exit;
}

// --- 2. LOGIKA PROSES UPDATE (SAAT TOMBOL DIKLIK) ---
if (isset($_POST['update'])) {
    try {
        // Update field
        $artikel->judul = $_POST['judul'];
        $artikel->isi = $_POST['isi'];
        $artikel->author_id = (int)$_POST['author_id'];
        $artikel->category_id = (int)$_POST['category_id'];
        
        // Simpan ke database
        if ($artikel->save()) {
            echo "<script>alert('Berhasil update artikel!'); window.location='?page=articles/index';</script>";
            exit;
        } else {
            echo "<script>alert('Gagal update artikel. Silakan coba lagi.');</script>";
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
                                            <h5 class="m-b-10">Edit Artikel</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="?page=articles/index">Modul Artikel</a></li>
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
                                        <h5>Form Edit Data (ID: <?php echo htmlspecialchars($id); ?>)</h5>
                                    </div>
                                    <div class="card-body">
                                        <?php if ($artikel): ?>
                                            <form method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Judul Artikel</label>
                                                            <input type="text" name="judul" class="form-control" 
                                                                   value="<?php echo htmlspecialchars($artikel->judul ?? ''); ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Author ID</label>
                                                            <input type="number" name="author_id" class="form-control" 
                                                                   value="<?php echo htmlspecialchars($artikel->author_id ?? ''); ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Category ID</label>
                                                            <input type="number" name="category_id" class="form-control" 
                                                                   value="<?php echo htmlspecialchars($artikel->category_id ?? ''); ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Konten / Isi</label>
                                                            <textarea name="isi" class="form-control" rows="6" required><?php echo htmlspecialchars($artikel->isi ?? ''); ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <button type="submit" name="update" class="btn btn-warning">
                                                        <i class="feather icon-save"></i> Simpan Perubahan
                                                    </button>
                                                    <a href="?page=articles/index" class="btn btn-light">Batal</a>
                                                </div>
                                            </form>
                                        <?php else: ?>
                                            <div class="alert alert-danger">
                                                <i class="feather icon-alert-triangle"></i> 
                                                Data tidak ditemukan di API atau server offline. Cek apakah ID <strong><?php echo htmlspecialchars($id); ?></strong> tersedia di database.
                                            </div>
                                            <a href="?page=articles/index" class="btn btn-primary">Kembali ke Daftar</a>
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