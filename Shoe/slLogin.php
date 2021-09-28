<?php
    include_once('database.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT seller_id FROM seller WHERE seller_username = '$username' AND seller_password = '$password'";
    $result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);
    if($count == 1){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="style.css">
                <title>Shoe Selling Website</title>
            </head>
            <body>
                <div class="topnav">
                    <a href="index.html">Home</a>
                    <a href="shopperLogin.html">Shopper Portal</a>
                    <a class="active" href="sellerLogin.html">Seller Portal</a>
                </div>
                <div class="home">
                    <h1 class="title">Shoe Selling Website</h1>
                    <form action="slProceed.php" method="post">
                        <input type="hidden" name="user" value="<?php echo $username ?>">
                        <h1>Select A Task:</h1>
                        <select name="task" class="input" require>
                            <option value="addnewproduct">ADD NEW PRODUCT</option>
                            <option value="updateproduct">UPDATE PRODUCT</option>
                            <option value="deleteproduct">DELETE PRODUCT</option>
                            <option value="viewproducts">VIEW PRODUCTS</option>
                        </select><br>
                        <input class="button" type="submit" value="PROCEED">
                    </form>
                </div>
                
            </body>
            </html>
        <?php
    } else {
        echo "Wrong Password";
    }
?>
<a href="sellerLogin.html">Log Out..</a>
</body>
</html>