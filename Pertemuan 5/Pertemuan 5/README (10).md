# Pertemuan 5 – Asosiasi, Agregasi, dan Komposisi di PHP (OOP)

Proyek ini membahas tiga jenis **hubungan antar class** dalam OOP, masing-masing dengan satu contoh:

| Hubungan | Contoh | Class |
| --- | --- | --- |
| **Asosiasi** | Dokter merawat Pasien | `Dokter`, `Pasien` |
| **Agregasi** | Tim memiliki Pemain | `Tim`, `Pemain` |
| **Komposisi** | Buku memiliki Bab | `Buku`, `Bab` |

## Struktur Folder

```
Pertemuan 5/
├── Dokter.php   # Asosiasi: dokter merawat pasien
├── Pasien.php
├── Tim.php      # Agregasi: tim berisi pemain
├── Pemain.php
├── Buku.php     # Komposisi: buku membuat dan memiliki bab
├── Bab.php
└── main.php     # Program utama yang memperagakan ketiganya
```

## Konsep yang Dipelajari

| Konsep | Penjelasan |
| --- | --- |
| **Asosiasi** | Hubungan paling longgar. Dua class saling mengenal dan bekerja sama, tetapi tidak saling memiliki. `Dokter` hanya menerima object `Pasien` sebagai parameter method `merawat()`. |
| **Agregasi** | Hubungan "memiliki" yang longgar. Object `Pemain` dibuat di luar, lalu diberikan ke `Tim`. Kalau tim dibubarkan, pemainnya tetap ada. |
| **Komposisi** | Hubungan "memiliki" yang kuat. Object `Bab` dibuat di dalam `Buku` dan hidupnya bergantung pada buku. Kalau buku dihapus, bab ikut hilang. |
| **Type hint object** | Parameter bertipe class, misalnya `merawat(Pasien $pasien)`, memastikan hanya object `Pasien` yang diterima. |
| **Array of object** | `Tim` dan `Buku` menyimpan banyak object di dalam array (`$daftarPemain`, `$daftarBab`). |
| **DocBlock `@var`/`@param`** | Komentar `/** @var Pemain[] */` memberi tahu editor isi array tersebut. Ini hanya dokumentasi dan tidak memengaruhi jalannya program. |

## Penjelasan Kode

### 1. Asosiasi – `Dokter` dan `Pasien`

![Kode Dokter](blob:https://web.whatsapp.com/994834c2-06bd-4e62-ac7e-0dab3f19e79b)

![Kode Pasien](blob:https://web.whatsapp.com/3aff59fd-4872-41fb-bebd-972fd9ef0785)

`Pasien` hanya menyimpan nama beserta getter-nya. `Dokter.merawat()` menerima object `Pasien` dari luar, lalu memakai `getNama()` untuk mencetak kalimat perawatan. Kedua object hidup sendiri-sendiri, `Dokter` tidak menyimpan `Pasien` sebagai miliknya.

### 2. Agregasi – `Tim` dan `Pemain`

![Kode Tim](blob:https://web.whatsapp.com/1eb57d8e-1167-466d-8865-de6001a78fe2)

![Kode Pemain](blob:https://web.whatsapp.com/b9a3a51d-e031-4a11-a9a9-6889aba75ff3)

`Tim` menerima array berisi object `Pemain` lewat constructor dan menyimpannya di `$daftarPemain`. Object pemain dibuat **di luar** `Tim` (di `main.php`), sehingga pemain tetap bisa dipakai di tempat lain walau tim sudah tidak ada. Method `tampilkanPemain()` melakukan loop `foreach` untuk mencetak nama tiap pemain.

### 3. Komposisi – `Buku` dan `Bab`

![Kode Buku](blob:https://web.whatsapp.com/d43e004f-2682-4aa5-bfba-2b8201629f3b)

![Kode Bab](blob:https://web.whatsapp.com/82793431-9287-49c2-a6d7-315ba3e3d243)

Berbeda dengan `Tim`, object `Bab` dibuat **di dalam** class `Buku` lewat method private `tambahBab()` yang dipanggil oleh constructor. Pengguna class tidak bisa membuat atau mengambil bab secara terpisah. Karena itu bab ikut hilang ketika object `Buku` dihancurkan.

### 4. `main.php` – Program utama

![Kode main.php](blob:https://web.whatsapp.com/90b21b76-71ab-4ee2-888b-be01f6ee50e1)

- **Asosiasi:** `$dokter->merawat($pasien)` mempertemukan dua object yang dibuat terpisah.
- **Agregasi:** dua object `Pemain` dibuat dulu, baru dimasukkan ke dalam `Tim`.
- **Komposisi:** `new Buku("Belajar Java")` otomatis membuat tiga bab di dalamnya. Setelah itu `$buku = null` melepas satu-satunya referensi ke buku, sehingga PHP membersihkan object buku beserta bab-babnya.

## Ringkasan Alur Program

1. `main.php` memuat semua class yang dibutuhkan.
2. **Asosiasi:** object `Dokter` dan `Pasien` dibuat terpisah, lalu dokter merawat pasien.
3. **Agregasi:** dua `Pemain` dibuat di luar, lalu dikumpulkan ke dalam `Tim` dan ditampilkan.
4. **Komposisi:** `Buku` membuat bab-babnya sendiri, menampilkannya, lalu dihapus bersama babnya dengan `$buku = null`.
