<?php
//Fitxer per gestionar les rutes
namespace Core;

use App\Controllers\GamesController;
use RuntimeException;

class Route
{
    //creem array en les rutes
    protected $routes = [];

    //creem funcio per afegir rutes a l'array
    public function register($route)
    {
        $this->routes[] = $route;
    }

    //funcio per rebre un array de rutes i assignar a la propietat routes
    public function define($route)
    {
        $this->routes = $route;
        return $this;
    }

    //funcio per redirigir la url solicitada a un controlador
    public function redirect($uri)
    {
        //partim la url
        $parts = explode('/', trim($uri,'/'));
        //indiquem ruta del controlador
        $controllerLanding = 'App\Controllers\LandingController';
        $controller = 'App\Controllers\FilmController';
        $controllerGames = 'App\Controllers\GamesController';
        //Inici
        if ($uri === '/') {
            require '../App/Controllers/LandingController.php';
            //creem nova instancia
            $controllerInstance = new $controllerLanding();
            return $controllerInstance->index();
        }
        if ($uri === '/home') {
            require '../App/Controllers/LandingController.php';
            //creem nova instancia
            $controllerInstance = new $controllerLanding();
            return $controllerInstance->index();
        }
        //Inici
        if ($uri === '/films') {
            require '../App/Controllers/FilmController.php';
            //creem nova instancia
            $controllerInstance = new $controller();
            return $controllerInstance->index();
        }
        else if ($uri === '/games') {
            require '../App/Controllers/GamesController.php';
            //creem nova instancia
            $controllerInstance = new $controllerGames();
            return $controllerInstance->index();
        }

        //create
        if($parts[0] === 'films' && $parts[1] === 'create') {
            require '../App/Controllers/FilmController.php';
            //creem nova instancia
            $controllerInstance = new $controller();
            return $controllerInstance->create();
        }
        //create
        else if($parts[0] === 'games' && $parts[1] === 'create') {
            require '../App/Controllers/GamesController.php';
            //creem nova instancia
            $controllerInstance = new $controllerGames();
            return $controllerInstance->create();
        }
        if($parts[0] === 'films' && $parts[1] === 'show' && isset($parts[2])) {
            require '../App/Controllers/FilmController.php';
            //creem nova instancia
            $controllerInstance = new $controller();
            return $controllerInstance->show($parts[2]);
        }
        else if($parts[0] === 'games' && $parts[1] === 'show' && isset($parts[2])) {
            require '../App/Controllers/GamesController.php';
            //creem nova instancia
            $controllerInstance = new $controllerGames();
            return $controllerInstance->show($parts[2]);
        }

        //Utilitzant POST guardem
        if ($parts[0]==='films' && $parts[1] === 'store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require '../App/Controllers/FilmController.php';
            //creem nova instancia
            $controllerInstance = new $controller();
            //creem variable per agafar les dades de la petició post
            $data = $_POST;
            return $controllerInstance->store($data);
        }
        else if ($parts[0]==='games' && $parts[1] === 'store' && $_SERVER['REQUEST_METHOD'] === 'POST') {

            require '../App/Controllers/GamesController.php';
            //creem nova instancia
            $controllerInstance = new $controllerGames();
            //creem variable per agafar les dades de la petició post
            $data = $_POST;
            return $controllerInstance->store($data);
        }

        //delete en GET  mirem que sigue delete en la id
        if($parts[0] === 'films' && $parts[1] === 'delete' && isset($parts[2])) {
            require '../App/Controllers/FilmController.php';
            //creem nova instancia
            $controllerInstance = new $controller();
            return $controllerInstance->delete($parts[2]);
        }
        else if($parts[0] === 'games' && $parts[1] === 'delete' && isset($parts[2])) {

            require '../App/Controllers/GamesController.php';
            //creem nova instancia
            $controllerInstance = new $controllerGames();
            return $controllerInstance->delete($parts[2]);
        }


        //destroy en POST
        if ($parts[0] === 'films' && $parts[1] === 'destroy' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require '../App/Controllers/FilmController.php';
            //creem nova instancia
            $controllerInstance = new $controller();
            //comprovem si pasen id
            if (!isset($_POST['id'])){
                throw new RuntimeException('No id provided');
            }
            return $controllerInstance->destroy($_POST['id']);
        }
        else if ($parts[0] === 'games' && $parts[1] === 'destroy' && $_SERVER['REQUEST_METHOD'] === 'POST') {

            require '../App/Controllers/GamesController.php';
            //creem nova instancia
            $controllerInstance = new $controllerGames();
            //comprovem si pasen id
            if (!isset($_POST['id'])){
                throw new RuntimeException('No id provided');
            }
            return $controllerInstance->destroy($_POST['id']);
        }


        //edit en GET
        if($parts[0] === 'films' && $parts[1] === 'edit' && isset($parts[2])) {

            require '../App/Controllers/FilmController.php';
            //creem nova instancia
            $controllerInstance = new $controller();
            return $controllerInstance->edit($parts[2]);
        }
        else if($parts[0] === 'games' && $parts[1] === 'edit' && isset($parts[2])) {

            require '../App/Controllers/GamesController.php';
            //creem nova instancia
            $controllerInstance = new $controllerGames();
            return $controllerInstance->edit($parts[2]);
        }

        //Actualitzar en POST
        if ($parts[0] =='films' && $parts[1] === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require '../App/Controllers/FilmController.php';
            //creem nova instancia
            $controllerInstance = new $controller();
            //creem variable per agafar les dades de la petició post
            $data = $_POST;
            //comprovem si pasen id
            if (!isset($_POST['id'])){
                throw new RuntimeException('No id provided');
            }
            return $controllerInstance->update($_POST['id'], $data);
        }
        else if ($parts[0] =='games' && $parts[1] === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require '../App/Controllers/GamesController.php';
            //creem nova instancia
            $controllerInstance = new $controllerGames();
            //creem variable per agafar les dades de la petició post
            $data = $_POST;
            //comprovem si pasen id
            if (!isset($_POST['id'])){
                throw new RuntimeException('No id provided');
            }
            return $controllerInstance->update($_POST['id'], $data);
        }

        //si no es cap dels anteriors retornem la vista 404
        return require '../resources/views/errors/404.blade.php';


//        //si ruta no existeix redirigim a vista d'error
//        if(!array_key_exists($uri, $this->routes)) {
//            require '../resources/views/errors/404.php';
//            return $this;
//        }
//
//        //si no troba el controlador
//        if (!file_exists($this->routes[$uri])) {
//            throw new RuntimeException("No s'ha trobat el controlador:". $this->routes[$uri]);
//        }
//
//        require $this->routes[$uri];
//        return $this;
    }

}