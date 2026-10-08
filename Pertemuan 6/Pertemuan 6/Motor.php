<?php

require_once 'Vehicle.php';
require_once 'Movable.php';
require_once 'Fuelable.php';
require_once 'FuelableTrait.php';

class Motor extends Vehicle implements Fuelable, Movable {
    // Memakai refuel() bawaan dari trait (setara default method di Java)
    use FuelableTrait;

    public function __construct(string $name) {
        parent::__construct($name);
    }

    public function move(): void {
        echo $this->name . " bergerak di tanah gravel." . PHP_EOL;
    }
}