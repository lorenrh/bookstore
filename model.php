<!--
    Alumna: Carmen Lorena Rangel Hernandez
    Profesor: Octavio Aguirre Lozano
    Materia: Computacion en el servidor web
    Laboratorio #1: Manejo de datos en el servidor e interacción con el cliente mediante una aplicación web
-->

<?php

// clase de un solo libro para facilitar su manipulacion
class Book
{
    public $id;
    public $title;
    public $author;
    public $quantity;
}

// clase libros con la coneccion a la BD
// y sus metodos respectivos
class Books
{
    public $cn;
    public $db;
    // coneccion a la base de datos durante la creacion del objeto
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

    // una vez el objeto es destruido, la coexion a la BD se termina
    function __destruct()
    {
        $this->cn->close();
    }

    // Obtener la lista completa de libros
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

    // Obtener un solo libro
    function getBookById($id)
    {
        $query  = "SELECT * FROM " . $this->db." WHERE id=".$id;
        $result = $this->cn->query($query);
        if (!$result) die("Error getting the database");

        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $obj = new Book();
        foreach ($data as $book) {
            $obj->id = $book["id"];
            $obj->title = $book["Title"];
            $obj->author = $book["Author"];
            $obj->quantity = $book["Quantity"];
        }

        return $obj;
    }

    // agregar un solo libro a la BD
    function addBook($book)
    {
        $query  = "INSERT INTO ". $this->db ." (Title, Author, Quantity) VALUES (' $book->title','$book->author','$book->quantity')";
        $result = $this->cn->query($query);
        if (!$result) {
            echo   $this->cn->error;
            die("Error getting the database");
        } else {
            echo "db updated";
            header("Location: http://localhost/bookstore/controller.php");
        }
    }
    
    // Actualizar un solo libro a la BD
    function updateBook($book)
    {
        print_r($book);
       $query  = "UPDATE ". $this->db ." SET Title='$book->title', Author='$book->author', Quantity='$book->quantity' WHERE id=".$book->id;
       $result = $this->cn->query($query);
       if (!$result) {
           print_r($result);
           print_r($this->cn->error);
           die("Error getting the database");
       } else {
           echo "db updated";
           header("Location: http://localhost/bookstore/controller.php");
       }
   }

    // borrar un libro 
    function deleteBook($book)
    {
        $query  = "DELETE FROM ". $this->db ." WHERE id=".$book->id;
        $result = $this->cn->query($query);
        if (!$result) {
            echo   $this->cn->error;
            die("Error getting the database");
        } else {
            echo "db updated";
            header("Location: http://localhost/bookstore/controller.php");
        }
    }
}
