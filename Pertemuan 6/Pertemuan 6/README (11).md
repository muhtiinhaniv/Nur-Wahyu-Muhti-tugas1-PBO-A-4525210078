# Pertemuan 6 – Abstract Class, Interface, dan Trait di PHP (OOP)

Proyek ini membahas cara menyusun class lewat **abstract class**, **interface**, dan **trait**. Contohnya sistem kendaraan: `Vehicle` sebagai abstract class, `Movable` dan `Fuelable` sebagai interface, lalu `Car`, `Boat`, `Motor`, dan `Building` sebagai class konkret.

## Struktur Folder

```
Pertemuan 6/
├── Vihicle.php         # Abstract class Vehicle
├── Movable.php         # Interface: bisa bergerak
├── Fuelable.php        # Interface: bisa diisi bahan bakar
├── FuelableTrait.php   # Trait: isi refuel() bawaan
├── Car.php             # Vehicle + Movable + Fuelable
├── Boat.php            # Vehicle + Movable + Fuelable
├── Motor.php           # Vehicle + Movable + Fuelable (refuel() dari trait)
├── Building.php        # Vehicle saja
└── Main.php            # Program utama
```

## Konsep yang Dipelajari

| Konsep | Penjelasan |
| --- | --- |
| **Abstract class** | Class yang tidak bisa dibuat object-nya langsung (`new Vehicle()` akan error). Dipakai sebagai induk yang menyimpan property dan method umum untuk semua turunannya. |
| **Interface** | Kontrak berisi daftar method tanpa isi. Class yang `implements` sebuah interface **wajib** menulis semua method-nya. |
| **Implementasi banyak interface** | Satu class boleh memakai lebih dari satu interface sekaligus (`implements Movable, Fuelable`), padahal hanya boleh punya satu parent class. |
| **Trait** | Kumpulan method yang bisa "ditempel" ke class lewat `use`. PHP tidak mendukung *default method* di interface seperti Java, sehingga trait dipakai sebagai penggantinya. |
| **Method overriding** | `Car` dan `Boat` menulis sendiri `refuel()`, sedangkan `Motor` memakai versi dari trait. |
| **Class tanpa interface** | `Building` hanya mewarisi `Vehicle`, jadi tidak punya `move()` maupun `refuel()`. Memanggilnya akan menghasilkan error. |

## Penjelasan Kode

### 1. `Vihicle.php` – Abstract class `Vehicle`

![Kode Vehicle](blob:https://web.whatsapp.com/b3c192ec-db22-43b5-ab55-1898ab153606)

Menyimpan `$name` sebagai `protected` agar bisa dipakai turunan, serta method `showInfo()` yang berlaku untuk semua kendaraan.

### 2. `Movable.php` dan `Fuelable.php` – Interface

![Kode Movable](blob:https://web.whatsapp.com/d5a8b6a3-a01d-4bb1-95c8-cdde066818aa)

![Kode Fuelable](blob:https://web.whatsapp.com/72e4eb3d-d2fb-4615-b493-c91efb0e5541)

`Movable` mewajibkan method `move()`, dan `Fuelable` mewajibkan method `refuel()`. Keduanya hanya berisi tanda tangan method, bukan isi.

### 3. `FuelableTrait.php` – Trait

![Kode FuelableTrait](blob:https://web.whatsapp.com/2ca27971-8b08-4b08-9744-8d3a122cd598)

Berisi implementasi bawaan `refuel()` yang mencetak "Mengisi bahan bakar umum." Class yang memakai trait ini otomatis memenuhi kewajiban `Fuelable` tanpa menulis ulang method-nya.

### 4. Class konkret

![Kode Car](blob:https://web.whatsapp.com/71aae20e-1572-4b1a-b86b-c42b1d00223c)

![Kode Boat](blob:https://web.whatsapp.com/2389f239-f710-4293-9495-48dee73297cf)

`Car` dan `Boat` meng-extend `Vehicle`, meng-implement `Movable` dan `Fuelable`, lalu menulis sendiri `move()` dan `refuel()`.

![Kode Motor](blob:https://web.whatsapp.com/aeb22b23-cca0-4360-8a90-63714941e069)

`Motor` juga meng-implement kedua interface, tetapi `refuel()`-nya datang dari `use FuelableTrait;`. Hanya `move()` yang ditulis sendiri.

![Kode Building](blob:https://web.whatsapp.com/aa936140-358a-4b89-9f6d-5b7af487b46c)

`Building` hanya meng-extend `Vehicle`. Tidak ada interface, sehingga gedung tidak bisa bergerak atau diisi bahan bakar.

### 5. `Main.php` – Program utama

![Kode Main.php](blob:https://web.whatsapp.com/3471a560-679a-4c57-b72f-f6f4e759550c)

Membuat empat object, lalu memanggil `showInfo()`, `move()`, dan `refuel()` pada mobil, perahu, dan motor. Untuk gedung hanya `showInfo()` yang dipanggil. Dua baris yang di-comment menunjukkan bahwa `move()` dan `refuel()` akan error pada `Building`.

## Hasil Output


```
Kendaraan: Mobil Sport
Mobil Sport bergerak di jalan.
Mobil SportIsi bahan bakar mobil

Kendaraan: Perahu Motor
Perahu Motor bergerak di air.
Perahu Motor mengisi bahan bakar solar khusus kapal.

Kendaraan: Motor Gravel
Motor Gravel bergerak di tanah gravel.
Mengisi bahan bakar umum.

Kendaraan: Gedung Tinggi
```

Beberapa hal yang terlihat dari output:

- Baris isi bahan bakar mobil tercetak **`Mobil SportIsi bahan bakar mobil`** (tanpa spasi) karena di `Car.php` teksnya ditulis `"Isi bahan bakar mobil"` tanpa spasi di depan. Kalau ingin rapi, ubah menjadi `" mengisi bahan bakar mobil"`.
- Motor mencetak "Mengisi bahan bakar umum." tanpa nama kendaraan, karena method itu berasal dari trait yang tidak mengakses `$name`.
- Gedung hanya menampilkan satu baris karena tidak punya method lain.

## Ringkasan Alur Program

1. `Main.php` memuat class `Car`, `Boat`, `Motor`, dan `Building` (yang masing-masing memuat `Vehicle`, interface, dan trait yang dibutuhkan).
2. Empat object dibuat dari class konkret.
3. Tiap kendaraan menjalankan `showInfo()` dari abstract class, serta `move()` dan `refuel()` sesuai implementasinya sendiri.
4. `Building` hanya menjalankan `showInfo()` karena tidak mengimplementasikan interface apa pun.
