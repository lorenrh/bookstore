<!--
    Alumna: Carmen Lorena Rangel Hernandez
    Profesor: Octavio Aguirre Lozano
    Materia: Computacion en el servidor web
    Laboratorio #1: Manejo de datos en el servidor e interacción con el cliente mediante una aplicación web
-->

<!-- punto de entrada de la applicacion
deberia ser index.html, pero se llamo
controller para mejor comporension del mcv -->

<?php
// incluir el modelo
require_once('model.php');
// obtener los datos
$b = new Books();
$availableBooks =  $b->getAllBooks();
// Incluir la vista
require('view/view.php');
?>