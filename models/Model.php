<?php

abstract class Model
{
    private static $_bdd;

    // Instancie la connexion à la BDD
    private static function setBdd()
    {
        self::$_bdd = new PDO("mysql:host=host;dbname=db_name;charset=utf8", "db_username", "db_password");
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // Récupère la connexion à la BDD
    protected function getBdd()
    {
        if (self::$_bdd == null) {
            self::setBdd();
            return self::$_bdd;
        }
    }

    protected function getAll($table, $obj)
    {
        $var = [];
        $req = $this->getBdd()->prepare("SELECT * FROM " . $table . " ORDER BY id DESC");
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $obj($data);
        }

        return $var;

        $req->closeCursor();
    }
}
