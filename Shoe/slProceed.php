<?php
    $task = $_POST['task'];
    $username = $_POST['user'];
    if ($task == "addnewproduct"){?>
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
                <h2>Seller Add New Product Page</h2>
                <form action="addproduct.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="user" value="<?php echo $username; ?>">
                    <select name="category" class="input">
                        <option value="sneekers">SNEEKERS</option>
                        <option value="sports">SPORTS SHOES</option>
                        <option value="sandals">SANDALS</option>
                        <option value="sleepers">SLEEPERS</option>
                    </select>
                    <input class="input" type="text" name="prodname" placeholder="Enter Product Name." required><br>
                    <input type="file" name="image" id="image" accept="image/*" require><br>
                    <input class="input" type="text" name="quantity" placeholder="Enter Quantity Of Product Available." required>
                    <input class="input" type="text" name="desc" placeholder="Enter Description Of The Product." required><br>
                    <input class="input" type="text" name="price" placeholder="Enter Price Of The Product." required><br>
                    <input class="button" type="submit" value="ADD PRODUCT">
                </form>
            </div>
        </body>
        </html><?php
    }
    else if ($task == "updateproduct"){
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
                $sql = "SELECT * FROM products WHERE seller_username = '$username'";
                $result = $db->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    ?>
                    <form action="update.php" method="post">
                        <input type="hidden" name="user" value="<?php echo $username ?>">
                        <input class="input" type="text" name="prodname" value="<?php echo $row['product_name'] ?>" readonly><br>
                        <input class="button" type="submit" value="UPDATE">
                    </form><?php
                    }
                } else {
                    echo "0 Results Found. Add Some Products First.";
                }
                
                ?>
            </div>
        </body>
        </html><?php
    }
    else if ($task == "deleteproduct"){
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
                <h2>Seller Delete Product Page</h2>
                <?php
                $sql = "SELECT * FROM products WHERE seller_username = '$username'";
                $result = $db->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    ?>
                    <form action="deleteProduct.php" method="post">
                        <input type="hidden" name="user" value="<?php echo $username ?>">
                        <input class="input" type="text" name="prodname" value="<?php echo $row['product_name'] ?>" readonly><br>
                        <input class="button" type="submit" value="DELETE">
                    </form><?php
                    }
                } else {
                    echo "0 Results Found. Add Some Products First.";
                }
                
                ?>
            </div>
        </body>
        </html><?php
    }
    else if ($task == "viewproducts"){
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
                <h2>Seller View Products Page</h2>
                <?php
                $sql = "SELECT * FROM products WHERE seller_username = '$username'";
                $result = $db->query($sql);
                if ($result->num_rows > 0) {
                    ?>
                    <div class="container">
                    <?php
                  while($row = $result->fetch_assoc()) {
                    ?>
                        <div class="child">
                            <img src="images/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" style="height: 300px;width: 300px;">
                            <h1><?php echo $row['product_name']; ?></h1>
                            <h3><?php echo $row['product_description']; ?></h3>
                            <h3>Available Products: <?php echo $row['product_available']; ?></h3>
                            <h3>Price For One Pair: <?php echo $row['product_price']; ?>£</h3>
                        </div>
                    <?php
                    }
                } else {
                    echo "0 Results Found. Add Some Products First.";
                }
                
                ?>
                </div>
            </div>
        </body>
        </html><?php
    }
?>