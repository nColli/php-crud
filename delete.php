<?php
require_once("pdo.php");
session_start();

if ( isset($_POST['product_id']) ) {
    $sql = "DELETE FROM product WHERE id = :delete_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':delete_id' => $_POST['product_id']
    ));
    $_SESSION['success'] = 'Record deleted';
    header('Location: index.php');
    return;
}

$stmt = $pdo->prepare("select id,name from product where id = :product_id");
$stmt->execute(array(':product_id' => $_GET['product_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row == false) {
    $_SESSION['error'] = 'Bad value for product_id';
    header('Location: index.php');
    return;
}
?>

<p>Confirm: Deleting <?= htmlentities($row['name']) ?></p>

<form method="post">
    <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
    <input type="submit" value="Delete">
    <a href="index.php">Cancel</a>
</form>