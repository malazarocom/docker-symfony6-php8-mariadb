<?php

namespace App\EventListener\MovieDb;

use App\Entity\Film;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class fullDetailsUpdater
{
    public function postPersist(Film $film, LifecycleEventArgs $event): void
    {
    }
}
