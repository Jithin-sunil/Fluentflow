<?php
include('../Assests/connection/connection.php');
session_start();
if(isset($_POST['btn_submit']))
{
	$email=$_POST['txtemail'];
	$password=$_POST['txtpassword'];
	
	$selAdmin = "select * from tbl_admin where admin_email = '".$email."' and admin_password = '".$password."'";
	$resultAdmin = $con -> query($selAdmin);
	
	$selUser = "select * from tbl_user where user_email = '".$email."' and user_password = '".$password."'";
	$resultUser = $con -> query($selUser);
	
	$selTutor = "select * from tbl_tutor where tutor_email = '".$email."' and tutor_password = '".$password."'";
	$resultTutor = $con -> query($selTutor);
	
	if($data = $resultAdmin->fetch_assoc())
	{
		$_SESSION['aid'] = $data['admin_id'];
		$_SESSION['aName'] = $data['admin_name'];
		header('location:../Admin/HomePage.php');

	}
	
	else if($data = $resultUser->fetch_assoc())
	{
		$_SESSION['uid'] = $data['user_id'];
		$_SESSION['uName'] = $data['user_name'];
		header('location:../User/HomePage.php');

	}

	else if($data = $resultTutor->fetch_assoc())
	{
		$_SESSION['tid'] = $data['tutor_id'];
		$_SESSION['tName'] = $data['tutor_name'];
		header('location:../Tutor/HomePage.php');

	}
	{
		?>
		
		<script>
					alert("Invalid Credentials...");
				
		</script>
        <?php
	}
	
	
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In & Sign Up Form</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#" method="post">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" />
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#" method="post">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email"  name="txtemail" placeholder="Email" />
                <input type="password" name="txtpassword" placeholder="Password" />
                <a href="#">Forgot your password?</a>
                <button type="submit" name="btn_submit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <!-- <footer>
        <p>
            Created with <i class="fa fa-heart"></i> by
            <a target="_blank" href="https://florin-pop.com">Florin Pop</a>
            - Read how I created this and how you can join the challenge
            <a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
        </p>
    </footer> -->

    <script src="login.js"></script>
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>
</html>
