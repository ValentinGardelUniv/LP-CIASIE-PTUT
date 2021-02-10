<?php
declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    /** Example: */
    /*
    $app->group("/galerie", function(Group $group) {
        $group->get('/{id}', ViewGalerieAction::class)->setName('galerie');

        $group->get('/{id}/settings', SettingGalerieAction::class)->add(LoggedMiddleware::class);
        $group->post('/{id}/settings', UpdateGalerieAction::class)->add(LoggedMiddleware::class);
        $group->post('/{id}/delete', DeleteGalerieAction::class)->add(LoggedMiddleware::class);

        $group->get('/{id}/photos', ListGaleriePhotoAction::class);

        $group->get('/{id}/photo/{photo}', ViewPhotoAction::class)->setName('photo');

        $group->get('/{id}/photo/{photo}/settings', SettingPhotoAction::class)->add(LoggedMiddleware::class)->setName('photosettings');
        $group->post('/{id}/photo/{photo}/settings', UpdatePhotoAction::class)->add(LoggedMiddleware::class);
        $group->post('/{id}/photo/{photo}/delete', DeletePhotoAction::class)->add(LoggedMiddleware::class);
    });
    */
};
