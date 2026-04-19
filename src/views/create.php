<?php require_once __DIR__ . '/layouts/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Tambah Bangun Datar</h5>
            </div>
            <div class="card-body">
                <form action="index.php?action=store" method="POST">
                    <div class="mb-3">
                        <label for="jenis" class="form-label fw-semibold">Jenis Bangun Datar</label>
                        <select name="jenis" id="jenis" class="form-select" required onchange="showFields(this.value)">
                            <option value="">-- Pilih Jenis --</option>
                            <option value="persegi">Persegi</option>
                            <option value="persegi_panjang">Persegi Panjang</option>
                            <option value="lingkaran">Lingkaran</option>
                        </select>
                    </div>

                    <div id="field-persegi" class="d-none">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Sisi</label>
                            <input type="number" name="sisi" class="form-control" step="0.01" min="0.01" placeholder="Masukkan panjang sisi">
                        </div>
                    </div>

                    <div id="field-persegi_panjang" class="d-none">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Panjang</label>
                            <input type="number" name="panjang" class="form-control" step="0.01" min="0.01" placeholder="Masukkan panjang">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Lebar</label>
                            <input type="number" name="lebar" class="form-control" step="0.01" min="0.01" placeholder="Masukkan lebar">
                        </div>
                    </div>

                    <div id="field-lingkaran" class="d-none">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Jari-Jari</label>
                            <input type="number" name="jari_jari" class="form-control" step="0.01" min="0.01" placeholder="Masukkan jari-jari">
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Simpan
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

<script>
function showFields(jenis) {
    ['persegi', 'persegi_panjang', 'lingkaran'].forEach(function(j) {
        document.getElementById('field-' + j).classList.add('d-none');
    });
    if (jenis) {
        document.getElementById('field-' + jenis).classList.remove('d-none');
    }
}
</script>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>
