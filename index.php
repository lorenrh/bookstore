<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title> Tienda de libros online </title>
</head>

<body>
    <div class="jumbotron text-center">
        <h1>Bienvenidos a mi tienda</h1>
        <h2>Listado de libros disponibles: </h2>
    </div>

    <?php
    $availableBooks = array(
        'software engineering' => 1,
        'algorithms' => 3,
        'discrete and combinatorial mathematics' => -1,
        'the mythical man month' => 2,
        'do androids dream of electric sheep?' => 0,
        'inspired' => 7,
        'code' => 1,
        'neuromancer' => 0,
        'pattern classification' => 5,
        '1984' => 10,
    );

    echo '<ul class="list-group">';
    foreach ($availableBooks as $book => $count) {
        prettyPrint($book, $count);
    }
    echo '</ul>';

    function prettyPrint($book, $count)
    {
        $prettyName = ucwords($book);
        if ($count <= 0) {
            $color = 'red';
        } else {
            $color = 'green';
        }
        echo '<li class="list-group-item" style="color:' . $color . ';">' . $prettyName . ', ' . $count . '</li>';
    }

    ?>

</body>

</html>