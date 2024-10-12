<!-- Model controller-->
<?php
require_once('pdo.php');
session_start();
if (isset($_POST["account"]) && isset($_POST["password"])) {
    unset($_SESSION["account"]);
    
    $user = $_POST["account"];
    $password = $_POST["password"];
    $host = "localhost";
    $database = "crud_database";
    $pdo_connection = new pdo_connection($user, $password, $host, $database);

    // logica verificar password y user
    if (verifyUser($user, $password)) {
        $_SESSION["account"] = $_POST["account"];
        $_SESSION["success"] = "Logged in."; // funciona como variable booleana porque compruebo si esta seteada con isset

        //Create connection wih verify user 
        $pdo = $pdo_connection->create_connection();
        $_SESSION["pdo"] = $pdo;

        header('Location: app.php');
        return;
    } else {
        $_SESSION["error"] = "Incorrect password.";
        header('Location: login.php');
        return;
    }
}

function verifyUser($user, $password) {
    //verificar usando htmlentities
    return true;
}

?>
<!-- View:-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CRUD app</title>
</head>
<body>
    <h1>Please Log In</h1>
    <?php
        if (isset($_SESSION["error"])) {
            echo('<p style="color:red">' . $_SESSION["error"] . "</p>\n");
            unset($_SESSION["error"]);
        }
        
        if (isset($_SESSION["success"])) {
            echo('<p style="color:green">' . $_SESSION["success"] . "</p>\n");
            unset($_SESSION["success"]);
        }
    ?>
    <form method="post">
        <p>Account: <input type="text" name="account" value=""></p>
        <p>Password: <input type="text" name="password" value=""></p>
        <p><input type="submit" value="Log In">
        <a href="app.php">Cancel</a>
        </p>
    </form>
</body>
</html>