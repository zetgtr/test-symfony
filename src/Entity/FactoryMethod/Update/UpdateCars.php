<?php

namespace App\Entity\FactoryMethod\Update;

use App\Entity\Cars;
use Doctrine\Persistence\ObjectManager;


class UpdateCars implements UpdateCarsInterface
{
    private Cars $repository;
    public function __construct(
        private readonly ObjectManager $entityManager,
        private readonly array $elementXML
    ){
        $this->repository = $this->entityManager->getRepository(Cars::class)->find($this->elementXML['id']);
    }

    public function update(): void
    {
        foreach ($this->elementXML as $key => $value) {
            switch ($key) {
                case 'mark':
                    if ($value !== $this->repository->getMark()) $this->repository->setMark($value);
                    break;
                case 'model':
                    if ($value !== $this->repository->getModel()) $this->repository->setModel($value);
                    break;
                case 'generation':
                    if ($value !== $this->repository->getGeneration()) $this->repository->setGeneration($value);
                    break;
                case 'year':
                    if ($value !== $this->repository->getYear()) $this->repository->setYear($value);
                    break;
                case 'run':
                    if ($value !== $this->repository->getRun()) $this->repository->setRun($value);
                    break;
                case 'color':
                    if ($value !== $this->repository->getColor()) $this->repository->setColor($value);
                    break;
                case 'body-type':
                    if ($value !== $this->repository->getType()) $this->repository->setType($value);
                    break;
                case 'engine-type':
                    if ($value !== $this->repository->getEngine()) $this->repository->setEngine($value);
                    break;
                case 'transmission':
                    if ($value !== $this->repository->getTransmission()) $this->repository->setTransmission($value);
                    break;
                case 'gear-type':
                    if ($value !== $this->repository->getGear()) $this->repository->setGear($value);
                    break;
                case 'generation_id':
                    if ($value !== $this->repository->getGenerationId()) $this->repository->setGenerationId($value);
                    break;
            }
        }
    }

    public function flush(): void
    {
        $this->update();
        $this->entityManager->flush();
    }
}