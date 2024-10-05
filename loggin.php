<!-- Model controller-->
<?php
session_start();
if (isset($_POST["account"]) && isset($_POST["password"])) {
    unset($_SESSION["account"]);
    
    // logica verificar password y user
    if (TRUE) {
        $_SESSION["account"] = $_POST["account"];
        $_SESSION["success"] = "Logged in."; // funciona como variable booleana porque compruebo si esta seteada con isset
        header('Location: app.php');
        return;
    } else {
        $_SESSION["error"] = "Incorrect password.";
        header('Location: login.php');
        return;
    }
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