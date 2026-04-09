<?php
/**
 * Logika Simpan Data Artikel via API
 */
if (isset($_POST['simpan'])) {
    // URL API Artikel (Gunakan endpoint index.php atau store.php sesuai konfigurasi API-mu)
    $url = "http://localhost/belajar_api/services/articles/index.php"; 
    
    // Data yang disusun menjadi array (akan di-convert ke JSON)
    $postData = [
        "judul"       => $_POST['judul'],
        "isi"         => $_POST['isi'],
        "author_id"   => (int)$_POST['author_id'],
        "category_id" => (int)$_POST['category_id']
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/json",
            'method'  => 'POST',
            'content' => json_encode($postData),
        ],
    ];

    $context = stream_context_create($options);
    $result = @file_get_contents($url, false, $context);

    if ($result) {
        echo "<script>alert('Berhasil menambah artikel!'); window.location.href='?page=articles/index';</script>";
    } else {
        echo "<script>alert('Gagal menambah artikel. Pastikan API berjalan.');</script>";
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
                                            <h5 class="m-b-10">Tambah Artikel</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="?page=articles/index">Modul Artikel</a></li>
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
                                        <h5>Form Entri Data (JSON Format)</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label">Judul Artikel</label>
                                                        <input type="text" class="form-control" name="judul" placeholder="Contoh: Belajar REST API" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label">Author ID</label>
                                                        <input type="number" class="form-control" name="author_id" placeholder="Contoh: 3" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label">Category ID</label>
                                                        <input type="number" class="form-control" name="category_id" placeholder="Contoh: 1" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label">Isi Artikel</label>
                                                        <textarea class="form-control" name="isi" rows="6" placeholder="Masukkan konten artikel..." required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" name="simpan" class="btn btn-primary">
                                                    <i class="feather icon-plus-circle"></i> Simpan ke API
                                                </button>
                                                <a href="?page=articles/index" class="btn btn-light">Batal</a>
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