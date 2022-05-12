<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource(
    collectionOperations: ['get', 'post'],
    itemOperations: ['get'],
    shortName: "vhs"
)]
class Film
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column]
    public ?int $movieDbId = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    public string $name = '';

    /**
     * @var array<string,array<string,bool|string|int|float|int[]>>
     * }
     */
    #[ORM\Column]
    public array $fullDetails;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return integer|null
     */
    public function getMovieDbId(): ?int
    {
        return $this->movieDbId;
    }

    /**
     * @return array<string,array<string,bool|string|int|float|int[]>>
     */
    public function getFullDetails()
    {
        return $this->fullDetails;
    }

    /**
     *
     * @param array<string, array<string, array<int>|bool|float|int|string>> $fullDetails
     */
    public function setFullDetails(array $fullDetails): self
    {
        $this->fullDetails = $fullDetails;

        return $this;
    }
}
