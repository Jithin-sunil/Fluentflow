<!-- 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1>Hello <?php echo $_SESSION['uName'];?></h1>     
<a href="MyProfile.php">My profile</a><br/><br/>
<a href="Viewcourse.php">View course</a><br/><br/>
<a href="Complaint.php">Complaint</a>
</body>
</html> -->

<?php
include('SessionValidation.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FluentFlow-Language learning platform</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../Assests/Templates/Main/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../Assests/Templates/Main/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../Assests/Templates/Main/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="../Assests/Templates/Main/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../Assests/Templates/Main/css/bootstrap.min.css" rel="stylesheet">




    <!-- Template Stylesheet -->
    <link href="../Assests/Templates/Main/css/style.css" rel="stylesheet">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light fixed-top  shadow py-lg-0 px-4 " data-wow-delay="0.1s" >
    <a href="index.html" class="navbar-brand">
        <h1 class="text-primary fw-bold m-0">FluentFlow</h1>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between py-4 py-lg-0" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="#home" class="nav-item nav-link active">Home</a>
            <a href="MyProfile.php" class="nav-item nav-link">Profile</a>
            <a href="Viewcourse.php" class="nav-item nav-link">Course</a>
            <a href="Myrequest.php" class="nav-item nav-link">Requests</a>
            <a href="../Logout.php" class="nav-item nav-link">Log out</a>
        </div>
    </div>
</nav>

    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-light my-6 mt-0" id="home">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- <div class="col-lg-6 py-6 pb-0 pt-lg-0">
                    <h3 class="text-primary mb-3">I'm</h3>
                    <h1 class="display-3 mb-3">Kate Winslet</h1>
                    <h2 class="typed-text-output d-inline"></h2>
                    <div class="typed-text d-none">Personalized learning , Fun and Effective , Stay Motivated, Effective way to learn a language! </div>
                    <div class="d-flex align-items-center pt-5">
                        <a href="" class="btn btn-primary py-3 px-4 me-5">Download CV</a>
                        <button type="button" class="btn-play" data-bs-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                        <h5 class="ms-4 mb-0 d-none d-sm-block">Play Video</h5>
                    </div>
                </div> -->
                <!-- <div class="col-lg-6">
                    <img class="img-fluid" src="../Assests/Templates/Main/img/profile.png" alt="">
                </div> -->
            </div>
        </div>
    </div>
    <!-- Header End -->
    <div class="container-xxl py-6" id="about">
    <div class="container">
