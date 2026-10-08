<?php

require_once 'Car.php';
require_once 'Boat.php';
require_once 'Motor.php';
require_once 'Building.php';

// Membuat objek
$myCar = new Car("Mobil Sport");
$myBoat = new Boat("Perahu Motor");
$myMotor = new Motor("Motor Gravel");
$myBuilding = new Building("Gedung Tinggi");

// Menampilkan informasi dan menggerakkan kendaraan
$myCar->showInfo();
$myCar->move();
$myCar->refuel();

echo PHP_EOL; // Pembatas antar output

$myBoat->showInfo();
$myBoat->move();
$myBoat->refuel();

echo PHP_EOL;

$myMotor->showInfo();
$myMotor->move();
$myMotor->refuel();

echo PHP_EOL;

$myBuilding->showInfo();
// $myBuilding->move();    // Error: Building tidak mengimplementasikan Movable
// $myBuilding->refuel();  // Error: Building tidak mengimplementasikan Fuelable