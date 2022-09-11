<?php

namespace App\Entity\FactoryMethod\Response;

use App\Entity\FactoryMethod\CarsActionInterface;

class CarsResponse
{
    public function __construct(private readonly CarsActionInterface $car){}


    public function flush(): void
    {
        $this->car->flush();
    }
}