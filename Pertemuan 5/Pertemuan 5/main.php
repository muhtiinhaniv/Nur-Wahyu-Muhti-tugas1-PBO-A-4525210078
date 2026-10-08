<?php

require_once 'Dokter.php';
require_once 'Pasien.php';
require_once 'Pemain.php';
require_once 'Tim.php';
require_once 'Buku.php';

/**
 * ASOSIASI
 */
$dokter = new Dokter("Dr. Andi");
$pasien = new Pasien("Budi");

// asosiasi. Pak Dokter merawat Pasien
$dokter->merawat($pasien);

/**
 * AGREGASI
 */
$pemain1 = new Pemain("Eko");
$pemain2 = new Pemain("Dina");

// Membuat Tim (Arrays.asList diganti array biasa)
$tim = new Tim("Garuda", [$pemain1, $pemain2]);
$tim->tampilkanPemain();

/**
 * KOMPOSISI
 */
$buku = new Buku("Belajar Java");
$buku->tampilkanBab();
// Jika buku dihancurkan, bab juga ikut hilang
$buku = null;