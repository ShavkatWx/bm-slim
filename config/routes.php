<?php

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


    $app->get(
        '/',
        function ($request, $response, $args) {
            $view = Twig::fromRequest($request);
            return $view->render($response, 'index.twig');
        }
    );

    $app->get(
        '/home-page',
        function ($request, $response, $args) {
            $view = Twig::fromRequest($request);
            return $view->render($response, 'template.twig', [
                'title' => "Главная страница",
            ]);
        }
    );
    $app->get(
        '/about-page',
        function ($request, $response, $args) {
            $view = Twig::fromRequest($request);
            return $view->render($response, 'template.twig', [
                'title' => "Страница о компании",
            ]);
        }
    );

    $app->get(
        '/b',
        function (ServerRequestInterface $request, ResponseInterface $response) {
            // $response->getBody()->write('Hello, World!');
            include "../App/form.php";
            return $response;
        }
    );








    function dataName($page)
    {
        $dataBase = new DataBase();
        return $dataBase->DataBaseConnect($page);
    }

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
