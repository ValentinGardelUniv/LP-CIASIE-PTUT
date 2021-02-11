<?php


namespace App\Application\Actions\Groups;


use App\Application\Actions\Action;
use App\Domain\DomainException\DomainRecordNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpBadRequestException;

class GroupSettingsAction extends Action
{

    /**
     * route: GET /groups/{id}/settings
     * @return Response
     * @throws DomainRecordNotFoundException
     * @throws HttpBadRequestException
     */
    protected function action(): Response
    {
        return $this->response;
    }
}