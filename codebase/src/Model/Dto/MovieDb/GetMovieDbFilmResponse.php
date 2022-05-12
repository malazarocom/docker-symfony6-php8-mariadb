<?php

namespace App\Model\Dto\MovieDb;

class GetMovieDbFilmResponse
{
    /**
     * @param bool $adult
     * @param string $backdropPath
     * @param array<string,array<string,bool|string|int|float|int[]>> $genreIds
     * @param integer $id
     * @param string $originalLanguage
     * @param string $originalTitle
     * @param string $overview
     * @param float $popularity
     * @param string $posterPath
     * @param string $releaseDate
     * @param string $title
     * @param bool $video
     * @param float $voteAverage
     * @param integer $voteCount
     */
    public function __construct(
        public bool $adult,
        public string $backdropPath,
        public array $genreIds,
        public int $id,
        public string $originalLanguage,
        public string $originalTitle,
        public string $overview,
        public float $popularity,
        public string $posterPath,
        public string $releaseDate,
        public string $title,
        public bool $video,
        public float $voteAverage,
        public int $voteCount
    ) {
    }
}
