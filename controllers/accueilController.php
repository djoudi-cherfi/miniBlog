<?php

require_once("views/View.php");

class accueilController
{
    private $_postManager;
    private $_view;

    public function __construct($url)
    {
        // Nombre de parms autorisés => count($url) > 1
        if (isset($url) && count($url) > 1) {
            throw new Exception("Page not found");
        } else {
            $this->posts();
        }
    }

    private function posts()
    {
        $this->_postManager = new PostManager;
        $posts = $this->_postManager->getAllPost();

        $this->_view = new View("accueil");
        $this->_view->generate(array("posts" => $posts));
    }
}
