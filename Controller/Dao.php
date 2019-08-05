<?php

class Dao
{

    private $server = "mysql:host=localhost;dbname=exercice208";

    private $user = "yonirenaux";

    private $pass = "root";

    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );

    protected $con;

    /* Fonction d'ouverture de bdd */
    public function openConnection()

    {
        try
        {

            $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);

            return $this->con;
        }
        catch (PDOException $e)
        {

            echo "Il y'a un probléme dans la connexion: " . $e->getMessage();
        }
    }

    /* Fonction de fermeture de bdd */
    public function closeConnection()
    {
        $this->con = null;
    }
}
?>
