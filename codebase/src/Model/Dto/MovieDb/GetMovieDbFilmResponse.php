<?php

namespace App\Model\Dto\MovieDb;

class GetMovieDbFilmResponse
{
    public function __construct(
        public bool $adult,
        public string $backdropPath,
        public iterable $genreIds,
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
