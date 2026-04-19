# Bangun Datar

Aplikasi PHP untuk mengelola dan menghitung properti bangun datar (Persegi, Persegi Panjang, dan Lingkaran) dengan fitur CRUD berbasis database MySQL.

---

## Daftar Isi

- [Persyaratan](#persyaratan)
- [Instalasi](#instalasi)
- [Penggunaan Fitur](#penggunaan-fitur)
- [Class Diagram (PlantUML)](#class-diagram-plantuml)
- [Dokumentasi API (phpDocumentor)](#dokumentasi-api-phpdocumentor)
- [Unit Testing (PestPHP)](#unit-testing-pestphp)

---

## Persyaratan

- PHP >= 8.0
- MySQL / MariaDB
- Composer
- Web Server (Apache / Nginx / PHP Built-in Server)

---

## Instalasi

**1. Clone atau download project**

```bash
git clone <url-repo>
cd project-bangun-datar
```

**2. Install dependencies**

```bash
composer install
```

**3. Buat database dan import skema**

```bash
mysql -u root -p -e "CREATE DATABASE serkom;"
mysql -u root -p serkom < database.sql
```

**4. Sesuaikan konfigurasi database**

Edit file `src/database/konfigurasi.php`:

```php
return [
    'host'     => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'serkom',
];
```

**5. Jalankan web server**

```bash
php -S localhost:8000 src/index.php
```

Buka browser: `http://localhost:8000`

---

## Penggunaan Fitur

### Bangun Datar yang Didukung

| Bangun Datar   | Rumus Luas         | Rumus Keliling         |
|----------------|--------------------|------------------------|
| Persegi        | sisi × sisi        | 4 × sisi               |
| Persegi Panjang| panjang × lebar    | 2 × (panjang + lebar)  |
| Lingkaran      | π × r²             | 2 × π × r              |

### Alur Penggunaan

**Melihat daftar bangun datar**

Buka halaman utama — semua data yang tersimpan di database ditampilkan dalam tabel beserta nilai luas dan kelilingnya.

**Menambah bangun datar baru**

1. Klik tombol **Tambah Bangun Datar**
2. Pilih jenis bangun datar dari dropdown
3. Isi dimensi yang diperlukan:
   - Persegi → `sisi`
   - Persegi Panjang → `panjang` dan `lebar`
   - Lingkaran → `jari-jari`
4. Klik **Simpan** — luas dan keliling dihitung otomatis

**Mengubah data**

1. Klik tombol **Edit** pada baris yang ingin diubah
2. Perbarui nilai nama, luas, atau keliling
3. Klik **Perbarui**

**Menghapus data**

Klik tombol **Hapus** pada baris yang ingin dihapus.

---

## Class Diagram (PlantUML)

File diagram kelas tersedia di `uml/class-diagram.puml` dan menggambarkan hubungan antar kelas pada `src/Models/`.

### Struktur Pewarisan

```
InterfaceHitung
      ▲
      │
 BangunDatar
      ▲
   ┌──┼──────────────┐
   │                 │                  │
Persegi     PersegiPanjang         Lingkaran
```

### Cara Render Diagram

**1. VS Code**

Install extension [PlantUML](https://marketplace.visualstudio.com/items?itemName=jebbs.plantuml), buka file `uml/class-diagram.puml`, lalu tekan `Alt+D` untuk preview.

**2. Online**

Buka [https://www.plantuml.com/plantuml/uml/](https://www.plantuml.com/plantuml/uml/) lalu paste isi file `uml/class-diagram.puml`.

**3. CLI** (butuh Java + plantuml.jar)

```bash
java -jar plantuml.jar uml/class-diagram.puml
# Output: uml/class-diagram.png
```

---

## Dokumentasi API (phpDocumentor)

Dokumentasi dihasilkan dari komentar PHPDoc yang ada di dalam kode sumber (`src/Models/`).

### Generate Dokumentasi

Pastikan file `phpDocumentor.phar` ada di root project. Jika belum, download terlebih dahulu:

```bash
curl -L https://phpdoc.org/phpDocumentor.phar -o phpDocumentor.phar
```

Jalankan perintah generate:

```bash
# Generate docs untuk folder Models saja
php phpDocumentor.phar run -d src/Models -t docs --title "Bangun Datar - Model API"

# Generate docs untuk seluruh src/
php phpDocumentor.phar run -d src -t docs --title "Bangun Datar - API"
```

### Membuka Hasil Dokumentasi

```bash
# Windows
start docs/index.html
```

Atau buka file `docs/index.html` langsung di browser.

### Penjelasan Parameter

| Parameter | Keterangan |
|-----------|------------|
| `-d src/Models` | Folder sumber yang di-scan |
| `-t docs` | Folder output hasil dokumentasi |
| `--title "..."` | Judul yang tampil di halaman docs |

---

## Unit Testing (PestPHP)

Unit test mencakup ketiga kelas model bangun datar: `Persegi`, `PersegiPanjang`, dan `Lingkaran`.

### Instalasi PestPHP

PestPHP sudah tersedia di folder `vendor/`. Jika belum, install via Composer:

```bash
composer require --dev pestphp/pest
```

### Menjalankan Tests

```bash
# Jalankan semua tests
./vendor/bin/pest

# Jalankan hanya unit tests model
./vendor/bin/pest tests/Unit

# Jalankan test file tertentu
./vendor/bin/pest tests/Unit/Models/PersegiTest.php
./vendor/bin/pest tests/Unit/Models/PersegiPanjangTest.php
./vendor/bin/pest tests/Unit/Models/LingkaranTest.php
```

### Opsi Tambahan

```bash
# Tampilkan output lebih detail
./vendor/bin/pest --verbose

# Jalankan dengan laporan coverage (butuh Xdebug)
./vendor/bin/pest --coverage
```

### Daftar Test Cases

**Persegi** (`tests/Unit/Models/PersegiTest.php`)

| Test | Keterangan |
|------|------------|
| memiliki nama "Persegi" | Verifikasi `getNamaBangunDatar()` |
| menggunakan sisi default 5 | Luas=25, Keliling=20 |
| menghitung luas: sisi × sisi | Berbagai nilai sisi |
| menghitung keliling: 4 × sisi | Berbagai nilai sisi |
| mendukung nilai desimal | Contoh: sisi=2.5 |
| merupakan turunan dari BangunDatar | Cek inheritance |
| dataset berbagai nilai sisi | sisi 3, 8, 9, 11, 15 |

**PersegiPanjang** (`tests/Unit/Models/PersegiPanjangTest.php`)

| Test | Keterangan |
|------|------------|
| memiliki nama "Persegi Panjang" | Verifikasi `getNamaBangunDatar()` |
| menggunakan default p=7, l=4 | Luas=28, Keliling=22 |
| menghitung luas: panjang × lebar | Berbagai dimensi |
| menghitung keliling: 2×(p+l) | Berbagai dimensi |
| mendukung nilai desimal | Contoh: p=5.5, l=2.5 |
| merupakan turunan dari BangunDatar | Cek inheritance |
| dataset berbagai dimensi | 5 kombinasi p dan l |

**Lingkaran** (`tests/Unit/Models/LingkaranTest.php`)

| Test | Keterangan |
|------|------------|
| memiliki nama "Lingkaran" | Verifikasi `getNamaBangunDatar()` |
| menggunakan jari-jari default 3 | Luas=π×9, Keliling=2π×3 |
| menghitung luas: π × r² | Berbagai jari-jari |
| menghitung keliling: 2 × π × r | Berbagai jari-jari |
| hasil bertipe float | Verifikasi tipe data |
| merupakan turunan dari BangunDatar | Cek inheritance |
| dataset berbagai jari-jari | r=1, 2, 5, 7, 14 |

### Contoh Output

```
 PASS  Tests\Unit\Models\LingkaranTest
 PASS  Tests\Unit\Models\PersegiPanjangTest
 PASS  Tests\Unit\Models\PersegiTest

Tests:    33 passed (66 assertions)
Duration: 1.83s
```

---

## Struktur Project

```
project-bangun-datar/
├── src/
│   ├── Controllers/
│   │   └── BangunDatarController.php
│   ├── Models/
│   │   ├── InterfaceHitung.php
│   │   ├── BangunDatar.php
│   │   ├── Persegi.php
│   │   ├── PersegiPanjang.php
│   │   └── Lingkaran.php
│   ├── database/
│   │   ├── BangunDatarModel.php
│   │   ├── Koneksi.php
│   │   └── konfigurasi.php
│   ├── views/
│   │   ├── index.php
│   │   ├── create.php
│   │   ├── edit.php
│   │   └── layouts/
│   └── index.php
├── tests/
│   └── Unit/
│       └── Models/
│           ├── PersegiTest.php
│           ├── PersegiPanjangTest.php
│           └── LingkaranTest.php
├── uml/
│   └── class-diagram.puml
├── docs/              ← hasil generate phpDocumentor
├── database.sql
├── composer.json
└── README.md
```

---

## Lisensi

MIT © Aldhi Xar
