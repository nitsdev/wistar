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
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!--username field-->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">User Name</label>
                    <input type="text" id="user_username" class="form-control" placeholder="enter your username" autocomplete="off" required="required" name="user_username"/>
                </div>
                <!--password field-->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">User password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="enter your password" autocomplete="off" required="required" name="user_password"/>
                </div>
                
                <div class="mt-4 pt-2">
                    <input type="submit" value="Login" class="bg-info border-0 py-2 px-3" name="user_login">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an Account ? <a href="user_registration.php"> Register</a></p>
                </div>

            </form>    
            </div>
        </div>
    </div>
    
</body>
</html>