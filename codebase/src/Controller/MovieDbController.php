<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\MovieDb\GetFilmById;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class MovieDbController extends AbstractController
{
    #[Route('/web/moviedb/{movieDbId}', methods: ['GET'])]
    public function __invoke(GetFilmById $GetFilmById, Request $request): JsonResponse
    {
        $movieDbId = $request->get('movieDbId', null);

        if ($movieDbId === null) {
            throw new BadRequestHttpException('Please, specify an movieDbId');
        }

        $json = ($GetFilmById)($movieDbId);

        return new JsonResponse($json, Response::HTTP_OK);
    }
}
