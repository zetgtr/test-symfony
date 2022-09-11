<?php

namespace App\Entity\FactoryMethod\Insert;

use App\Entity\FactoryMethod\CarsActionInterface;

interface InsertCarsInterface extends CarsActionInterface
{
    public function insert(): void;
}