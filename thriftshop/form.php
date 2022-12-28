<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>form fill up</title>
<link rel="stylesheet" type="text/css" href="css/form.css">
</head>
<body>
    
    <?php 
        //CHeck whether produt id is set or not
        if(isset($_GET['items_id']))
        {
            //Get the items id and details of the selected
            $items_id = $_GET['items_id'];

            //Get the DEtails of the SElected items
            $sql = "SELECT * FROM tbl_items WHERE id=$items_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                //name not Availabe
                //REdirect to Home Page
                header('location:'.SITEURL);
            }
        }
        else
        {
            //Redirect to homepage
            header('location:'.SITEURL);
        }
    ?>

   <div class="wrapper" style="background-image: url('bg.jpg');">
<div class="inner">
<div class="image-holder">
   <?php
      if($image_name=="")
      {
         echo "<div class='error'>image is not available</div>";
      }
      else
      {
         ?>
         <img src="<?php echo SITEURL; ?>images/items/<?php echo $image_name; ?>" alt="product Image">
         <?php
      } 
   ?>
</div>
<form method="POST">
   <p class="form-msg">Please fill up the Form to confirm your Order</p>
   <div class="form-desc">

      <h3><?php echo $title; ?></h3>
      <input type="hidden" name="items" value="<?php echo $title; ?>">

      <p class="price">Price:  ₱ <?php echo $price;?></p>
      <input type="hidden" name="price" value="<?php echo $price; ?>">

      <p class="quantity">Quantity:  1</p>
      <input type="hidden" name="qty" class="input-responsive" value="1" required>

   </div>
<br>
<br>
<div class="form-wrapper">
<input type="text" name="full-name" placeholder="Enter Fullname" class="form-control">
</div>

<div class="form-wrapper">
<input type="email" name="email" placeholder="Email Address" class="form-control">
 </div>

<div class="form-wrapper">
<input type="number" name="contact" placeholder="enter phone number" class="form-control">


</div>
<div class="form-wrapper">
<textarea name="address" rows="10" placeholder="Enter Address" class="address">
</textarea>
</div>

<button type="submit" name="submit" value="Confirm Order">Confirm Order</button>
</form>

<?php 

                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    $items = $_POST['items'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty; // total = price x qty 

                    $order_date = date("Y-m-d h:i:sa"); //Order DAte

                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];


                    //Save the Order in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO tbl_order SET 
                        items = '$items',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2==true)
                    {
                        //Query Executed and Order Saved
                        $_SESSION['order'] = "<div class='success text-center'>Order Successfull</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order try again</div>";
                        header('location:'.SITEURL);
                    }

                }
            
            ?>


</div>
</div>
</body>
</html>



