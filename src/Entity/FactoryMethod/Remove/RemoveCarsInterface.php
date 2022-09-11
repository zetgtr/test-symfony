<?php

namespace App\Entity\FactoryMethod\Remove;

use App\Entity\FactoryMethod\CarsActionInterface;

interface RemoveCarsInterface extends CarsActionInterface
{
    public function remove(): void;
}