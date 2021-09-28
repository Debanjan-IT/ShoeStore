<?php
    include_once('database.php');
    $shopper = $_POST['user'];
    $product = $_POST['prodid'];
    $sql = "INSERT INTO cart (shopper_name, product_id) VALUES ('$shopper', $product)";
    if ($db->query($sql) === TRUE) {
        echo "Successfully Product Added To Cart. ";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

?>