<?php

require_once "../dbcon.php";

session_start();

if(isset($_SESSION["student_login"])){
    header("location: index.php");
}

if(isset($_POST["student_register"])){

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $roll = $_POST["roll"];
    $reg = $_POST["reg"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];

    $input_errors = array();

    if(empty($fname)){
        $input_errors["fname"] = "First name field is required!";      
    }

    if(empty($lname)){  
        $input_errors["lname"] = "Last name field is required!";       
    }

    if(empty($roll)){   
        $input_errors["roll"] = "Roll name field is required!";     
    }

    if(empty($reg)){   
        $input_errors["reg"] = "Reg name field is required!";    
    }

    if(empty($email)){ 
        $input_errors["email"] = "Email name field is required!";    
    }
    
    if(empty($username)){  
        $input_errors["username"] = "Username name field is required!";   
    }

    if(empty($password)){   
        $input_errors["password"] = "Password name field is required!";   
    }

    if(empty($phone)){
        $input_errors["phone"] = "Phone name field is required!";  
    }

    
    if(count($input_errors) == 0){

        $email_check = mysqli_query($con, "SELECT * FROM `students` WHERE `email` = '$email' ");
        
        if(mysqli_num_rows($email_check) == 0){
            
            $username_check = mysqli_query($con, "SELECT * FROM `students` WHERE `username` = '$username' ");

            if(mysqli_num_rows($username_check) == 0){

                if(strlen($username) > 7){
                    
                    if(strlen($password) > 7){
                        
                        //$password_hash = password_hash($password, PASSWORD_DEFAULT);
                        //$password_hash = $password;

                        $db_result = mysqli_query($con, "INSERT INTO `students`(`fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `status`, `phone`) VALUES ('$fname','$lname','$roll','$reg','$email','$username','$password','1','$phone') ");
                
                        if($db_result){
                    
                            $success = "Registration successfull!";
                    
                        }else{
                    
                            $error = "Something wrong!";
                    
                        }        
                        
                    }else{
                        $password_error = "Password more than 8 characters!"; 
                    }
                    
                }else{
                    $usernae_error = "Username more than 8 characters!";
                }
                
            }else{
                $username_exists = "Username already exists!";
            }
 
        }else{
            $email_exists = "Email already exixts!";
        }
    }
}

?>

<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS</title>
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--------------------- Font awesome cdn ------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <h1 class="text-center">LMS</h1>

            <?php
            
            if(isset($success)){
                ?>

                <div class="alert alert-info" role="alert">
                    <?= $success; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php
            }
            
            ?>

            <?php
            
            if(isset($error)){
                ?>

                <div class="alert alert-info" role="alert">
                    <?= $error; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php
            }
            
            ?>

        </div>

        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="fname" placeholder="Fname name" value="<?= isset($fname) ? $fname:''; ?>" >
                                <i class="fa fa-user"></i>
                            </span>

                            <?php if(isset($input_errors["fname"])){ echo "<span class='text-danger' >".$input_errors["fname"]."</span>"; } ?>

                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="lname" placeholder="Last name" value="<?= isset($lname) ? $lname:''; ?>" >
                                <i class="fa fa-user"></i>
                            </span>

                            <?php if(isset($input_errors["lname"])){ echo "<span class='text-danger' >".$input_errors["lname"]."</span>"; } ?>

                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="roll" placeholder="Roll" pattern="[0-9]{6}" value="<?= isset($roll) ? $roll:''; ?>" >
                                <i class="fa-solid fa-id-card"></i>
                            </span>

                            <?php if(isset($input_errors["roll"])){ echo "<span class='text-danger' >".$input_errors["roll"]."</span>"; } ?>

                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="reg" placeholder="Reg" pattern="[0-9]{6}" value="<?= isset($reg) ? $reg:''; ?>" > 
                                <i class="fa-solid fa-registered"></i>
                            </span>

                            <?php if(isset($input_errors["reg"])){ echo "<span class='text-danger' >".$input_errors["reg"]."</span>"; } ?>

                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?= isset($email) ? $email:''; ?>" >
                                <i class="fa fa-envelope"></i>
                            </span>

                            <?php if(isset($input_errors["email"])){ echo "<span class='text-danger' >".$input_errors["email"]."</span>"; } ?>
                            <?php if(isset($email_exists)){ echo "<span class='text-danger' >".$email_exists."</span>"; } ?>

                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?= isset($username) ? $username:''; ?>" >
                                <i class="fa fa-user"></i>
                            </span>

                            <?php if(isset($input_errors["username"])){ echo "<span class='text-danger' >".$input_errors["username"]."</span>"; } ?>
                            <?php if(isset($username_exists)){ echo "<span class='text-danger' >".$username_exists."</span>"; } ?>
                            <?php if(isset($usernae_error)){ echo "<span class='text-danger' >".$usernae_error."</span>"; } ?>

                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <i class="fa fa-key"></i>
                            </span>

                            <?php if(isset($input_errors["password"])){ echo "<span class='text-danger' >".$input_errors["password"]."</span>"; } ?>
                            <?php if(isset($password_error)){ echo "<span class='text-danger' >".$password_error."</span>"; } ?>

                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="phone" placeholder="Phone" pattern="01[1|5|6|7|8|9][0-9]{8}" value="<?= isset($phone) ? $phone:''; ?>" >
                                <i class="fa fa-phone"></i>
                            </span>

                            <?php if(isset($input_errors["phone"])){ echo "<span class='text-danger' >".$input_errors["phone"]."</span>"; } ?>

                        </div>
                        <div class="form-group">
                            <input type="submit" name="student_register" value="Register" class="btn btn-primary btn-block">
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="sign-in.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>

</html>
