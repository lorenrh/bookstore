<!--
    Alumna: Carmen Lorena Rangel Hernandez
    Profesor: Octavio Aguirre Lozano
    Materia: Computacion en el servidor web
    Laboratorio #1: Manejo de datos en el servidor e interacción con el cliente mediante una aplicación web
-->

<?php
// Include the model
require_once('model.php');
// get the data
$b = new Books();
$availableBooks =  $b->getAllBooks();
// Include the view
require('view.php');
?>