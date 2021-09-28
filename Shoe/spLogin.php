<?php
    include_once('database.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT shopper_id FROM shopper WHERE shopper_username = '$username' AND shopper_password = '$password'";
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
                    <a class="active" href="shopperLogin.html">Shopper Portal</a>
                    <a href="sellerLogin.html">Seller Portal</a>
                </div>
                <div class="home">
                    <h1 class="title">Shoe Selling Website</h1>
                    <form action="spProceed.php" method="post">
                        <input type="hidden" name="user" value="<?php echo $username; ?>">
                        <h1>Select A Category Of Product:</h1>
                        <select name="shoecat" class="input" require>
                            <option value="sneekers">SNEEKERS</option>
                            <option value="sports">SPORTS SHOES</option>
                            <option value="sandals">SANDALS</option>
                            <option value="sleepers">SLEEPERS</option>
                        </select>
                        <h1>Filter:</h1>
                        <select name="filter" class="input" require>
                            <option value="pricel2h">Price Low To High</option>
                            <option value="priceh2l">Price High To Low</option>
                        </select><br>
                        <input class="button" type="submit" value="SHOW SHOES">
                    </form>
                    <form action="viewCart.php" method="post">
                        <input type="hidden" name="user" value="<?php echo $username; ?>">
                        <input class="button" name="viewCartButton" type="submit" value="VIEW CART">
                        <input class="button" name="viewOrderButton" type="submit" value="VIEW ORDER">
                    </form>
                </div>
        <?php
    } else {
        echo "Wrong Password";
    }
?>
<a href="shopperLogin.html">Log Out..</a>
</body>
</html>