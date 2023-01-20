<?php
    include('../includes/connect.php');
    include('../functions/common_function.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Registration</title>
    <!--- bootsrap CSS link--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!----- font awesome link--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!--username field-->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">User Name</label>
                    <input type="text" id="user_username" class="form-control" placeholder="enter your username" autocomplete="off" required="required" name="user_username"/>
                </div>
                <!--email field-->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">User Email</label>
                    <input type="email" id="user_email" class="form-control" placeholder="enter your email" autocomplete="off" required="required" name="user_email"/>
                </div>
                <!--image field-->
                <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">User Image</label>
                    <input type="file" id="user_image" class="form-control" required="required" name="user_image"/>
                </div>
                <!--password field-->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">User password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="enter your password" autocomplete="off" required="required" name="user_password"/>
                </div>
                <!--confirm password field-->
                <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">Confirm password</label>
                    <input type="password" id="conf_user_password" class="form-control" placeholder="confirm password" autocomplete="off" required="required" name="conf_user_password"/>
                </div>
                <!--address field-->
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">User Address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="enter your address" autocomplete="off" required="required" name="user_address"/>
                </div>
                <!--Contact field-->
                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">User Contact</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="enter your number" autocomplete="off" required="required" name="user_contact"/>
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class="bg-info border-0 py-2 px-3" name="user_register">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an Account ? <a href="user_login.php"> Login</a></p>
                </div>

            </form>    
            </div>
        </div>
    </div>
    
</body>
</html>

<!--php code-->
<?php
    if(isset($_POST['user_register'])){
        $user_username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];
        $conf_user_password=$_POST['conf_user_password'];
        $user_address=$_POST['user_address'];
        $user_contact=$_POST['user_contact'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];
        $user_ip=getIPAddress();

        // insert_query
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");
        $insert_query="insert into `user_table`(username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values ('$user_username','$user_email','$user_password','$user_image','$user_ip','$user_address','$user_contact')";
        $sql_execute=mysqli_query($con,$insert_query);
        if($sql_execute){
            echo "<script>alert('data inserted')</script>";
        }else{
            die(mysqli_error($con));
        }
    }

?>