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
        return $dataBase->DataBaseSelectAll($data);
    }
    function projectId($id)
    {
        $dataBase = new DataBase();
        return $dataBase->DataBaseSelect($id);
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
            // $json = json_decode($data);
            $view = Twig::fromRequest($request);
            return $view->render($response, 'projects.twig', ['title' => 'Проекты', 'projects' => $data]);
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
            return $view->render($response, 'update-project.twig', [
                'title' => $id,
                'project' => projectId($id)
            ]);
        }
    );


    $app->get(
        '/home-page',
        function ($request, $response, $args) {
            $data = dataName('home_page_test');
            include "../App/form.php";
            $view = Twig::fromRequest($request);
            return $view->render($response, 'page.twig', ['title' => 'Главная страница', 'page' => $data,'page_name'=>'home_page_test']);
        }
    );
    $app->get(
        '/about-page',
        function ($request, $response, $args) {
            $data = dataName('about_page_test');
            include "../App/form.php";
            $view = Twig::fromRequest($request);
            return $view->render($response, 'page.twig', ['title' => 'Страница о компании', 'page' => $data,'page_name'=>'about_page_test']);
        }
    );
    $app->post(
        '/page/{id}',
        function (ServerRequestInterface $request, ResponseInterface $response) {
            include "../App/form.php";
            return $response;
        }
    );;


    $app->post(
        '/form',
        function (ServerRequestInterface $request, ResponseInterface $response) {
            include "../App/form.php";
            return $response;
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
