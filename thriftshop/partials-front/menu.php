<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THRIFT SHOP</title>

    <!-- Link our CSS file -->
    <script src="https://kit.fontawesome.com/8fbd521a76.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="<?php echo SITEURL; ?>" title="Logo">
                    <img src="images/troy.png" class="img-logo">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>items.php">Items</a>
                    </li>
                    <li>
                        <form action="<?php echo SITEURL; ?>item-search.php" class="form-search" method="POST">
                            <input type="search" name="search" placeholder="Search a Product.." required>
                            <input type="submit" name="submit" value="Search" class="btn btn-search">
                        </form>

                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->