<?php


namespace App\Application\Actions\Exercises;


use App\Application\Actions\Action;
use App\Domain\DomainException\DomainRecordNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpBadRequestException;

class ExercisesListAction extends Action
{

    /**
     * route: GET /exercises
     * @return Response
     * @throws DomainRecordNotFoundException
     * @throws HttpBadRequestException
     */
    protected function action(): Response
    {
        $exercises=[];
        $this->response->getBody()->write(
            $this->twig->render('ExercisesList.twig', ["exercises" => $exercises])
        );
        return $this->response;
    }
}