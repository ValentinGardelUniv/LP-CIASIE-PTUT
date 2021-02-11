<?php
declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

use App\Application\Actions\HomeAction;

use App\Application\Actions\UserConnection\DisconnectAction;
use App\Application\Actions\UserConnection\LoginAction;
use App\Application\Actions\UserConnection\SignupAction;
use App\Application\Actions\UserConnection\ViewLoginAction;
use App\Application\Actions\UserConnection\ViewSignupAction;

use App\Application\Actions\UserProfil\UpdateProfilAction;
use App\Application\Actions\UserProfil\ViewProfilAction;

use App\Application\Actions\Exercises\{ExercisesListAction, ExercisePageAction, ExerciseCodePageAction, ExerciseSettingsAction,
    AddExerciseAction, UpdateExerciseAction, DelExerciseAction};

use App\Application\Actions\Groups\{GroupsListAction, GroupPageAction, GroupSettingsAction,
    AddGroupAction, UpdateGroupAction, DelGroupAction};

use App\Application\Middleware\LoggedMiddleware;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        return $response->withHeader('location', 'home');
    });

    $app->get('/home', HomeAction::class)->setName('home');

    $app->group('/login', function(Group $group){
        $group->get('', ViewLoginAction::class)->setName('login');
        $group->post('', LoginAction::class);
    });

    $app->get('/disconnect', DisconnectAction::class)->add(LoggedMiddleware::class)->setName('disconnect');

    $app->group('/signup', function(Group $group){
        $group->get('', ViewSignupAction::class)->setName('signup');
        $group->post('', SignupAction::class);
    });

    $app->group('/profil', function (Group $group) {
        $group->get('', ViewProfilAction::class)->setName('profil');
        $group->post('', UpdateProfilAction::class);
    })->add(LoggedMiddleware::class);

    $app->group('/exercises', function (Group $group) {
        $group->get('', ExercisesListAction::class)->setName('exercises');
        $group->get('/{id}', ExercisePageAction::class)->setName('exercise');
        $group->get('/{id}/code', ExerciseCodePageAction::class);
        $group->get('/{id}/settings', ExerciseSettingsAction::class);

        $group->post('', AddExerciseAction::class);
        $group->post('/{id}/update', UpdateExerciseAction::class);
        $group->post('{id}/delete', DelExerciseAction::class);
    });

    $app->group('/groups', function (Group $group) {
        $group->get('', GroupsListAction::class)->setName('groups');
        $group->get('/{id}', GroupPageAction::class)->setName('group');
        $group->get('/{id}/settings', GroupSettingsAction::class);

        $group->post('', AddGroupAction::class);
        $group->post('/{id}/update', UpdateGroupAction::class);
        $group->post('/{id}/delete', DelGroupAction::class);
    });
};