<!--
    Alumna: Carmen Lorena Rangel Hernandez
    Profesor: Octavio Aguirre Lozano
    Materia: Computacion en el servidor web
    Laboratorio #1: Manejo de datos en el servidor e interacción con el cliente mediante una aplicación web
-->

<?php
class Book
{
    public $id;
    public $title;
    public $author;
    public $quantity;
}

class Books
{
    public $cn;
    public $db;
    function __construct()
    {
        $hostname = "localhost";
        $database = "library";
        $username = "admin";
        $password = "admin";
        // Create connection
        $cn = new mysqli($hostname, $username, $password, $database);
        // Check connection
        if ($cn->connect_error) {
            die("Connection failed: " . $cn->connect_error);
        }
        $this->cn = $cn;
        $this->db = $database;
    }

    function __destruct()
    {
        $this->cn->close();
    }

    function getAllBooks()
    {
        $query  = "SELECT * FROM " . $this->db;
        $result = $this->cn->query($query);
        if (!$result) die("Error getting the database");

        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $a = array();

        foreach ($data as $book) {
            $obj = new Book();
            $obj->id = $book["id"];
            $obj->title = $book["Title"];
            $obj->author = $book["Author"];
            $obj->quantity = $book["Quantity"];

            array_push($a, $obj);
        }

        return $a;
    }

    function addBook($book)
    {
        $query  = "INSERT INTO library (Title, Author, Quantity) VALUES (' . $book->title . ',' . $book->author . ',' . $book->quantity .')";
        $result = $this->cn->query($query);
        $db = "library";
        if (!$result) {
            echo   $this->cn->error;
            die("Error getting the database");
        } else {
            echo "db updated";
            // header("Location: http://localhost/bookstore/controller.php");
        }
    }
}
