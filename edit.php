<?php
require_once("pdo.php");
session_start();

if ( isset($_POST['name']) && isset($_POST['price']) && isset($_POST['id']) ) {
    $sql = "UPDATE product SET name = :name, price = :price WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':price' => $_POST['price'],
        ':id' => $_POST['id']
    ));
    $_SESSION['success'] = 'Record updated';
    header('Location: index.php');
    return;
}

$sql = "SELECT id, name, price FROM product where id = :id";
$stmt = $pdo->prepare($sql);
$id = htmlentities($_GET['product_id']);
$stmt->execute(array(':id' => $id ));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row == false) {
    $_SESSION['error'] = "Bad value for product_id";    
    header('Location: index.php');
    return;
}

$n = htmlentities($row['name']);
$p = htmlentities($row['price']);
$i = $row['id'];
?>

<p>Edit Product</p>
<form method="post">
    <p>Name: 
        <input type="text" name="name" value="<?= $n ?>">
    </p>
    <p>Price: 
        <input type="text" name="price" value="<?= $p ?>">
    </p>
    <input type="hidden" name="id" value="<?= $i ?>">
    <p>
        <input type="submit" value="update">
        <a href="index.php">Cancel</a>
    </p>
</form>