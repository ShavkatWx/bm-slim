<?php

// composer install --no-dev --optimize-autoloader

use App\DataBase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Views\TwigMiddleware;
use Slim\Views\Twig;

return function (App $app) {

    $twig = Twig::create('../templates', ['cache' => false]);
    $app->add(TwigMiddleware::create($app, $twig));

    function dataName($data)
    {
        $dataBase = new DataBase();
        return $dataBase->DataBaseSelect($data);
    }






    $app->get(
        '/',
        function ($request, $response, $args) {
            $view = Twig::fromRequest($request);
            return $view->render($response, 'index.twig');
        }
    );

    $app->get(
        '/projects',
        function ($request, $response, $args) {
            $data = dataName('project_test');
            $json = json_decode($data);
            $view = Twig::fromRequest($request);
            return $view->render($response, 'projects.twig', ['title' => 'Проекты', 'projects' => $json]);
        }
    );

    $app->get(
        '/add-project',
        function ($request, $response, $args) {
            $view = Twig::fromRequest($request);
            return $view->render($response, 'add-project.twig', [
                'title' => "Добавить проект",
            ]);
        }
    );


    $app->post(
        '/project/{id}',
        function ($request, $response, $args) {
            $view = Twig::fromRequest($request);
            include "../App/form.php";
            $id = $args['id'];
            return $view->render($response, 'add-project.twig', [
                'title' => $id,
            ]);
        }
    );



    $app->get(
        '/hf',
        function ($request, $response, $args) {
            return $response
                ->withHeader('Location', 'https://www.google.com')
                ->withStatus(302);
        }
    );


    $app->get(
        '/home-page-api',
        function (RequestInterface $request, ResponseInterface $response) {
            $data = dataName('home_page');
            $json = json_encode($data, JSON_UNESCAPED_SLASHES);
            $response->getBody()->write($json);
            return $response
                ->withHeader('Content-Type', 'application/json');
        }
    );

    $app->get(
        '/about-page-api',
        function (RequestInterface $request, ResponseInterface $response) {
            $data = dataName('about_page');
            $json = json_encode($data, JSON_UNESCAPED_SLASHES);
            $response->getBody()->write($json);
            return $response
                ->withHeader('Content-Type', 'application/json');
        }
    );

};



// $app->get(
//     '/about',
//     function (RequestI $request, ResponseInterface $response) {
//         $view = Twig::fromRequest($request);
//         return $view->render($this->response, 'about.twig', [
//             'test' => \Library\ClientToken::staticMethod()
//         ]);
//     }
// );
