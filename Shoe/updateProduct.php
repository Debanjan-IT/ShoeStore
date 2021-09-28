<?php
    include_once('database.php');
    $seller = $_POST['user'];
    $ppid = $_POST['pid'];
    $prodName = $_POST['prodname'];
    $prodDesc = $_POST['proddesc'];
    $prodQuan = $_POST['prodquantity'];
    $prodPrice = $_POST['prodprice'];
    $sql = "UPDATE products SET product_price=$prodPrice,product_name ='$prodName',product_description='$prodDesc',product_available=$prodQuan  WHERE product_id='$ppid' AND seller_username = '$seller'";
    if ($db->query($sql) === TRUE) {
        echo "Product updated successfully.";
    } else {
        echo "Error updating record: " . $db->error;
    }
?>