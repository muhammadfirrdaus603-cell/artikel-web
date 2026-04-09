<?php
require_once(__DIR__ . '/../orm/config.php');
require_once(__DIR__ . '/../orm/CategoriesORM.php');

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID tidak ditemukan!";
    exit;
}

$category = CategoriesORM::find_one($id);

if (!$category) {
    echo "Category tidak ditemukan!";
    exit;
}
?>

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="page-header">
                            <h5>Detail Category</h5>
                        </div>

                        <div class="card">
                            <div class="card-body">

                                <?php if ($category): ?>

                                    <h3>
                                        <?php echo htmlspecialchars($category->nama_kategori ?? 'Nama tidak ada'); ?>
                                    </h3>

                                    <hr>

                                    <p><strong>ID:</strong> 
                                        <?php echo $category->id ?? '-'; ?>
                                    </p>

                                    <br>

                                    <a href="?page=categories/index" class="btn btn-secondary">
                                        Kembali
                                    </a>

                                <?php else: ?>

                                    <div class="alert alert-danger">
                                        <h5>Data tidak ditemukan!</h5>
                                        <p>ID <strong><?php echo htmlspecialchars($id); ?></strong> tidak ada di database.</p>
                                    </div>

                                    <a href="?page=categories/index" class="btn btn-primary">
                                        Kembali ke daftar
                                    </a>

                                <?php endif; ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>