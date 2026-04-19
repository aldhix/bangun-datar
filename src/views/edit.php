<?php require_once __DIR__ . '/layouts/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Bangun Datar</h5>
            </div>
            <div class="card-body">
                <form action="index.php?action=update" method="POST">
                    <input type="hidden" name="id" value="<?= (int) $bangunDatar['id'] ?>">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Bangun Datar</label>
                        <input type="text" name="nama" class="form-control"
                               value="<?= htmlspecialchars($bangunDatar['nama']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Luas</label>
                        <input type="number" name="luas" class="form-control" step="0.01" min="0"
                               value="<?= htmlspecialchars($bangunDatar['luas']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Keliling</label>
                        <input type="number" name="keliling" class="form-control" step="0.01" min="0"
                               value="<?= htmlspecialchars($bangunDatar['keliling']) ?>" required>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save me-1"></i>Perbarui
                        </button>
                        <a href="index.php" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>
