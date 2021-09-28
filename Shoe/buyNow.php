<?php
    include_once('database.php');
    ?>
    <?php
    $shopper = $_POST['user'];
    $product = $_POST['prodid'];

    $sql = "SELECT * FROM products WHERE product_id = $product";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $quan = $row['product_available'];
            $price = $row['product_price'];
            $productName = $row['product_name'];
            $quan = $quan - 1;
            $deleteFromCart = "DELETE FROM cart WHERE shopper_name = '$shopper' AND product_id = $product";
            if ($db->query($deleteFromCart) === TRUE){
                $updateProductQuantity = "UPDATE products SET product_available=$quan WHERE product_id = $product";
                if ($db->query($updateProductQuantity) === TRUE){
                    $placeOrder = "INSERT INTO orders(shopper_name,product_id,product_name,product_price) VALUES ('$shopper',$product,'$productName',$price)";
                    if ($db->query($placeOrder) === TRUE) {
                        echo "Product Ordered Successfully. ";
                    } else {
                        echo "Error: " . $sql . "<br>" . $db->error;
                    }
                }
            }
        }
    }
?>