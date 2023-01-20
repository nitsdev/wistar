<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--css file-->
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_image{
    width: 100px;
    object-fit: contain;
}
    .footer{
        position: absolute;
        bottom: 0; 
    }
</style>

</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!--first child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!--second child-->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!--third child-->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/logo.png" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center px-5">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info m-1">Insert Products</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info m-1">Insert Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info m-1">Insert Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">All Orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">All Paypents</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">List User</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">LogOut</a></button>
                </div>
            </div>
        </div>

        <!--- fourth child--->
            <div class="container my-3">
                <?php 
                if(isset($_GET['insert_category'])){
                    include('insert_categories.php');
                }
                if(isset($_GET['insert_brand'])){
                    include('insert_brands.php');
                }
                ?>
            </div>
        <!-- last child--->
<div class="bg-info p-3 text-center footer">
    <p>All rights reserved @ Designed by NiTs-2023</p>
</div> 
    </div>

<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
</body>
</html>