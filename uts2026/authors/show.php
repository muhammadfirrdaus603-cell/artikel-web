<?php
require_once(__DIR__ . '/../orm/config.php');
require_once(__DIR__ . '/../orm/AuthorsORM.php');

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID tidak ditemukan!";
    exit;
}

$author = AuthorsORM::find_one($id);

if (!$author) {
    echo "Author tidak ditemukan!";
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
                            <h5>Detail Author</h5>
                        </div>

                        <div class="card">
                            <div class="card-body">

                                <?php if ($author): ?>

                                    <h3>
                                        <?php echo htmlspecialchars($author->nama ?? 'Nama tidak ada'); ?>
                                    </h3>

                                    <hr>

                                    <p><strong>ID:</strong> 
                                        <?php echo $author->id ?? '-'; ?>
                                    </p>

                                    <br>

                                    <a href="?page=authors/index" class="btn btn-secondary">
                                        Kembali
                                    </a>

                                <?php else: ?>

                                    <div class="alert alert-danger">
                                        <h5>Data tidak ditemukan!</h5>
                                        <p>ID <strong><?php echo htmlspecialchars($id); ?></strong> tidak ada di database.</p>
                                    </div>

                                    <a href="?page=authors/index" class="btn btn-primary">
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