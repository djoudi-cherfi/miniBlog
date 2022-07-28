<?php

require_once("views/View.php");

class Router
{
    private $_controller;
    private $_view;

    public function routeReq()
    {
        try {
            // Chargement automatique des classes
            spl_autoload_register(function ($class) {
                require_once("models/".$class.".php");
            });
            
            $url = [];

            // Le controller est inclus selon l'action de l'utilisateur
            // Test url param => http://localhost/miniBlog/index.php?url=accueil
            if (isset($_GET["url"])) {
                $url = explode("/", filter_var($_GET["url"], FILTER_SANITIZE_URL));

                $controller = strtolower($url[0]);
                $controllerClass = $controller."Controller";
                $controllerFile = "controllers/".$controllerClass.".php";

                if (file_exists($controllerFile)) {
                    require_once($controllerFile);
                    $this->_controller = new $controllerClass($url);
                } else {
                    throw new Exception("Page not found");
                }
            } else {
                require_once("controllers/accueilController.php");
                $this->_controller = new accueilController($url);
            }
        } catch (Exception $e) {
            // Gestion des erreurs
            $errorMsg = $e->getMessage();

            $this->_view = new View("error");
            $this->_view->generate(array("errorMsg" => $errorMsg));
        }
    }
}
