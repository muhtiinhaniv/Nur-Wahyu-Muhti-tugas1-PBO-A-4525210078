<?php

require_once 'Vehicle.php';
require_once 'Movable.php';
require_once 'Fuelable.php';

// Subclass dari Vehicle yang mengimplementasikan Movable dan Fuelable
class Car extends Vehicle implements Movable, Fuelable {
    public function __construct(string $name) {
        parent::__construct($name);
    }

    public function move(): void {
        echo $this->name . " bergerak di jalan." . PHP_EOL;
    }

    // Di Java, Car meng-override refuel() (bukan memakai default)
    public function refuel(): void {
        echo $this->name . "Isi bahan bakar mobil" . PHP_EOL;
    }
}