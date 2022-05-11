<?php

namespace App\Service\MovieDb;

use App\Service\Utils\HttpClientInterface;
use App\Model\Dto\MovieDb\GetMovieDbFilmResponse;
use Exception;

class GetFilmById
{
    private HttpClientInterface $httpClient;
    private string $apiKey;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->apiKey = '152718166a0c49e6dcceb43f7d5bfc21';
    }

    public function __invoke(int $movieDb): GetMovieDbFilmResponse
    {
        $response = $this->httpClient->request(
            'GET',
            sprintf('https://api.themoviedb.org/3/movie/%d?api_key=%s&language=en-US', $movieDb, $this->apiKey)
        );

        $statusCode = $response->getStatusCode();

        if ($statusCode !== 200) {
            throw new Exception('Error getting film');
        }

        $content = $response->getContent();
        $json = json_decode($content, true);

        return new GetMovieDbFilmResponse(
            $json['adult'],
            $json['backdrop_path'],
            $json['genres'],
            $json['id'],
            $json['original_language'],
            $json['original_title'],
            $json['overview'],
            $json['popularity'],
            $json['poster_path'],
            $json['release_date'],
            $json['title'],
            $json['video'],
            $json['vote_average'],
            $json['vote_count'],
        );
    }
}
