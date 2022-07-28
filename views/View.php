<?php

class View
{
    private $_file;
    private $_title_head;

    public function __construct($action)
    {
        $this->_file = "views/" . $action . "View.php";
    }

    // Génére et affiche la vue
    public function generate($data)
    {
        // Partie spécifique de la vue
        $content = $this->generateFile($this->_file, $data);

        // Template
        $view = $this->generateFile("views/template.php", array("title_head" => $this->_title_head, "content" => $content));

        echo $view;
    }

    // Génére un fichier vue et renvoie le résultat produit
    private function generateFile($file, $data)
    {
        if (file_exists($file)) {
            extract($data);

            ob_start();

            // Inclut le fichier vue
            require $file;

            return ob_get_clean();
        } else {
            throw new Exception("File " . $file . " not found");
        }
    }
}
