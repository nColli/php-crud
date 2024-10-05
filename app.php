<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD app</title>
</head>
<body>
    <p>
    <?php
    if (isset($_SESSION["logged"])) {
        echo('Please, <a href="login.php">log in</a>');
    } else {
        echo('Test log');

        //tablas users


    }
    ?></p>

</body>
</html>