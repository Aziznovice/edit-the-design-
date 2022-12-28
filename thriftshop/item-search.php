
    <?php include('partials-front/menu.php'); ?>

    <!-- sEARCH Section Starts Here -->
    <section class="items-search text-center">
        <div class="container">
            <?php 

                //Get the Search Keyword
                // $search = $_POST['search'];
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            
            ?>


            <h2>Result For: <a href="#" class="text-black">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- items sEARCH Section Ends Here -->



    <!-- items MEnu Section Starts Here -->
    <section class="items-menu">
        <div class="container">
            <h2 class="text-center">items Menu</h2>

            <?php 

                //SQL Query to Get items based on search keyword
                $sql = "SELECT * FROM tbl_items WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether items available of not
                if($count>0)
                {
                    //items Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="items-menu-box">
                            <div class="items-menu-img">
                                <?php 
                                    // Check whether image name is available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/items/<?php echo $image_name; ?>" class="img-responsive img-curve">
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
                    //items Not Available
                    echo "<div class='error'>items not found.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- items Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>