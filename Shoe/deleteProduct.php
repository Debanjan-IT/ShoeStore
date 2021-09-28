<?php
    include_once('database.php');
    $product = $_POST['prodname'];
    $user = $_POST['user'];
    $sql = "DELETE FROM products WHERE product_name='$product' AND seller_username = '$user'";
    if ($db->query($sql) === TRUE) {
        echo "Product deleted successfully.";
    } else {
        echo "Error deleting record: " . $db->error;
    }
?>