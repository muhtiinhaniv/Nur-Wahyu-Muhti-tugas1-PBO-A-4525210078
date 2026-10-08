<?php

require_once 'Bab.php';

class Buku {
    private string $judulBuku;

    /** @var Bab[] */
    private array $daftarBab;

    public function __construct(string $judulBuku) {
        $this->judulBuku = $judulBuku;
        $this->daftarBab = [];
        $this->tambahBab();
    }

    // Bab dibuat di dalam Buku (komposisi)
    private function tambahBab(): void {
        $this->daftarBab[] = new Bab("Pendahuluan");
        $this->daftarBab[] = new Bab("Isi");
        $this->daftarBab[] = new Bab("Penutup");
    }

    public function tampilkanBab(): void {
        echo "Buku " . $this->judulBuku . " memiliki bab:" . PHP_EOL;
        foreach ($this->daftarBab as $bab) {
            echo "- " . $bab->getJudulBab() . PHP_EOL;
        }
    }
}