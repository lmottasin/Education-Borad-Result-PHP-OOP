<?php
include_once '../vendor/autoload.php';

?>
<?php
use App\Controller\User;

/**
 * it cna called another way
 * ex.
 * $user = new App\Controller\User;
 */
$user = new User();
?>

<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:53 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>EBRS - Register</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
    <?php
    /**
     * register form isset
     */
    if (isset($_POST['register']))
    {
        //get values
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if ( empty($name) || empty($email) || empty($password) || empty($cpassword))
        {
            $msg = "<p class='alert alert-danger'> All fields are required! <button class='close' data-dismiss='alert'>&times;</button></p>";
        }
        elseif (filter_var($email, FILTER_VALIDATE_EMAIL)== false)
        {
            $msg = "<p class='alert alert-danger'> Invalid Email Address! <button class='close' data-dismiss='alert'>&times;</button></p>";

        }
        else if( $password != $cpassword)
        {
            $msg = "<p class='alert alert-warning'> Password Not Matched! <button class='close' data-dismiss='alert'>&times;</button></p>";

        }
        else
        {
            $msg = $user -> registerAdmin($_POST);
        }





    }


    ?>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<!-- <img class="img-fluid" src="assets/img/logo-white.png" alt="Logo"> -->
                            <h1 class="text-light">EBRS</h1>
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Register</h1>
								<p class="account-subtitle">Access to EBRS dashboard</p>
								<div class="mess">
                                    <?php
                                    if (isset($msg))
                                    {
                                        echo $msg;
                                    }
                                    ?>
                                </div>
								<!-- Form -->
								<form action="" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<input name="name" class="form-control" type="text" placeholder="Name">
									</div>
									<div class="form-group">
										<input name="email" class="form-control" type="text" placeholder="Email">
									</div>
									<div class="form-group">
										<input name="password" class="form-control" type="password" placeholder="Password">
									</div>
									<div class="form-group">
										<input name="cpassword" class="form-control" type="password" placeholder="Confirm Password">
									</div>
									<div class="form-group mb-0">
										<button name="register" class="btn btn-primary btn-block" type="submit">Register</button>
									</div>
								</form>
								<!-- /Form  -->
								
								<!-- <div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div> -->
								
								<!-- Social Login -->
								<!-- <div class="social-login">
									<span>Register with</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
								</div> -->
								<!-- /Social Login -->
								
								<div class="text-center dont-have">Already have an account? <a href="index.php">Login</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:53 GMT -->
</html>