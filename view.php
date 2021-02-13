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

<body>
    <div class="jumbotron text-center">
        <h1>Bienvenidos a mi tienda</h1>
        <h2>Listado de libros disponibles: </h2>
    </div>

    <?php
    echo '<ul class="list-group">';
    // estructura de control foreach
    foreach ($availableBooks as $book) {
        // Ejemplo de una funcion en PHP
        prettyPrint($book);
    }
    echo '</ul>';

    // Declaracion de la funcion
    function prettyPrint($book)
    {
        // Funcion de cadenas
        $prettyName = ucwords($book->title);
        // Estructura de control if
        if ($book->quantity <= 0) {
            $color = 'red';
        } else {
            $color = 'green';
        }
        echo '<li class="list-group-item" style="color:' . $color . ';">' . $prettyName . ', ' . $book->author . ', ' . $book->quantity . '</li>';
    }
    ?>

    <form action="form.php" method="post">
        <input type="submit" value=" Agregar un libro" />
    </form>

</body>

</html>