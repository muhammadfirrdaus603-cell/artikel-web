<?php
require_once(__DIR__ . '/../orm/config.php');
require_once(__DIR__ . '/../orm/AuthorsORM.php');

// Ambil semua data authors dari database
$listAuthors = AuthorsORM::find_many();
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
                                            <h5 class="m-b-10">Manajemen Authors</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.php">
                                                    <i class="feather icon-home"></i>
                                                </a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="?page=authors">Modul Authors</a>
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
                                            <h5>Data Authors</h5>
                                            <a href="?page=authors/tambah" class="btn btn-primary btn-sm shadow-sm">
                                                <i class="feather icon-plus"></i> Tambah Author
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
                                                        <th>Nama Author</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php if (count($listAuthors) > 0): ?>
                                                        <?php $no = 1; foreach ($listAuthors as $author): ?>
                                                            <tr>
                                                                <td><?php echo $no++; ?></td>

                                                                <!-- NAMA -->
                                                                <td>
                                                                    <strong>
                                                                        <?php echo htmlspecialchars($author->nama ?? '-'); ?>
                                                                    </strong>
                                                                </td>

                                                                <!-- AKSI -->
                                                                <td class="text-center">
                                                                    <div class="btn-group" role="group">
                                                                        <a href="?page=authors/show&id=<?php echo $author->id; ?>" 
                                                                           class="btn btn-info btn-sm" title="Lihat Detail">
                                                                            <i class="feather icon-eye"></i>
                                                                        </a>
                                                                        <a href="?page=authors/edit&id=<?php echo $author->id; ?>" 
                                                                           class="btn btn-warning btn-sm" title="Edit">
                                                                            <i class="feather icon-edit"></i>
                                                                        </a>
                                                                        <a href="?page=authors/delete&id=<?php echo $author->id; ?>" 
                                                                           class="btn btn-danger btn-sm" 
                                                                           onclick="return confirm('Yakin hapus author <?php echo htmlspecialchars($author->nama); ?>?')" 
                                                                           title="Hapus">
                                                                            <i class="feather icon-trash"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan="3" class="text-center text-muted">
                                                                <i class="feather icon-info"></i> Belum ada data authors
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