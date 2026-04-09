<?php
$url = "http://localhost/belajar_api/services/articles/index.php";

$response = @file_get_contents($url);

// Inisialisasi
$listArtikel = [];

if ($response !== FALSE) {
    $data = json_decode($response);

    // Jika format: { data: [...] }
    if (isset($data->data) && is_array($data->data)) {
        $listArtikel = $data->data;

    // Jika format langsung array
    } elseif (is_array($data)) {
        $listArtikel = $data;
    }
}
?>

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">

                        <!-- HEADER -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Manajemen Artikel</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.php">
                                                    <i class="feather icon-home"></i>
                                                </a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="?page=articles">Modul Artikel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CONTENT -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">

                                    <!-- HEADER CARD -->
                                    <div class="card-header">
                                        <div style="display:flex; justify-content:space-between; align-items:center;">
                                            <h5>Data Artikel (Source: API)</h5>
                                            <a href="?page=articles/tambah" class="btn btn-primary btn-sm shadow-sm">
                                                <i class="feather icon-plus"></i> Tambah Artikel
                                            </a>
                                        </div>
                                    </div>

                                    <!-- BODY -->
                                    <div class="card-body table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-hover">

                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Judul Artikel/berita</th>
                                                        <th>Penulis</th>
                                                        <th>Kategori</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php if (count($listArtikel) > 0): ?>
                                                        <?php $no = 1; foreach ($listArtikel as $artikel): ?>
                                                            <tr>
                                                                <td><?php echo $no++; ?></td>

                                                                <!-- JUDUL -->
                                                                <td>
                                                                    <strong>
                                                                        <?php echo htmlspecialchars($artikel->judul ?? $artikel->title ?? '-'); ?>
                                                                    </strong>
                                                                </td>

                                                                <!-- PENULIS -->
                                                                <td>
                                                                    <?php 
                                                                    echo htmlspecialchars(
                                                                        $artikel->author_name 
                                                                        ?? $artikel->nama_author 
                                                                        ?? $artikel->author_id 
                                                                        ?? '-'
                                                                    ); 
                                                                    ?>
                                                                </td>

                                                                <!-- KATEGORI -->
                                                                <td>
                                                                    <span class="badge badge-light-primary">
                                                                        <?php 
                                                                        echo htmlspecialchars(
                                                                            $artikel->category_name 
                                                                            ?? $artikel->nama_kategori 
                                                                            ?? $artikel->category_id 
                                                                            ?? '-'
                                                                        ); 
                                                                        ?>
                                                                    </span>
                                                                </td>

                                                                <td class="text-center">

                                                                    <!-- LIHAT -->
                                                                    <a href="?page=articles/show&id=<?php echo $artikel->id; ?>" 
                                                                    class="btn btn-sm btn-info">
                                                                        <i class="feather icon-eye"></i> Lihat
                                                                    </a>

                                                                    <!-- EDIT -->
                                                                    <a href="?page=articles/edit&id=<?php echo $artikel->id; ?>" 
                                                                    class="btn btn-sm btn-warning">
                                                                        <i class="feather icon-edit"></i> Edit
                                                                    </a>

                                                                    <!-- DELETE -->
                                                                    <a href="?page=articles/delete&id=<?php echo $artikel->id; ?>" 
                                                                    class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Yakin ingin menghapus artikel ini?')">
                                                                        <i class="feather icon-trash-2"></i> Hapus
                                                                    </a>

                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>

                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan="5" class="text-center text-muted py-4">
                                                                <i class="feather icon-info mr-1"></i> 
                                                                Data tidak ditemukan atau API offline
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>

                                            </table>
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
</div>