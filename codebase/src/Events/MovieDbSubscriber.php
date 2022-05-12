<?php

namespace App\Events;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use App\Service\MovieDb\GetFilmById;
use Symfony\Component\Serializer\SerializerInterface;

class MovieDbSubscriber implements EventSubscriberInterface
{
    private $entityManager;
    private $getFilmById;
    private $serializer;

    public function __construct(GetFilmById $getFilmById, EntityManagerInterface $entityManager, SerializerInterface $serializer)
    {
        $this->entityManager = $entityManager;
        $this->getFilmById = $getFilmById;
        $this->serializer = $serializer;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['setFullDetails', EventPriorities::PRE_VALIDATE],
        ];
    }

    public function setFullDetails(ViewEvent $event)
    {
        $film = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if ($film instanceof $film && $method === 'POST') {
            $movieDbId = $film->getMovieDbId();
            $fullDetails = ($this->getFilmById)($movieDbId);

            $jsonContent = $this->serializer->serialize($fullDetails, 'json');
            $jsonContent = json_decode($jsonContent, true);
            $film->setFullDetails($jsonContent);
            // $this->entityManager->persist($film);
            // $this->entityManager->flush();
        }
    }
}
