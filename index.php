<?php
require_once('pdo.php');
session_start();

$sql = 'select id, name, price from product';
$stmt = $pdo->query($sql);

?>

<html>
<head></head>

<body>
<?php
    if ( isset($_SESSION['error']) ) {
        echo '<p style="color:red">' . $_SESSION['error'] . "</p>\n"; //flash message
        unset($_SESSION['error']);
    }
    if ( isset($_SESSION['success']) ) {
        echo '<p style="color:green">' . $_SESSION['success'] . "</p>\n";
        unset($_SESSION['success']);
    }
    echo('<table border="1">' . "\n");

    echo "<tr>";
    echo "<th>ID</th> <th>Name</th> <th>Price</th> <th>Actions</th>";
    echo "</tr>";
    foreach ($stmt as $row) {
        echo "<tr><td>";
        echo(htmlentities($row['id']));
        echo "</td><td>";
        echo(htmlentities($row['name']));
        echo "</td><td>";
        echo(htmlentities($row['price']));
        echo "</td><td>";
        echo('<a href="edit.php?product_id='.$row['id'].'">Edit</a> / ');
        echo('<a href="delete.php?product_id='.$row['id'].'">Delete</a>');

        echo "</td></tr>";
    }
    echo "</table>";
?>
<p><a href="add.php">Add new product</a></p>
</body>

</html>