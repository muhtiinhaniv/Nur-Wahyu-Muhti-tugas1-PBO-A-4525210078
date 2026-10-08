# Pertemuan 2 – Constructor, Getter, dan Setter di PHP (OOP)

Proyek ini melanjutkan dasar OOP dari Pertemuan 1. Contoh yang dipakai adalah class `Mahasiswa` yang menyimpan nama, NIM, dan umur. Fokus materinya: **constructor dengan nilai default**, **getter dan setter**, serta **method untuk menampilkan informasi object**.

## Struktur Folder

```
Pertemuan 2/
├── Mahasiswa.php   # Definisi class Mahasiswa
└── Aplikasi.php    # Program utama: membuat object dan menjalankan method
```

## Konsep yang Dipelajari

| Konsep | Penjelasan |
| --- | --- |
| **Property bertipe** | `private string $nama`, `private string $nim`, dan `private int $umur` menyimpan data mahasiswa dengan tipe data yang jelas. |
| **Encapsulation** | Semua property `private`, jadi hanya bisa diubah atau dibaca lewat method publik. |
| **Constructor dengan default parameter** | PHP tidak mendukung *constructor overloading* seperti Java. Sebagai gantinya, satu constructor diberi nilai default sehingga bisa dipanggil dengan 0, 1, 2, atau 3 argumen. |
| **Getter** | Method `getNama()`, `getNim()`, dan `getUmur()` untuk membaca nilai property. |
| **Setter** | Method `setNama()`, `setNim()`, dan `setUmur()` untuk mengubah nilai property setelah object dibuat. Tipe kembaliannya `void` karena tidak mengembalikan apa pun. |
| **Method `tampilkanInfo()`** | Mencetak seluruh data object sekaligus, sehingga tidak perlu memanggil getter satu per satu. |

## Penjelasan Kode

### 1. `Mahasiswa.php` – Class

![Kode class Mahasiswa](blob:https://web.whatsapp.com/a6b8d7c4-77cc-44c4-b38e-7b89e4277ef6)

- **Constructor** memiliki nilai default `"Belum Diisi"` untuk `$nama` dan `$nim`, serta `0` untuk `$umur`. Jadi `new Mahasiswa()` tetap valid dan menghasilkan object dengan data bawaan.
- **Getter** mengembalikan nilai property sesuai tipenya (`string` atau `int`).
- **Setter** menerima nilai baru dan menyimpannya ke property memakai `$this->`.
- **`tampilkanInfo()`** mencetak nama, NIM, dan umur, masing-masing di baris baru dengan `PHP_EOL`.

### 2. `Aplikasi.php` – Program Utama

![Kode Aplikasi.php](blob:https://web.whatsapp.com/c47de835-9039-4ae5-96d6-3f61cd05eb1d)

- Baris 5–20 adalah contoh pemakaian constructor tanpa, dengan 2, dan dengan 3 parameter yang sedang dijadikan komentar (tidak dieksekusi).
- Object `$muhti` dibuat tanpa argumen, sehingga `tampilkanInfo()` mencetak nilai default. Setelah itu datanya diisi lewat **setter** (`setNama`, `setNim`, `setUmur`) dan dibaca kembali lewat **getter**.
- Object `$hakim` dibuat dengan constructor lengkap (3 argumen), lalu ditampilkan dengan `tampilkanInfo()`.

## Cara Menjalankan

**Prasyarat:** PHP 7.4 atau lebih baru.

1. Masuk ke folder proyek:
   ```bash
   cd "Pertemuan 2"
   ```
2. Jalankan program utama:
   ```bash
   php Aplikasi.php
   ```

## Hasil Output

![Output program](screenshots/03-output.png)

```
Nama: Belum Diisi
NIM: Belum Diisi
Umur: 0
Nama : Muhamad Aria Khalil Mirzahamzah
NIM : 4525210094
Umur : 15
Nama: Arief Rahman Hakim
NIM: 4525210095
Umur: 19
```

Tiga baris pertama berasal dari `tampilkanInfo()` pada object `$khalil` yang masih berisi nilai default. Tiga baris berikutnya muncul setelah data diisi lewat setter. Tiga baris terakhir adalah object `$hakim` yang langsung diisi lewat constructor.

## Ringkasan Alur Program

1. `Aplikasi.php` memuat class dari `Mahasiswa.php`.
2. `$khalil` dibuat tanpa argumen, lalu ditampilkan (nilai default).
3. Data `$khalil` diisi dengan setter dan dicetak ulang dengan getter.
4. `$hakim` dibuat dengan 3 argumen, lalu ditampilkan dengan `tampilkanInfo()`.
