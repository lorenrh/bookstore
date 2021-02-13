<!--
    Alumna: Carmen Lorena Rangel Hernandez
    Profesor: Octavio Aguirre Lozano
    Materia: Computacion en el servidor web
    Laboratorio #1: Manejo de datos en el servidor e interacción con el cliente mediante una aplicación web
-->

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Nota: Bootstrap es utilizado para dar estilos a las etiquetas HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title> Tienda de libros online </title>
</head>
<style>
    .error {
        color: #FF0000;
    }
</style>

<body>
    <div class="jumbotron text-center">
        <h1>Bienvenidos a mi tienda</h1>
        <h2>Editar un libro: </h2>
    </div>

    <?php
    require_once('../model.php');
    // define variables and set to empty values
    $titleErr = $authorErr = "";
    $title = $author = $quantity = $id = "";
    $valid = true;
    $b = new Books();

    if(isset($_POST['id'])) { 
       $id = ($_POST["id"]);
    }

    // inicializar los valores para la actualizacion
    $fetched = $b->getBookById($id);
    $title = $fetched->title;
    $author= $fetched->author;
    $quantity = $fetched->quantity;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["title"])) {
            $titleErr = "se requiere de un titulo";
            $valid = false;
        } else {
            $title = test_input($_POST["title"]);
            // Verificar si solo tiene letras y espacios
            if (!preg_match("/^[a-zA-Z-' ]*$/", $title)) {
                $titleErr = "Solo se permiten caracteres alfanumericos";
                $valid = false;
            }
        }

        if (empty($_POST["author"])) {
            $authorErr = "se requiere de un autor";
            $valid = false;
        } else {
            $author = test_input($_POST["author"]);
            // verificar si solo tiene letras y espacios.
            if (!preg_match("/^[a-zA-Z-' ]*$/", $author)) {
                $authorErr = "Solo se permiten caracteres alfanumericos";
                $valid = false;
            }
        }

        if (empty($_POST["quantity"])) {
            $quantity = "0";
        }

        if ($valid) {
            $book = new Book();
            $book->title = $title;
            $book->author = $author;
            $book->quantity = $quantity;
            $b->updateBook($book);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Titulo: <input type="text" name="title" value="<?php echo $title; ?>">
        <span class="error">* <?php echo $titleErr; ?></span>
        <br><br>
        Autor: <input type="text" name="author" value="<?php echo $author; ?>">
        <span class="error">* <?php echo $authorErr; ?></span>
        <br><br>
        Cantidad: <input type="number" name="quantity" value="<?php echo $quantity; ?>">
        <br><br>

        <!-- <form action="model.php" method="post"> -->
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>