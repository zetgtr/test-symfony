<?php

namespace App\Entity\FactoryMethod\Remove;

use App\Entity\Cars;
use Doctrine\Persistence\ObjectManager;

class RemoveCars implements RemoveCarsInterface
{
    public function __construct(
       private readonly ObjectManager $entityManager,
       private readonly array $repositoryId
    )
    {}

    public function remove(): void
    {
        foreach ($this->repositoryId as $key=>$value)
        {
            if($value)
            {
                $car = $this->entityManager->getRepository(Cars::class)->find($key);
                $this->entityManager->remove($car);
            }
        }
    }

    public function flush(): void
    {
        $this->remove();
        $this->entityManager->flush();
    }
}