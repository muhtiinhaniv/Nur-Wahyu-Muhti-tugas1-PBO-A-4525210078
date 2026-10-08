<?php

require_once 'BangunDatar.php';

class Lingkaran extends BangunDatar {
    // r atau jari-jari
    private int $r;

    public function __construct(int $r) {
        $this->r = $r;
    }

    public function luas(): float {
        return M_PI * $this->r * $this->r;
    }

    public function keliling(): float {
        return 2 * M_PI * $this->r;
    }
}