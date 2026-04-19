<?php require_once __DIR__ . '/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Daftar Bangun Datar</h4>
    <a href="index.php?action=create" class="btn btn-primary btn-sm">
        <i class="fas fa-plus me-1"></i>Tambah Data
    </a>
</div>

<?php if (!empty($_SESSION['flash'])): ?>
    <div class="alert alert-<?= htmlspecialchars($_SESSION['flash']['type']) ?> alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($_SESSION['flash']['message']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>

<table class="table table-striped table-bordered align-middle">
    <thead class="table-primary">
        <tr>
            <th width="5%">No</th>
            <th>Nama Bidang</th>
            <th>Luas</th>
            <th>Keliling</th>
            <th width="15%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($bidangDatars)): ?>
            <tr>
                <td colspan="5" class="text-center text-muted">Belum ada data.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($bidangDatars as $index => $item): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($item['nama']) ?></td>
                    <td><?= number_format((float) $item['luas'], 2) ?></td>
                    <td><?= number_format((float) $item['keliling'], 2) ?></td>
                    <td>
                        <a href="index.php?action=edit&id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="index.php?action=delete&id=<?= $item['id'] ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin ingin menghapus data ini?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>
