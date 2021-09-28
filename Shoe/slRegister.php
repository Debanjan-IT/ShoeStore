<?php
    include_once('database.php');
    $fullname = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $sql = "INSERT INTO seller (seller_name, seller_username, seller_password) VALUES ('$fullname', '$username', '$password')";
    if($password == $cpassword){
        $sql2 = "SELECT seller_id FROM seller WHERE seller_username = '$username'";
        $result = mysqli_query($db,$sql2);
        $count = mysqli_num_rows($result);
        if($count == 0){
            if ($db->query($sql) === TRUE) {
                echo "Account created successfully. Please login to your account. ";
                ?><a href="sellerLogin.html">Click here..</a><?php
            } else {
                echo "Error: " . $sql . "<br>" . $db->error;
                ?><a href="sellerRegister.html">try again?</a><?php
            }
        }
        else{
            echo "Username already Taken. change it and ";?><a href="sellerRegister.html">try again?</a><?php
        }
    }
    else{
        echo "Password and confirm password must be same. ";
        echo "want to ";?><a href="sellerRegister.html">try again?</a><?php
    }
?>