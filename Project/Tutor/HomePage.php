<!-- <?php

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1>Hello <?php echo $_SESSION['tName']; ?></h1>
<a href="Myprofile.php">Myprofile</a><br/><br/>
<a href="Course.php">Course</a><br/><br/>
<a href="Mylanguage.php">My language</a><br/><br/>
<a href="Addvideos.php">Add video</a><br/><br/>


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



<style>
    .navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 20px;
    background-color: #ffffff; /* Background color of the navbar */
}

.navbar-icon {
    display: flex;
    align-items: center;
}

.navbar-icon img {
    height: 40px; /* Adjust the size of the icon */
}

.navbar-links {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

.navbar-links li {
    margin-left: 20px; /* Space between links */
}

.navbar-links a {
    text-decoration: none;
    color: #000000; /* Link color */
    font-weight: bold;
}

.navbar-links a:hover {
    color: #ff9900; /* Link hover color */
}

</style>
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
    <nav class="navbar navbar-expand-lg bg-white navbar-light fixed-top shadow py-lg-0 px-4 " data-wow-delay="0.1s">
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
            <a href="Course.php" class="nav-item nav-link">Course</a>
            <a href="Mylanguage.php" class="nav-item nav-link">Language</a>
            <a href="Viewusercourse.php" class="nav-item nav-link">Usercourse</a>
            <a href="logout.php" class="nav-item nav-link">Log out</a>
        </div>
    </div>
</nav>

    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-light my-6 mt-0" id="home">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 py-6 pb-0 pt-lg-0">
                    <h3 class="text-primary mb-3"><b>Hey,</b></h3>
                    <h1 class="display-3 mb-3">Learn Your Favorite Language From Online.</h1>
                    <h2 class="typed-text-output d-inline"></h2>
                    <div class="typed-text d-none">Personalized learning , Fun and Effective , Stay Motivated, Effective way to learn a language! , Affordable Price , Learn for real life</div>
                    <div class="d-flex align-items-center pt-5">
                        <a href="" class="btn btn-primary py-3 px-4 me-5">Download CV</a>
                        <button type="button" class="btn-play" data-bs-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                        <h5 class="ms-4 mb-0 d-none d-sm-block">Play Video</h5>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid" src="../Assests/Templates/Main/img/profile.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- About Start -->
    <div class="container-xxl py-6" id="about">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center mb-5">
                        <div class="years flex-shrink-0 text-center me-4">
                            <h1 class="display-1 mb-0">15</h1>
                            <h5 class="mb-0">Years</h5>
                        </div>
                        <h3 class="lh-base mb-0">of Working Experience and Expert Tutors </h3>
                    </div>
                    <p class="mb-4">With 15 years of experience in the language learning platform industry,clients describe the platform as a reliable and innovative solution,showcasing extensive expertise in delivering effective and engaging, and user-friendly language education that adapts to evolving learners needs</p>
                    <p class="mb-3"><i class="far fa-check-circle text-primary me-3"></i>Afordable Prices</p>
                    <p class="mb-3"><i class="far fa-check-circle text-primary me-3"></i>Learn with Confidence</p>
                    <p class="mb-3"><i class="far fa-check-circle text-primary me-3"></i>Learn for real life</p>
                    <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <img class="img-fluid rounded" src="../Assests/Templates/Main/img/about-1.jpg" alt="">
                        </div>
                        <div class="col-sm-6">
                            <img class="img-fluid rounded" src="../Assests/Templates/Main/img/about-2.jpg" alt="">
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <h5 class="border-end pe-3 me-3 mb-0">Happy Clients</h5>
                        <h2 class="text-primary fw-bold mb-0" data-toggle="counter-up">267902</h2>
                    </div>
                    <p class="mb-4">The interactive lessons and engaging content made learning enjoyable and effective. It feel confident speaking and using the language in real-life situation.</p>
                    <div class="d-flex align-items-center mb-3">
                        <h5 class="border-end pe-3 me-3 mb-0">Expert Tutors</h5>
                        <h2 class="text-primary fw-bold mb-0" data-toggle="counter-up">3564</h2>
                    </div>
                    <p class="mb-0">Our native-level tutors are located Worldwide and will teach you accents and cultural differences.They are rated 4.7/5 on average by our students.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Expertise Start -->
    <div class="container-xxl py-6 pb-5" id="skill">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-5 mb-5">Proficiency & Progress</h1>
                    <p class="mb-4">Language learning is the level of skill or ability a person has in using a language, including speaking, listening, reading, and writing.</p>
                    <h3 class="mb-4">Most Rated</h3>
                    <br>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="skill mb-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-bold">English</h6>
                                    <h6 class="font-weight-bold">95%</h6>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="skill mb-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-bold">Spanish</h6>
                                    <h6 class="font-weight-bold">90%</h6>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="skill mb-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-bold">French</h6>
                                    <h6 class="font-weight-bold">85%</h6>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="skill mb-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-bold">German</h6>
                                    <h6 class="font-weight-bold">75%</h6>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="skill mb-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-bold">Chinese</h6>
                                    <h6 class="font-weight-bold">80%</h6>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="skill mb-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-bold">Portuguese</h6>
                                    <h6 class="font-weight-bold">85%</h6>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <ul class="nav nav-pills rounded border border-2 border-primary mb-5">
                        <li class="nav-item w-50">
                            <button class="nav-link w-100 py-3 fs-5 active" data-bs-toggle="pill" href="#tab-1">Learning Path</button>
                        </li>
                        <li class="nav-item w-50">
                            <button class="nav-link w-100 py-3 fs-5" data-bs-toggle="pill" href="#tab-2">Completed Courses</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row gy-5 gx-4">
                                <div class="col-sm-6">
                                    <h5>Intermediate French <br>Grammar</h5>
                                    <hr class="text-primary my-2">
                                    <p class="text-primary mb-1">Progress: 60%</p>
                                    <h6 class="mb-0">Started: Jan 2024,</h6>
                                    <h6 class="mb-0">Estimation Completion: Mar 2024</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>Advanced Spanish <br>Listening</h5>
                                    <hr class="text-primary my-2">
                                    <p class="text-primary mb-1">Progress: 45%</p>
                                    <h6 class="mb-0">Started: Feb 2024,</h6>
                                    <h6 class="mb-0">Estimation Completion: Apr 2024</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>Basic German <br>Converstion</h5>
                                    <hr class="text-primary my-2">
                                    <p class="text-primary mb-1">Progress: 75</p>
                                    <h6 class="mb-0">Started: Dec 2024,</h6>
                                    <h6 class="mb-0">Estimation Completion: Feb 2024</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>Chinese Vocabulary Expansion</h5>
                                    <hr class="text-primary my-2">
                                    <p class="text-primary mb-1">Progress: 20%</p>
                                    <h6 class="mb-0">Started: Mar 2024,</h6>
                                    <h6 class="mb-0">Estimation Completion: May 2024</h6>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row gy-5 gx-4">
                                <div class="col-sm-6">
                                    <h5>Beginner English</h5>
                                    <hr class="text-primary my-2">
                                    <p class="text-primary mb-1">Completed: Aug 2023</p>
                                    <h6 class="mb-0">Certificate Earned: Yes </h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>French Volcabulary Basics</h5>
                                    <hr class="text-primary my-2">
                                    <p class="text-primary mb-1">Completed: Nov 2023</p>
                                    <h6 class="mb-0">Certificate Earned: Yes</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>Spanish Grammer Basics</h5>
                                    <hr class="text-primary my-2">
                                    <p class="text-primary mb-1">Completed: Jul 20235</p>
                                    <h6 class="mb-0">Certificate Earned: Yes</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h5>Intro to portuguese</h5>
                                    <hr class="text-primary my-2">
                                    <p class="text-primary mb-1">Completed: Jan 2024</p>
                                    <h6 class="mb-0">Certificate Earned: No</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Expertise End -->


    <!-- Service Start -->
    <div class="container-fluid bg-light my-5 py-6" id="service">
        <div class="container">
            <div class="row g-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-6">
                    <h1 class="display-5 mb-0">My Services</h1>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <a class="btn btn-primary py-3 px-5" href="">Hire Me</a>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item d-flex flex-column flex-sm-row bg-white rounded h-100 p-4 p-lg-5">
                        <div class="bg-icon flex-shrink-0 mb-3">
                            <i class="fa fa-crop-alt fa-2x text-dark"></i>
                        </div>
                        <div class="ms-sm-4">
                            <h4 class="mb-3">Worldwide community</h4>
                            <h6 class="mb-3">Start from <span class="text-primary">$199</span></h6>
                            <span>Native speakers teach you their language, while you teach them yours. Millions of people use Fluentflow to practice 150+ languages.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item d-flex flex-column flex-sm-row bg-white rounded h-100 p-4 p-lg-5">
                        <div class="bg-icon flex-shrink-0 mb-3">
                            <i class="fa fa-code-branch fa-2x text-dark"></i>
                        </div>
                        <div class="ms-sm-4">
                            <h4 class="mb-3">Intuitive Language Tools</h4>
                            <h6 class="mb-3">Start from <span class="text-primary">$199</span></h6>
                            <span>Built-in aids for translation, pronunciation, transliteration, and corrections make conversations run smoothly. Learning is as simple as chatting!</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item d-flex flex-column flex-sm-row bg-white rounded h-100 p-4 p-lg-5">
                        <div class="bg-icon flex-shrink-0 mb-3">
                            <i class="fa fa-code fa-2x text-dark"></i>
                        </div>
                        <div class="ms-sm-4">
                            <h4 class="mb-3">Text, Voice, Video, and More</h4>
                            <h6 class="mb-3">Start from <span class="text-primary">$199</span></h6>
                            <span>Chat with language partners through text and voice messages, stickers, voice and video calls, and interactive Voicerooms and Lives. Whatever your communication preference, choose the method that best fits your learning goals!</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item d-flex flex-column flex-sm-row bg-white rounded h-100 p-4 p-lg-5">
                        <div class="bg-icon flex-shrink-0 mb-3">
                            <i class="fa fa-laptop-code fa-2x text-dark"></i>
                        </div>
                        <div class="ms-sm-4">
                            <h4 class="mb-3">Moments</h4>
                            <h6 class="mb-3">Start from <span class="text-primary">$199</span></h6>
                            <span>Engage with the entire community by posting Moments. The public posts are seen by all native speakers of your target language and are ideal for asking questions and sharing updates.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Projects Start -->
    <div class="container-xxl py-6 pt-5" id="project">
        <div class="container">
            <div class="row g-5 mb-5 align-items-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-6">
                    <h1 class="display-5 mb-0">Language</h1>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <ul class="list-inline mx-n3 mb-0" id="portfolio-flters">
                        <li class="mx-3 active" data-filter="*">All Languages</li>
                        <li class="mx-3" data-filter=".first">Popular</li>
                        <li class="mx-3" data-filter=".second">Others</li>
                    </ul>
                </div>
            </div>
            <div class="row g-4 portfolio-container wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-4 col-md-6 portfolio-item first">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="../Assests/Templates/Main/img/lang-1.jpg" alt="">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href="../Assests/Templates/Main/img/lang-1.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item second">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="../Assests/Templates/Main/img/lang3.jpg" alt="">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href="../Assests/Templates/Main/img/lang3.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item first">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="../Assests/Templates/Main/img/lang-2.jpg" alt="">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href="../Assests/Templates/Main/img/lang-2.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item second">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="../Assests/Templates/Main/img/lang5.jpg" alt="">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href="../Assests/Templates/Main/img/lang5.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item first">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="../Assests/Templates/Main/img/lang4.jpg" alt="">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href="../Assests/Templates/Main/img/lang4.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item second">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="../Assests/Templates/Main/img/lang6.jpg" alt="">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href="../Assests/Templates/Main/img/lang6.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Projects End -->


    <!-- Team Start -->
    <div class="container-xxl py-6 pb-5" id="team">
        <div class="container">
            <div class="row g-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-6">
                    <h1 class="display-5 mb-0">Tutors</h1>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <a class="btn btn-primary py-3 px-5" href="">Contact Us</a>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative">
                        <img class="img-fluid rounded" src="../Assests/Templates/Main/img/team-1.jpg" alt="">
                        <div class="team-text bg-white rounded-end p-4">
                            <div>
                                <h5>Angelina Kate</h5>
                                <span>English</span>
                            </div>
                            <i class="fa fa-arrow-right fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item position-relative">
                        <img class="img-fluid rounded" src="../Assests/Templates/Main/img/team-2.jpg" alt="">
                        <div class="team-text bg-white rounded-end p-4">
                            <div>
                                <h5>Jenna Adams</h5>
                                <span>Spanish</span>
                            </div>
                            <i class="fa fa-arrow-right fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item position-relative">
                        <img class="img-fluid rounded" src="../Assests/Templates/Main/img/team-3.jpg" alt="">
                        <div class="team-text bg-white rounded-end p-4">
                            <div>
                                <h5>Emilia Stewart</h5>
                                <span>French</span>
                            </div>
                            <i class="fa fa-arrow-right fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


   <!-- Testimonial Start -->
   <div class="container-fluid bg-light py-5 my-5" id="testimonial">
        <div class="container-fluid py-5">
            <h1 class="display-5 text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Testimonial</h1>
            <div class="row justify-content-center">
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="testimonial-left h-100">
                        <img class="img-fluid wow fadeIn" data-wow-delay="0.1s" src="../Assests/Templates/Main/img/testimonial-1.jpg" alt="">
                        <img class="img-fluid wow fadeIn" data-wow-delay="0.3s" src="../Assests/Templates/Main/img/testimonial-2.jpg" alt="">
                        <img class="img-fluid wow fadeIn" data-wow-delay="0.5s" src="../Assests/Templates/Main/img/testimonial-3.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle border border-secondary p-2 mx-auto" src="../Assests/Templates/Main/img/testimonial-1.jpg" alt="">
                                <div class="testimonial-icon">
                                    <i class="fa fa-quote-left text-primary"></i>
                                </div>
                            </div>
                            <p class="fs-5 fst-italic">I've been using Fluentflow for some time now, and it's been a great experience.The classes are small,so you get a lot of attention from the teacher.they offer a flexible schedule,which make it easy to fit into my busy day.</p>
                            <hr class="w-25 mx-auto">
                            <h5>Clara</h5>
                            <span>Profession</span>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle border border-secondary p-2 mx-auto" src="../Assests/Templates/Main/img/testimonial-2.jpg" alt="">
                                <div class="testimonial-icon">
                                    <i class="fa fa-quote-left text-primary"></i>
                                </div>
                            </div>
                            <p class="fs-5 fst-italic">Oppurtunities to have speaking club and discuss a lot of questions made my experience great.Near 50% teachers tried to give some additional information and corrected answers.Moreover,I had the beautiful chance to listen to different accents.</p>
                            <hr class="w-25 mx-auto">
                            <h5>Daniel</h5>
                            <span>Profession</span>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle border border-secondary p-2 mx-auto" src="../Assests/Templates/Main/img/testimonial-3.jpg" alt="">
                                <div class="testimonial-icon">
                                    <i class="fa fa-quote-left text-primary"></i>
                                </div>
                            </div>
                            <p class="fs-5 fst-italic">I started my language journey with a sprint offer.Very good offer, which I've completed successfully.</p>
                            <hr class="w-25 mx-auto">
                            <h5>Erin</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="testimonial-right h-100">
                        <img class="img-fluid wow fadeIn" data-wow-delay="0.1s" src="../Assests/Templates/Main/img/testimonial-1.jpg" alt="">
                        <img class="img-fluid wow fadeIn" data-wow-delay="0.3s" src="../Assests/Templates/Main/img/testimonial-2.jpg" alt="">
                        <img class="img-fluid wow fadeIn" data-wow-delay="0.5s" src="../Assests/Templates/Main/img/testimonial-3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Contact Start -->
    <div class="container-xxl pb-5" id="contact">
        <div class="container py-5">
            <div class="row g-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-6">
                    <h1 class="display-5 mb-0">Let's Work Together</h1>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <a class="btn btn-primary py-3 px-5" href="">Say Hello</a>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="mb-2">My office:</p>
                    <h3 class="fw-bold">123 Street, New York, USA</h3>
                    <hr class="w-100">
                    <p class="mb-2">Call me:</p>
                    <h3 class="fw-bold">+012 345 6789</h3>
                    <hr class="w-100">
                    <p class="mb-2">Mail me:</p>
                    <h3 class="fw-bold">info@example.com</h3>
                    <hr class="w-100">
                    <p class="mb-2">Follow me:</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-primary me-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-primary me-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary me-2" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-primary me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Map Start -->
    <div class="container-xxl pt-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container-xxl pt-5 px-0">
            <div class="bg-dark">
                
            </div>
        </div>
    </div>
    <!-- Map End -->


    <!-- Copyright Start -->
    <div class="container-fluid bg-dark text-white py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom text-secondary" href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom text-secondary" href="https://htmlcodex.com">HTML Codex</a>
                        <br>Distributed By: <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Assests/Templates/Main/lib/wow/wow.min.js"></script>
    <script src="../Assests/Templates/Main/lib/easing/easing.min.js"></script>
    <script src="../Assests/Templates/Main/lib/waypoints/waypoints.min.js"></script>
    <script src="../Assests/Templates/Main/lib/typed/typed.min.js"></script>
    <script src="../Assests/Templates/Main/lib/counterup/counterup.min.js"></script>
    <script src="../Assests/Templates/Main/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../Assests/Templates/Main/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="../Assests/Templates/Main/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="../Assests/Templates/Main/js/main.js"></script>
</body>

</html>
