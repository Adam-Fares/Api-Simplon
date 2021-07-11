<?php

namespace App\Entity;

use DateTimeInterface;
use \PDOException;

class post {
    private $id;
    private $content; 
    private $author;
    private $date;

    public function __construct(string $content, string $author, DateTimeInterface $date, int $id = null) {
        $this->id = $id;
        $this->content = $content;
        $this->author= $author;
        $this->date = $date;
    }

    // Fonction pour la table "Post"

    public function getAllPost() {

        $connexion = getDatabaseConnexion();
        $request = 'SELECT * FROM post';
        $rows = $connexion->query($request);
        return $rows;
    }

    public function createPost($content, $author, $date) {

        try {
            $connexion = getDatabaseConnexion();
            $request = "INSERT INTO post (content, author, date)
                    VALUES ('$content', '$author', '$date')";
            $connexion->exec($request);
        }
        catch(PDOException $e) {
            echo $request . "<br>" . $e->getMessage();
        }
    }

    public function readPost($id) {

        $connexion = getDatabaseConnexion();
        $request = "SELECT * FROM post where id = '$id";
        $stmt = $connexion->query($request);
        $row = $stmt->fetchAll();
        if (!empty($row)) {
            return $row[0];
        }
    }

    public function updatePost($id, $content, $author, $date) {

            try {
            $connexion = getDatabaseConnexion();
            $request = "UPDATE post set
                        content = '$content',
                        author = '$author',
                        dat = '$date'
                        where id = '$id' ";
            $stmt = $connexion->query($request);
        }
        catch(PDOException $e) {
            echo $request . "<br>" . $e->getMessage();
        }
    }

    public function deletePost($id) {

        try {
            $connexion = getDatabaseConnexion();
            $request = "DELETE from post where id = '$id' ";
            $stmt = $connexion->query($request);
        } catch(PDOException $e) {
            echo $request . "<br>" . $e->getMessage();
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}