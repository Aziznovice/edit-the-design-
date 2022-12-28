
    <?php include('partials-front/menu.php'); ?>

    <!-- items sEARCH Section Starts Here -->
   <!--  <section class="items-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>item-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Product.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section> -->
    <!--  sEARCH Section Ends Here -->



    <!-- MEnu Section Starts Here -->
    <section class="items-menu">
        <div class="container">
            <h2 class="text-center">Available Products</h2>

            <?php 
                //Display items that are Active
                $sql = "SELECT * FROM tbl_items WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the itemss are availalable or not
                if($count>0)
                {
                    //itemss Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="items-menu-box">
                            <div class="items-menu-img">
                                <?php 
                                    //CHeck whether image available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/items/<?php echo $image_name; ?>" alt="product-image" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="items-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="items-price">₱<?php echo $price; ?></p>
                                <p class="items-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>form.php?items_id=<?php echo $id; ?>" class="btn btn-primary">Buy Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //items not Available
                    echo "<div class='error'>items not found.</div>";
                }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- items Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>