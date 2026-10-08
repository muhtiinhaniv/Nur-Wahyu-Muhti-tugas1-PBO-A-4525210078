<?php

require_once 'Handphone.php';

class Smartphone extends Handphone {

    public function __construct(string $merk, string $model) {
        parent::__construct($merk, $model);
    }

    public function nyalakan(): void {
        echo "Smartphone " . $this->merk . " " . $this->model . " sedang booting." . PHP_EOL;
    }

    public function matikan(): void {
        echo "Smartphone " . $this->merk . " " . $this->model . " sedang shutdown." . PHP_EOL;
    }

    public function telepon(string $nomor): void {
        echo "Melakukan panggilan video ke nomor " . $nomor . PHP_EOL;
    }

    public function aksesInternet(): void {
        echo "Mengakses internet melalui Smartphone." . PHP_EOL;
    }
}