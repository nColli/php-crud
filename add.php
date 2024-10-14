<?php
require_once("pdo.php");
session_start();

if ( isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) ) {
    $sql = "insert into product (id,name,price) values (:id, :name, :price)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(array(
            ':id' => $_POST['id'],
            ':name' => $_POST['name'],
            ':price' => $_POST['price']
        ));
        $_SESSION['success'] = 'Record Added';
    } catch (\Throwable $th) {
        $_SESSION['error'] = 'Bad inputs';
    }
    
    header( 'Location: index.php' );
    return;
}
?>

<p>Add a New Product</p>
<form method="post">
    <p>ID: <input type="number" name="id"></p>
    <p>Name: <input type="text" name="name"></p>
    <p>Price: <input type="text" name="price"></p>
    <p><input type="submit" value="Add New">
    <a href="index.php">Cancel</a></p>
</form>
