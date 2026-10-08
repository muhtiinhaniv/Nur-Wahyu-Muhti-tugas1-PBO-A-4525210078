<?php

// Trait menggantikan default method refuel() dari interface Fuelable di Java
trait FuelableTrait {
    public function refuel(): void {
        echo "Mengisi bahan bakar umum." . PHP_EOL;
    }
}