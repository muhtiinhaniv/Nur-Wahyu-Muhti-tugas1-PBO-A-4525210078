<?php

require_once 'Pemain.php';

class Tim {
    private string $namaTim;

    /** @var Pemain[] */
    private array $daftarPemain;

    /**
     * @param Pemain[] $daftarPemain
     */
    public function __construct(string $namaTim, array $daftarPemain) {
        $this->namaTim = $namaTim;
        $this->daftarPemain = $daftarPemain;
    }

    public function tampilkanPemain(): void {
        echo "Tim " . $this->namaTim . " memiliki pemain:" . PHP_EOL;
        foreach ($this->daftarPemain as $pemain) {
            echo "- " . $pemain->getNama() . PHP_EOL;
        }
    }
}