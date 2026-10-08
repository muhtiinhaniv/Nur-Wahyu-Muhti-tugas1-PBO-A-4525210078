# Pertemuan 1 – Dasar Class dan Object di PHP (OOP)

Proyek kecil ini memperkenalkan konsep dasar **Object-Oriented Programming (OOP)** di PHP. Contoh yang dipakai adalah class `iPhone`, lalu dari class tersebut dibuat dua object: iPhone 13 dan iPhone 14.

## Struktur Folder

```
Pertemuan 1/
├── Iphone.php   # Definisi class iPhone
└── main.php     # Program utama: membuat object dan menampilkan hasilnya
```

## Konsep yang Dipelajari

| Konsep | Penjelasan |
| --- | --- |
| **Class** | Cetak biru (blueprint) untuk membuat object. Di sini class `iPhone` mendefinisikan data dan perilaku sebuah iPhone. |
| **Object** | Hasil nyata dari sebuah class. `$iphone13` dan `$iphone14` adalah dua object berbeda dari class yang sama. |
| **Instantiation** | Proses membuat object dari class menggunakan kata kunci `new`. |
| **Property** | Data milik object, yaitu `$color` dan `$storage`. |
| **Constructor** | Method khusus `__construct()` yang otomatis berjalan saat object dibuat, dipakai untuk mengisi nilai awal property. |
| **Encapsulation** | Property dibuat `private` sehingga tidak bisa diakses langsung dari luar class, hanya lewat method publik. |
| **Getter** | Method `getColor()` dan `getStorage()` untuk membaca nilai property yang bersifat private. |

## Penjelasan Kode

### 1. `Iphone.php` – Class

![Kode class iPhone](blob:https://web.whatsapp.com/8e1cbc79-ecef-4356-833b-616bb7a306f0)

- `private string $color;` dan `private string $storage;` adalah dua property yang menyimpan warna dan kapasitas penyimpanan. Karena `private`, nilainya hanya bisa diakses dari dalam class.
- `__construct(string $color, string $storage)` menerima dua parameter lalu menyimpannya ke property memakai `$this->`.
- `getColor()` dan `getStorage()` mengembalikan nilai property (bertipe `string`) agar bisa dibaca dari luar class.

### 2. `main.php` – Program Utama

![Kode main.php](blob:https://web.whatsapp.com/75af5757-4356-4c27-9f48-c4025e58f124)

- `require_once 'iPhone.php';` memuat file class. Dengan `require_once`, file hanya dimuat satu kali meskipun dipanggil berulang.
- `new iPhone("Red", "128GB")` membuat object `$iphone13`, dan `new iPhone("Grey", "256GB")` membuat object `$iphone14`. Kedua object memakai class yang sama tetapi punya data masing-masing.
- `echo` menampilkan spesifikasi tiap object. Method getter dipanggil dengan operator panah (`->`).
- `PHP_EOL` adalah konstanta pindah baris yang menyesuaikan sistem operasi.

## Cara Menjalankan

**Prasyarat:** PHP 7.4 atau lebih baru (property bertipe seperti `private string $color` baru tersedia mulai PHP 7.4).

1. Buka terminal, lalu masuk ke folder proyek:
   ```bash
   cd "Pertemuan 1"
   ```
2. Jalankan program utama:
   ```bash
   php main.php
   ```

> **Catatan penting:** file class bernama `Iphone.php` (huruf kecil `p`), sedangkan `main.php` memanggil `'iPhone.php'` (huruf besar `P`). Di Windows dan macOS hal ini tidak masalah, tetapi di **Linux** nama file bersifat case-sensitive sehingga akan muncul error *Failed opening required*. Samakan penulisannya, misalnya ubah nama file menjadi `iPhone.php`.

## Hasil Output


```
Spesifikasi iPhone 13
Warna: Red
Storage: 128GB
Spesifikasi iPhone 14
Warna: Grey
Storage: 256GB
```

## Ringkasan Alur Program

1. `main.php` memuat class dari `iPhone.php`.
2. Dua object dibuat, masing-masing dengan warna dan storage berbeda lewat constructor.
3. Data tiap object dibaca melalui getter, lalu ditampilkan ke layar.
