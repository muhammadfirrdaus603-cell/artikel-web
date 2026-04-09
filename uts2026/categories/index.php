<?php
require_once(__DIR__ . '/../orm/config.php');
require_once(__DIR__ . '/../orm/CategoriesORM.php');

// Ambil semua data categories dari database
$listCategories = CategoriesORM::find_many();
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
                                            <h5 class="m-b-10">Manajemen Categories</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.php">
                                                    <i class="feather icon-home"></i>
                                                </a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="?page=categories">Modul Categories</a>
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
                                            <h5>Data Categories</h5>
                                            <a href="?page=categories/tambah" class="btn btn-primary btn-sm shadow-sm">
                                                <i class="feather icon-plus"></i> Tambah Category
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
                                                        <th>Nama Category</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php if (count($listCategories) > 0): ?>
                                                        <?php $no = 1; foreach ($listCategories as $category): ?>
                                                            <tr>
                                                                <td><?php echo $no++; ?></td>

                                                                <!-- NAMA -->
                                                                <td>
                                                                    <strong>
                                                                        <?php echo htmlspecialchars($category->nama_kategori ?? '-'); ?>
                                                                    </strong>
                                                                </td>

                                                                <!-- AKSI -->
                                                                <td class="text-center">
                                                                    <div class="btn-group" role="group">
                                                                        <a href="?page=categories/show&id=<?php echo $category->id; ?>" 
                                                                           class="btn btn-info btn-sm" title="Lihat Detail">
                                                                            <i class="feather icon-eye"></i>
                                                                        </a>
                                                                        <a href="?page=categories/edit&id=<?php echo $category->id; ?>" 
                                                                           class="btn btn-warning btn-sm" title="Edit">
                                                                            <i class="feather icon-edit"></i>
                                                                        </a>
                                                                        <a href="?page=categories/delete&id=<?php echo $category->id; ?>" 
                                                                           class="btn btn-danger btn-sm" 
                                                                           onclick="return confirm('Yakin hapus category <?php echo htmlspecialchars($category->nama_kategori); ?>?')" 
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
                                                                <i class="feather icon-info"></i> Belum ada data categories
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