# TecArt Blog (Starter Workshop)

Project untuk pelatihan **Software Engineering 101: Frontend dengan Blade dan Tailwind CSS**.

## 1. Yang harus ada di laptop

Cek dengan menjalankan perintah di kolom kanan.

| Alat | Versi minimal | Cek dengan |
|---|---|---|
| PHP | 8.3 | `php -v` |
| Composer | 2.x | `composer -V` |
| Node.js (sudah termasuk npm) | 20.19 atau 22.12 ke atas | `node -v` |
| Git | bebas | `git --version` |

Kalau memakai Laragon, jalankan semua perintah di bawah lewat **Terminal Laragon**.

---

## 2. Cara menjalankan 


**Langkah 1. Clone project**

```bash
git clone <https://github.com/arisuryaa/tecart_blog_starter.git>
cd <tecart_blog_starter>
```

**Langkah 2. Setup otomatis**

```bash
composer setup
```

**Langkah 3. Isi data contoh**

```bash
php artisan db:seed --class=PostSeeder
```

**Langkah 4. Nyalakan aplikasi**

```bash
composer run dev
```

**Langkah 5. Buka di browser**

```
http://localhost:8000
```
