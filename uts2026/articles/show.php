<?php
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID tidak ditemukan!";
    exit;
}

// 🔥 Ambil SEMUA data (biar aman walau API tidak support ?id=)
$url = "http://localhost/belajar_api/services/articles/index.php";
$response = @file_get_contents($url);

$artikel = null;

if ($response !== FALSE) {
    $data = json_decode($response);

    // Jika format { data: [...] }
    if (isset($data->data) && is_array($data->data)) {
        foreach ($data->data as $item) {
            if ($item->id == $id) {
                $artikel = $item;
                break;
            }
        }

    // Jika langsung array
    } elseif (is_array($data)) {
        foreach ($data as $item) {
            if ($item->id == $id) {
                $artikel = $item;
                break;
            }
        }
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
                            <h5>Detail Artikel</h5>
                        </div>

                        <div class="card">
                            <div class="card-body">

                                <?php if ($artikel): ?>

                                    <h3>
                                        <?php echo htmlspecialchars($artikel->judul ?? 'Judul tidak ada'); ?>
                                    </h3>

                                    <hr>

                                    <p><strong>Author ID:</strong> 
                                        <?php echo $artikel->author_id ?? '-'; ?>
                                    </p>

                                    <p><strong>Category ID:</strong> 
                                        <?php echo $artikel->category_id ?? '-'; ?>
                                    </p>

                                    <hr>

                                    <div style="line-height:1.8; white-space: pre-line;">
                                        <?php echo htmlspecialchars($artikel->isi ?? 'Isi kosong'); ?>
                                    </div>

                                    <br>

                                    <a href="?page=articles" class="btn btn-secondary">
                                        Kembali
                                    </a>

                                <?php else: ?>

                                    <div class="alert alert-danger">
                                        <h5>Data tidak ditemukan!</h5>
                                        <p>ID <strong><?php echo htmlspecialchars($id); ?></strong> tidak ada di API.</p>
                                    </div>

                                    <a href="?page=articles" class="btn btn-primary">
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