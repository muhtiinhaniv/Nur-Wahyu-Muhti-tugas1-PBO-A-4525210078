<?php

require_once 'Handphone.php';

class FeaturePhone extends Handphone {

    public function __construct(string $merk, string $model) {
        parent::__construct($merk, $model);
    }

    public function nyalakan(): void {
        echo "Feature Phone " . $this->merk . " " . $this->model . " dinyalakan." . PHP_EOL;
    }

    public function matikan(): void {
        echo "Feature Phone " . $this->merk . " " . $this->model . " dimatikan." . PHP_EOL;
    }

    public function telepon(string $nomor): void {
        echo "Melakukan panggilan suara ke nomor " . $nomor . PHP_EOL;
    }

    public function mainGameSnake(): void {
        echo "Memainkan game Snake." . PHP_EOL;
    }
}