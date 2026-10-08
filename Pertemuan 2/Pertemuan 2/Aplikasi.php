<?php
require_once 'Mahasiswa.php';

// // Menggunakan constructor tanpa parameter
// $mhs1 = new Mahasiswa();
// $mhs1->tampilkanInfo();
//
// echo PHP_EOL;
//
// // Menggunakan constructor dengan 2 parameter
// $mhs2 = new Mahasiswa("Budi", "12345678");
// $mhs2->setUmur(20); // Mengatur umur menggunakan setter
// $mhs2->tampilkanInfo();
//
// echo PHP_EOL;
//
// // Menggunakan constructor dengan 3 parameter
// $mhs3 = new Mahasiswa("Siti", "87654321", 22);
// $mhs3->tampilkanInfo();

$muhti = new Mahasiswa();
$muhti->tampilkanInfo();

// memberikan value Muhamad Aria Khalil Mirzahamzah ke property nama dari objek muhti
$muhti->setNama("Nur Wahyu Muhtiin Haniv");
echo "Nama : " . $muhti->getNama() . PHP_EOL;

$muhti->setNim("4525210078");
echo "NIM : " . $muhti->getNim() . PHP_EOL;

$muhti->setUmur(15);
echo "Umur : " . $muhti->getUmur() . PHP_EOL;

// Constructor lengkap
$hakim = new Mahasiswa("Arief Rahman Hakim", "4525210095", 19);
$hakim->tampilkanInfo();