<?php

namespace App\Entity;
use \PDOException;

class post {
    private $id;
    private $title;

    

    public function __construct(string $title,  int $id = null) {
        $this->id = $id;
        $this->title = $title;
 
    }

    // Fonction pour la table "Topic"

    public function getAllTopic() {

        $connexion = getDatabaseConnexion();
        $request = 'SELECT * FROM topic';
        $rows = $connexion->query($request);
        return $rows;
    }

    public function createTopic($title) {

        $connexion = getDatabaseConnexion();
        $request = "INSERT INTO topic (title)
                    VALUES ('$title')";
        $connexion->exec($request);
        
    }

    public function readTopic($id) {

        $connexion = getDatabaseConnexion();
        $request = "SELECT * FROM topic where id = '$id";
        $stmt = $connexion->query($request);
        $row = $stmt->fetchAll();
        if (!empty($row)) {
            return $row[0];
        }
    }

    public function updateTopic($id, $title) {

        try {
            $connexion = getDatabaseConnexion();
            $request = "UPDATE topic set
                        title = '$title'
                        where id = '$id' ";
            $stmt = $connexion->query($request);
        }
        catch(PDOException $e) {
            echo $request . "<br>" . $e->getMessage();
        }
    }

    public function deleteTopic($id) {

        try {
            $connexion = getDatabaseConnexion();
            $request = "DELETE from topic where id = '$id' ";
            $stmt = $connexion->query($request);
        } catch(PDOException $e) {
            echo $request . "<br>" . $e->getMessage();
        }
    } 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
}