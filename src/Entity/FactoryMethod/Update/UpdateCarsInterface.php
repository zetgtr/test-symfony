<?php

namespace App\Entity\FactoryMethod\Update;

use App\Entity\FactoryMethod\CarsActionInterface;

interface UpdateCarsInterface extends CarsActionInterface
{
    public function update(): void;
}