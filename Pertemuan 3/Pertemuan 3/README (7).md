# Pertemuan 3 – Inheritance dan Method Overriding di PHP (OOP)

Proyek ini membahas **pewarisan (inheritance)**. Ada dua contoh dalam satu folder:

1. **Bangun datar**: class induk `BangunDatar` diturunkan menjadi `Lingkaran`, `Persegi`, dan `Segitiga`, dijalankan lewat `App.php`.
2. **Mahasiswa**: class induk `Mahasiswa` dipakai oleh `main.php` lewat class turunan `MahasiswaInternational`.

## Struktur Folder

```
Pertemuan 3/
├── BangunDatar.php   # Parent class bangun datar
├── Lingkar.php       # Class Lingkaran (turunan BangunDatar)
├── Persegi.php       # Class Persegi (turunan BangunDatar)
├── Segitia.php       # Class Segitiga (turunan BangunDatar)
├── App.php           # Program utama contoh bangun datar
├── Mahasiswa.php     # Parent class Mahasiswa
└── main.php          # Program utama contoh mahasiswa internasional
```

## Konsep yang Dipelajari

| Konsep | Penjelasan |
| --- | --- |
| **Inheritance** | Class turunan mewarisi property dan method dari parent class memakai kata kunci `extends`. |
| **Parent / Super class** | Class induk (`BangunDatar`, `Mahasiswa`) yang berisi perilaku umum. |
| **Method overriding** | Class turunan menulis ulang method milik parent. `Lingkaran`, `Persegi`, dan `Segitiga` menimpa `luas()` dan `keliling()` dengan rumus masing-masing. |
| **Pewarisan method** | Bila class turunan tidak mendefinisikan sebuah method, method milik parent yang dipanggil. Contohnya `Segitiga` tidak punya `keliling()`, sehingga yang jalan adalah `keliling()` dari `BangunDatar`. |
| **Konstanta bawaan** | `M_PI` adalah nilai π bawaan PHP, dipakai untuk menghitung luas dan keliling lingkaran. |
| **`intdiv()`** | Pembagian bilangan bulat, mirip pembagian integer di Java. |
| **Named argument** | Mengisi argumen berdasarkan nama parameter, misalnya `nama: "Sarah"`. Fitur ini butuh PHP 8.0 ke atas. |

## Penjelasan Kode

### Bagian 1 – Bangun Datar

#### `BangunDatar.php` – Parent class

![Kode BangunDatar](blob:https://web.whatsapp.com/4a27a10b-3360-483b-b9f8-e7bf4ac5ef8b)

Class ini sengaja tidak punya property karena tiap turunannya memakai data yang berbeda (jari-jari, sisi, alas dan tinggi). Method `luas()` dan `keliling()` hanya mencetak pesan lalu mengembalikan `0.0`, sebagai perilaku bawaan yang akan ditimpa oleh turunannya.

#### `Lingkar.php` – Class `Lingkaran`

![Kode Lingkaran](blob:https://web.whatsapp.com/ee15ffb1-0084-4e44-8bf4-7634e7940ee2)

Menyimpan jari-jari `$r`. `luas()` memakai rumus π × r × r dan `keliling()` memakai 2 × π × r.

#### `Persegi.php` – Class `Persegi`

![Kode Persegi](blob:https://web.whatsapp.com/81991eaa-e16e-425f-8034-a94af322e567)

Menyimpan panjang `$sisi`. Luas dihitung sisi × sisi dan keliling sisi × 4.

#### `Segitia.php` – Class `Segitiga`

![Kode Segitiga](blob:https://web.whatsapp.com/b24c4978-c92e-48c5-a439-745e07a8370f)

Menyimpan `$alas` dan `$tinggi`. Hanya `luas()` yang ditimpa (alas × tinggi ÷ 2 dengan `intdiv()`). `keliling()` sengaja tidak didefinisikan, sehingga memakai versi milik `BangunDatar`.

#### `App.php` – Program utama

![Kode App.php](blob:https://web.whatsapp.com/df83d339-4bf9-41e1-9692-055f062f45bf)

- `$bd` adalah object `BangunDatar` langsung, jadi kedua method-nya mencetak pesan bawaan.
- `$lk` (jari-jari 15), `$pj` (sisi 10), dan `$sg` (alas 10, tinggi 8) dibuat dari class turunan, lalu luas dan kelilingnya dicetak.
- `$sg->keliling()` memanggil method milik parent, sehingga yang tercetak adalah pesan "Menghitung keliling bangun datar", bukan angka.

### Bagian 2 – Mahasiswa

#### `Mahasiswa.php` – Parent class

![Kode Mahasiswa](blob:https://web.whatsapp.com/db2882be-d5b9-4c32-b8eb-82508b61d05d)

Sama seperti Pertemuan 2: tiga property `private`, constructor dengan nilai default, pasangan getter dan setter, serta `tampilkanInfo()`.

#### `MahasiswaInternational.php` – Class `MahasiswaInternational`

![Kode MahasiswaInternational](blob:https://web.whatsapp.com/18cc64d8-bf13-41de-bce0-d1cfe720738c)

Class ini turunan dari `Mahasiswa` yang menambahkan satu data baru, yaitu negara asal. Penjelasan per bagian:

#### `main.php` – Program utama

![Kode main.php](blob:https://web.whatsapp.com/f2320f74-1b6b-4bb0-b456-1c7e2a031e68)

Membuat tiga object `MahasiswaInternational` dengan tiga cara: tanpa argumen lalu diisi lewat setter, dengan named argument (`nama`, `nim`, `negaraAsal`), dan dengan empat argumen berurutan (nama, nim, umur, negara).

## Cara Menjalankan

**Prasyarat:** PHP 8.0 atau lebih baru (karena `main.php` memakai named argument).

```bash
cd "Pertemuan 3"
php App.php
```

> **Catatan sebelum menjalankan:** ada beberapa ketidaksesuaian nama file yang membuat program gagal dengan error *Failed opening required*, di sistem operasi apa pun.
>
> | `require_once` memanggil | File yang ada di folder | Perbaikan |
> | --- | --- | --- |
> | `Lingkaran.php` (di `App.php`) | `Lingkar.php` | Ubah nama file menjadi `Lingkaran.php` |
> | `Segitiga.php` (di `App.php`) | `Segitia.php` | Ubah nama file menjadi `Segitiga.php` |
> | `MahasiswaInternational.php` (di `main.php`) | *(belum ada)* | Tambahkan file class `MahasiswaInternational` yang meng-`extends Mahasiswa` |


## Ringkasan Alur Program

1. `App.php` memuat class induk dan ketiga class turunan.
2. Object `BangunDatar` dibuat dan method-nya dipanggil, menampilkan perilaku bawaan.
3. Tiap bangun dibuat dari class turunan, lalu `luas()` dan `keliling()` dipanggil sehingga rumus masing-masing yang dipakai (overriding).
4. `Segitiga` tidak menimpa `keliling()`, jadi method milik `BangunDatar` yang berjalan.
