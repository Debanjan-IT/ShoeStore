<?php
    include_once('database.php');
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
                <h2>Shopper View Products Page</h2>
                <?php
                $shopper = $_POST['user'];
                $cat = $_POST['shoecat'];
                $order = $_POST['filter'];

                if ($order == "pricel2h"){
                    $sql = "SELECT * FROM products WHERE product_category = '$cat' AND product_available>0 ORDER BY product_price";
                    $result = $db->query($sql);
                        if ($result->num_rows > 0) {
                            ?>
                            <div class="container">
                            <?php
                            while($row = $result->fetch_assoc()) {
                            ?>
                            <div class="child">
                                <form action="addToCart.php" method="post">
                                    <input type="hidden" name="user" value="<?php echo $shopper; ?>">
                                    <input type="hidden" name="prodid" value="<?php echo $row['product_id']; ?>">
                                    <img src="images/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" style="height: 200px;width: 300px;">
                                    <h1><?php echo $row['product_name']; ?></h1>
                                    <h3><?php echo $row['product_description']; ?></h3>
                                    <h3>Available Products: <?php echo $row['product_available']; ?></h3>
                                    <h3>Price: <?php echo $row['product_price']; ?> £</h3><br>
                                    <input class="button" type="submit" value="ADD TO CART">                       
                                </form>
                            </div>
                            <?php
                            }
                        } else {
                            echo "0 Results Found. Try some other category.";
                        }
                        ?>
                        </div><?php
                }
                else if ($order == "priceh2l"){
                    $sql = "SELECT * FROM products WHERE product_category = '$cat' ORDER BY product_price DESC";
                    $result = $db->query($sql);
                    if ($result->num_rows > 0) {
                        ?>
                        <div class="container">
                        <?php
                        while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="child">
                            <form action="addToCart.php" method="post">
                                <input type="hidden" name="user" value="<?php echo $shopper; ?>">
                                <input type="hidden" name="prodid" value="<?php echo $row['product_id']; ?>">
                                <img src="images/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" style="height: 200px;width: 300px;">
                                <h1><?php echo $row['product_name']; ?></h1>
                                <h3><?php echo $row['product_description']; ?></h3>
                                <h3>Available Products: <?php echo $row['product_available']; ?></h3>
                                <h3>Price: <?php echo $row['product_price']; ?> £</h3><br>
                                <input class="button" type="submit" value="ADD TO CART">                       
                            </form>
                        </div>
                        <?php
                        }
                    } else {
                        echo "0 Results Found. Try some other category.";
                    }
                    ?>
                    </div><?php
                }

            ?>