<?php
    include_once('database.php');
    if(isset($_POST['viewCartButton']))
    {
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
                <h2>Shopper View Cart Page</h2>
                <?php
                $shopper = $_POST['user'];
                $sql = "SELECT * FROM products WHERE product_id IN (SELECT product_id FROM cart WHERE shopper_name = '$shopper')";
                $result = $db->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>
                        <form action="buyNow.php" method="post">
                            <input type="hidden" name="user" value="<?php echo $shopper; ?>">
                            <input type="hidden" name="prodid" value="<?php echo $row['product_id']; ?>">
                            <h1><?php echo $row['product_name']; ?></h1>
                            <h3><?php echo $row['product_description']; ?></h3>
                            <h3>Available Products: <?php echo $row['product_available']; ?></h3>
                            <h3>Price: <?php echo $row['product_price']; ?> £</h3><br>
                            <input class="button" type="submit" value="BUY NOW">                       
                        </form>
                    <?php
                    }
                } else {
                    echo "0 Results Found. Add Some Product In Your Cart.";
                }
            ?>
            </div>
        </body>
    </html>
    <?php
    }
    else if (isset($_POST['viewOrderButton'])){?>
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
                <h2>Shopper View Orders Page</h2>
                <?php
                $shopper = $_POST['user'];
                $sql = "SELECT * FROM orders WHERE shopper_name = '$shopper'";
                $result = $db->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>
                        <div>
                            <h1>Product Name: <?php echo $row['product_name'] ?></h1>
                            <h3>Price: <?php echo $row['product_price'] ?>£</h3>
                        </div>
                    <?php
                    }
                } else {
                    echo "0 Results Found. Add Some Product In Your Cart.";
                }
    }?>