<?php
include_once 'Dao.php';

class QuestionController
{

    /* On prends tout */
    public function lireData()
    {
        try {
            
            $dao = new Dao();
            
            $conn = $dao->openConnection();
            
            $sql = "SELECT id_question,question, FROM `question` ORDER BY id DESC";
            
            $resource = $conn->query($sql);
            
            $result = $resource->fetchAll(PDO::FETCH_ASSOC);
            
            $dao->closeConnection();
        } catch (PDOException $e) {
            
            echo "Il y'a eu une erreur de PDO: " . $e->getMessage();
        }
        if (! empty($result)) {
            return $result;
        }
    }

    /* La on prends que un id dans la bdd */
    public function lireSeul($id)
    {
        try {
            
            $dao = new Dao();
            
            $conn = $dao->openConnection();
            
            $sql = "SELECT id_question,question FROM `question` WHERE id_question=" . $id . " ORDER BY id DESC";
            
            $resource = $conn->query($sql);
            
            $result = $resource->fetchAll(PDO::FETCH_ASSOC);
            
            $dao->closeConnection();
        } catch (PDOException $e) {
            
            echo "Il y'a eu une erreur de PDO: " . $e->getMessage();
        }
        if (! empty($result)) {
            return $result;
        }
    }
        /* Ajouter une nouvelle question */
        public function ajoutQuestion($formArray)
        {
            $question = $_POST['question'];
            
            $dao = new Dao();
            
            $conn = $dao->openConnection();
            
            $sql = "INSERT INTO `question`(`question`) VALUES ('" . $question . "')";
            $conn->query($sql);
            $dao->closeConnection();
        }
                /* Ajouter une nouvelle question */
                public function ajoutReponse($formArray)
                {
                    $reponse = $_POST['reponse'];
                    $valide = $_POST['valide'];
                    
                    $dao = new Dao();
                    
                    $conn = $dao->openConnection();
                    
                    $sql = "INSERT INTO `reponse`(`reponse`, `valide`) VALUES ('" . $reponse . "', '" . $valide . "')";
                    $conn->query($sql2);
                    $dao->closeConnection();
                }
    /* Editez une question */
    public function edit($formArray)
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $url = $_POST['url'];
        $category = $_POST['category'];
        
        $dao = new Dao();
        
        $conn = $dao->openConnection();
        
        $sql = "UPDATE question SET title = '" . $title . "' , description='" . $description . "', url='" . $url . "', category='" . $category . "' WHERE id=" . $id;
        
        $conn->query($sql);
        $dao->closeConnection();
    }
        /* Supprimer une question de la bdd */
        public function delete($id)
        {
            $dao = new Dao();
            
            $conn = $dao->openConnection();
            
            $sql = "DELETE FROM `question` where id='$id'";
            
            $conn->query($sql);
            $dao->closeConnection();
        }
    }
    
?>