# Pertemuan 4 – Polimorfisme dan Hak Akses `protected` di PHP (OOP)

Proyek ini membahas **polimorfisme**: object dari class berbeda bisa diperlakukan lewat satu parent class, tetapi tiap object tetap menjalankan versi method miliknya sendiri. Contoh yang dipakai adalah class induk `Handphone` dengan dua turunan, `Smartphone` dan `FeaturePhone`.

## Struktur Folder

```
Pertemuan 4/
├── Handphone.php      # Parent class
├── SmartPhone.php     # Class Smartphone (turunan Handphone)
├── FeaturePhone.php   # Class FeaturePhone (turunan Handphone)
└── main.php           # Program utama: array object + polimorfisme
```

## Konsep yang Dipelajari

| Konsep | Penjelasan |
| --- | --- |
| **Polimorfisme** | Method yang sama (`nyalakan()`, `matikan()`, `telepon()`) memberi perilaku berbeda tergantung object yang memanggilnya. |
| **Method overriding** | `Smartphone` dan `FeaturePhone` menimpa tiga method milik `Handphone` dengan versi sendiri. |
| **Hak akses `protected`** | Property `$merk` dan `$model` bisa diakses dari class itu sendiri dan class turunannya, tetapi tidak dari luar. Berbeda dengan `private` yang tidak bisa diakses turunan. |
| **`parent::__construct()`** | Constructor turunan memanggil constructor parent untuk mengisi property yang diwarisi. |
| **Array berisi object** | Satu array menampung object dari class turunan yang berbeda. |
| **`instanceof`** | Memeriksa jenis class sebuah object, sehingga method khusus (`aksesInternet()` atau `mainGameSnake()`) hanya dipanggil pada object yang memilikinya. |

## Penjelasan Kode

### 1. `Handphone.php` – Parent class

![Kode Handphone](blob:https://web.whatsapp.com/763bb280-f4fd-42e0-97e9-50a2c1481f35)

Menyimpan `$merk` dan `$model` sebagai `protected`, agar turunannya bisa membacanya langsung. Tiga method (`nyalakan()`, `matikan()`, `telepon()`) berisi perilaku umum yang nanti ditimpa turunan.

### 2. `SmartPhone.php` – Class `Smartphone`

![Kode Smartphone](blob:https://web.whatsapp.com/0ecdfd73-d27a-474a-ac19-769601155099)

Menimpa ketiga method dengan perilaku khas smartphone (booting, shutdown, panggilan video) dan menambah method baru `aksesInternet()` yang tidak ada di parent.

### 3. `FeaturePhone.php` – Class `FeaturePhone`

![Kode FeaturePhone](blob:https://web.whatsapp.com/ddf1c05f-05cc-4fe5-b2e6-b8a91f2bee7e)

Menimpa ketiga method dengan perilaku feature phone (panggilan suara) dan menambah method baru `mainGameSnake()`.

### 4. `main.php` – Program utama

![Kode main.php](blob:https://web.whatsapp.com/85e6ba9b-5815-4a07-8bb1-3f23986e0cf1g)

- `$daftarHandphone` adalah array yang langsung diisi satu `Smartphone` dan satu `FeaturePhone`.
- Loop pertama memanggil `nyalakan()`, `telepon()`, dan `matikan()` pada setiap elemen tanpa peduli jenisnya. Inilah polimorfisme: PHP otomatis memilih versi method sesuai class object-nya.
- Loop kedua memakai `instanceof` untuk memanggil method khusus yang hanya dimiliki class tertentu.

## Cara Menjalankan

**Prasyarat:** PHP 7.4 atau lebih baru.

```bash
cd "Pertemuan 4"
php main.php
```

> **Catatan sebelum menjalankan:** file class bernama `SmartPhone.php` (huruf `P` besar), sedangkan `main.php` memanggil `'Smartphone.php'` (huruf `p` kecil). Di Windows dan macOS tidak masalah, tetapi di **Linux** nama file bersifat case-sensitive sehingga muncul error *Failed opening required*. Samakan penulisannya, misalnya ubah nama file menjadi `Smartphone.php`. Nama class di PHP tidak case-sensitive, jadi `new Smartphone(...)` tetap berfungsi.

## Ringkasan Alur Program

1. `main.php` memuat parent class dan kedua class turunan.
2. Array diisi object `Smartphone` dan `FeaturePhone`.
3. Loop pertama memanggil method yang sama pada semua object, dan tiap object menjalankan versinya sendiri.
4. Loop kedua memeriksa jenis object dengan `instanceof`, lalu memanggil method khusus yang sesuai.
