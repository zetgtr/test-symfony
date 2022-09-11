<?php

namespace App\Controller;

use App\Entity\Cars;
use App\Entity\Crawler\CrawlerXML;
use App\Entity\CreateRepositoryId\CreateRepositoryId;
use App\Entity\FactoryMethod\CarsFactory;
use App\Entity\FactoryMethod\Enum\ActionType;
use App\Entity\FactoryMethod\Handlers\CarsHandler;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CarsParserController extends AbstractController
{
    private CrawlerXML $crawlerXML;
    private ObjectManager $entityManager;
    private ObjectRepository $repository;
    private CreateRepositoryId $createRepositoryId;
    private CarsFactory $carsFactory;
    private CarsHandler $carsHandler;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->carsFactory = new CarsFactory();
        $this->crawlerXML = new CrawlerXML();
        $this->carsHandler = new CarsHandler($this->carsFactory);
        $this->createRepositoryId = new CreateRepositoryId();
        $this->entityManager = $doctrine->getManager();
        $this->repository = $doctrine->getRepository(Cars::class);
    }

    public function start($xml): Response
    {
        $repositoryId = $this->createRepositoryId->create($this->repository);
        for($i = 0; $i< $this->crawlerXML->getCountCrawler($xml);$i++)
        {
            $elementXML = $this->crawlerXML->create($i, $xml);
            $repositoryId[$elementXML['id']] = false;
            if($this->repository->find($elementXML['id']))
            {
                $CarsResponse  = $this->carsHandler->handler(ActionType::UPDATE->value,$this->entityManager,$elementXML,$repositoryId);
            }else{
                $CarsResponse  = $this->carsHandler->handler(ActionType::INSERT->value,$this->entityManager,$elementXML,$repositoryId);
            }
            $CarsResponse->flush();
        }
        $CarsResponse = $this->carsHandler->handler(ActionType::REMOVE->value,$this->entityManager,[],$repositoryId);
        $CarsResponse->flush();
        return new Response('Выполнено!');
    }
}
