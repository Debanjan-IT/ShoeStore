<?php
    include_once('database.php');
    $user = $_POST['user'];
    $category = $_POST['category'];
    $productName = $_POST['prodname'];
    $productDesc = $_POST['desc'];
    $productQuant = $_POST['quantity'];
    $productPrice = $_POST['price'];
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];   
    $folder = "images/".$filename;


    $sql = "INSERT INTO products (product_category, seller_username,product_image, product_name, product_description, product_available, product_price) VALUES ('$category','$user','$filename', '$productName', '$productDesc', $productQuant, $productPrice)";
    mysqli_query($db, $sql);
    if (move_uploaded_file($tempname, $folder))  {
        echo "Product Added successfully";
    }else{
        echo "Failed to upload image";
    }
?>