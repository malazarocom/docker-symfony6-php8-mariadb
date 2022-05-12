<?php

// src/ApiResource/MovieDbSearch.php

namespace App\ApiSource;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Action\NotFoundAction;
use ApiPlatform\Core\Annotation\ApiProperty;
use App\Model\Dto\MovieDb\GetMovieDbFilmResponse;
use App\Service\MovieDb\GetFilmById;

// #[ApiResource(
//     itemOperations: [
//         "get" => [
//             "controller" => GetFilmById::class,
//             "read" => true,
//             "output" => false,
//         ],
//     ],
//     collectionOperations: [],
//     output: GetMovieDbFilmResponse::class,
//     shortName: "movieDb"
// )]
class MovieDbSearch
{
    /**
     * @var string
     * @ApiProperty(identifier=true)
     */
    public $movieDbId;
}
