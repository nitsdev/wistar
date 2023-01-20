<!-- connect file-->
<?php
  include('includes/connect.php');
  include('functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WISTAR- Cart Details</title>
    <!--- bootsrap CSS link--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!----- font awesome link--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file--->
    <link rel="stylesheet" href="style.css">
    <style>
        .card_img{
    width: 80px;
    height: 80px;
    object-fit:contain;
}
    </style>
</head>
<body>
        <!--- navbar--->
        <div class="container-fluid p-0">
            <!--- first child--->
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img src="./images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- calling cart function-->
<?php
cart();
?>

<!-- second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
    </ul>
</nav>

<!-- third child-->
<div class="bg-light">
    <h3 class="text-center">Hidden store</h3>
    <p class="text-center">Communication is the heart of e_shop</p>
</div>

<!-- fourth child-->
<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
            
                <!-- displaying dynamic data-->
                <?php
                  global $con;
                  $ip = getIPAddress();
                  $total_price=0;
                  $cart_qurey="Select * from `cart_details` where ip_address='$ip'";
                  $result=mysqli_query($con,$cart_qurey);
                  $result_count=mysqli_num_rows($result);
                  if($result_count>0){
                    echo "<thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th colspan='2'>Operations</th>
                    </tr>
                </thead>
                <tbody>";
                  
                  while($row=mysqli_fetch_array($result)){
                    $product_id=$row['product_id'];
                    $select_products="Select * from `products` where product_id='$product_id'";
                    $result_products=mysqli_query($con,$select_products);
                    while($row_product_price=mysqli_fetch_array($result_products)){
                    $product_price=array($row_product_price['product_price']);
                    $price_table=$row_product_price['product_price'];
                    $product_title=$row_product_price['product_title'];
                    $product_image1=$row_product_price['product_image1'];
                    

                    $product_values=array_sum($product_price);
                    $total_price+=$product_values;     
                     
                ?>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" class="card_img"></td>
                    <td><input type="text" name="qty" class="form-input w-30"></td>
                    <?php
                    $ip = getIPAddress();
                    if(isset($_POST['update_cart'])){
                      $quantities=$_POST['qty'];
                      $update_cart="update `cart_details` set quantity=$quantities where ip_address='$ip'";
                      $result_products_quantity=mysqli_query($con,$update_cart);
                      $total_price=$total_price*$quantities;                       
                    }

                    ?>
                    <td><?php echo $price_table ?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id   ?>"></td>
                    <td>
                        <!-- <button class="bg-info px-3 border-0 mx-3">Update</button> -->
                        <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                        <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button>-->
                        <input type="submit" value="Remove Item" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                    </td>
                </tr>
                <?php  }}
                  }
                  
                  else{
                    echo "<h2 class='text-center text-danger'>Cart Is Empty</h2>";
                  }?>
            </tbody>
        </table>
        <!---subtotal-->
        <div class="d-flex mb-3">
        <?php
                  global $con;
                  $ip = getIPAddress();
                  $cart_qurey="Select * from `cart_details` where ip_address='$ip'";
                  $result=mysqli_query($con,$cart_qurey);
                  $result_count=mysqli_num_rows($result);
                  if($result_count>0){
                    echo "<h4 class='px-3'>Subtotal:  <strong class=text-info> $total_price /-</strong></h4>
                    <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                    <button class='border-0 p-3 py-2 bg-secondary'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                  }else{
                    echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
                  }

                  if(isset($_POST['continue_shopping'])){
                    echo "<script>window.open('index.php','_self')</script>";
                  }
        ?>
            </div>
    </div>
</div> 
</form>

<!--- function to remove item--->
<?php
  function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
      foreach($_POST['removeitem'] as $remove_id){
        echo $remove_id;
        $delete_query="Delete from `cart_details` where product_id=$remove_id";
        $run_delete=mysqli_query($con,$delete_query);
        if($run_delete){
          echo "<script>window.open('cart.php','_self')</script>";
        }
      }
    }
  }
  echo $remove_item=remove_cart_item();




?>






<!-- last child--->
 <!-- include footer-->
 <?php include("./includes/footer.php") ?>
        </div>

<!--- bootsrap js link---->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
 