    <?php include('partials-front/menu.php'); ?>

    <section class="item-search text-center text-white">
      <div class="text_image">
        <h1>Hand Picked Thrifted clothes</h1>
        <p>MY name is Troy the all item listed is carefully handpick to give almost branew expercience</p>
      </div>
    </section>
    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        } 
    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">FEATURED CATEGORIES</h2>

            <?php 
                //Create SQL Query to Display CAtegories from Database
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                //Count rows to check whether the category is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values like id, title, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>category-items.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    //Check whether Image is available or not
                                    if($image_name=="")
                                    {
                                        //Display MEssage
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" class="categ-img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="categ-float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //Categories not Available
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <section class="items-menu">
        <div class="container">
            <h2 class="text-center">FEATURED PRODUCT</h2>

            <?php 
        
            //SQL Query
            $sql2 = "SELECT * FROM tbl_items WHERE active='Yes' AND featured='Yes' LIMIT 6";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //CHeck whether Product available or not
            if($count2>0)
            {
                //items Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="items-menu-box">
                        <div class="items-menu-img">
                            <?php 
                                //Check whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not available.</div>";
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
                //Not Available 
                echo "<div class='error'>Product is not available.</div>";
            }
            
            ?>

            

 

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
           <a href="<?php echo SITEURL; ?>items.php">View all Products</a>
        </p>
    </section>
    <!-- Menu Section Ends Here -->

    
    <?php include('partials-front/footer.php'); ?>