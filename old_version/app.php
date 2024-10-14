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
        //tablas users
        $pdo = $_SESSION["pdo"]; //set in login, database connection to database
        $sql = "select id, name, email from users";
        
        echo "<table>";

        echo "
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
        </tr>";

        echo "<tr>";
        foreach ($pdo->query($sql) as $row) {
            echo "<th>" . $row['id'] . "</th>\n";
            echo "<th>". $row['name'] . "</th>\n";
            echo "<th>". $row['email'] . "</th>\n";
            //renderizar boton de delete or update
            // echo "<th><button>Delete</button></th>";
        }
        echo "</tr>";
        echo "</table>";

    }
    ?></p>

</body>
</html>