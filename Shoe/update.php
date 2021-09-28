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
                <a href="shopperLogin.html">Shopper Portal</a>
                <a class="active" href="sellerLogin.html">Seller Portal</a>
            </div>
            <div class="home">
                <h1 class="title">Shoe Selling Website</h1>
                <h2>Seller Update Product Page</h2>
                <?php
                $seller = $_POST['user'];
                $product = $_POST['prodname'];
                $sql = "SELECT * FROM products WHERE product_name = '$product' AND seller_username = '$seller'";
                $result = $db->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <form action="updateProduct.php" method="post">
                            <input type="hidden" name="user" value="<?php echo $seller ?>">
                            <input type="hidden" name="pid" value="<?php echo $row['product_id'] ?>">
                            <input class="input" type="text" name="prodname" value="<?php echo $row['product_name'] ?>">
                            <input class="input" type="text" name="proddesc" value="<?php echo $row['product_description'] ?>">
                            <input class="input" type="text" name="prodquantity" value="<?php echo $row['product_available'] ?>">
                            <input class="input" type="text" name="prodprice" value="<?php echo $row['product_price'] ?>"><br>
                            <input class="button" type="submit" value="UPDATE">
                        </form><?php
                    }
                } 
                ?>
            </div>
        </body>
        </html>

