<html>

<head>
    <title> Tienda de libros online </title>
</head>

<body>
    <h1>Bienvenidos a mi tienda</h1>
    <h2>Listado de libros disponibles: </h2>

    <?php
    $availableBooks = array(
        'software engineering' => 1,
        'algorithms' => 3,
        'discrete and combinatorial mathematics' => -1,
        'the mythical man month' => 2,
        'do androids dream of electric sheep?' => 0,
    );

    echo '<ul>';
    foreach ($availableBooks as $book => $available) {
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
        echo '<li style="color:' . $color . ';">' . $prettyName . ', ' . $count . '</li>';
    }

    ?>

</body>

</html>