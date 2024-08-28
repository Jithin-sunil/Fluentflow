<?php
include("../Assests/Connection/Connection.php");
include('Header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<title>View Tutor</title>
<style>
  /* styles.css */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

.card-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(500px, 2fr));
    gap: 15px;
    justify-content: center;
}

.card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 20px rgba(0,0,0,0.2);
}

.card-photo img {
    width: 100%;
    height: auto;
}

.card-info {
    padding: 15px;
}

.card-info h2 {
    margin: 0 0 10px;
    font-size: 1.5em;
    color: #333;
}

.card-info p {
    margin: 5px 0;
    color: #555;
}

.card-action {
    padding: 15px;
    text-align: center;
    background: #f9f9f9;
}

.card-action a {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

.card-action a:hover {
    text-decoration: underline;
}

</style>
</head>
<body>
<div class="card-container">
    <?php
         $selqry = "SELECT * FROM tbl_tutor_language p 
                    INNER JOIN tbl_tutor d ON p.tutor_id=d.tutor_id 
                    INNER JOIN tbl_language s ON p.language_id=s.language_id where d.tutor_status=1";
        $tut = $con->query($selqry);
        while ($data = $tut->fetch_assoc()) {
    ?>
    <div class="card">
        <div class="card-photo">
            <img src="../Assests/File/Tutor/Photo/<?php echo $data['tutor_photo']; ?>" alt="Tutor Photo">
        </div>
        <div class="card-info">
            <h2><?php echo $data['tutor_name']; ?></h2>
            <p><strong>Email:</strong> <?php echo $data['tutor_email']; ?></p>
            <p><strong>Contact:</strong> <?php echo $data['tutor_contact']; ?></p>
            <p><strong>Language:</strong> <?php echo $data['language_name']; ?></p>
            <?php
										
											
											$average_rating = 0;
											$total_review = 0;
											$five_star_review = 0;
											$four_star_review = 0;
											$three_star_review = 0;
											$two_star_review = 0;
											$one_star_review = 0;
											$total_user_rating = 0;
											$review_content = array();
										
											$query = "SELECT * FROM tbl_review where tutor_id = '".$data["tutor_id"]."' ORDER BY review_id DESC";
										
											$result = $con->query($query);
										
											while($row = $result->fetch_assoc())
											{
												
										
												if($row["user_rating"] == '5')
												{
													$five_star_review++;
												}
										
												if($row["user_rating"] == '4')
												{
													$four_star_review++;
												}
										
												if($row["user_rating"] == '3')
												{
													$three_star_review++;
												}
										
												if($row["user_rating"] == '2')
												{
													$two_star_review++;
												}
										
												if($row["user_rating"] == '1')
												{
													$one_star_review++;
												}
										
												$total_review++;
										
												$total_user_rating = $total_user_rating + $row["user_rating"];
										
											}
											
											
											if($total_review==0 || $total_user_rating==0 )
											{
												$average_rating = 0 ; 			
											}
											else
											{
												$average_rating = $total_user_rating / $total_review;
											}
											
											?>
                                            <p align="center" style="color:#F96;font-size:20px">
                                           <?php
										   if($average_rating==5 || $average_rating==4.5)
										   {
											   ?>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                               <?php
										   }
										   if($average_rating==4 || $average_rating==3.5)
										   {
											   ?>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                               <?php
										   }
										   if($average_rating==3 || $average_rating==2.5)
										   {
											   ?>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                               <?php
										   }
										   if($average_rating==2 || $average_rating==1.5)
										   {
											   ?>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                               <?php
										   }
										   if($average_rating==1)
										   {
											   ?>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                               <?php
										   }
										   if($average_rating==0)
										   {
											   ?>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                               <?php
										   }
										   ?>
                                           
                                        </p>
                                            <?php
										
											$output = array(
												'average_rating'	=>	number_format($average_rating, 1),
												'total_review'		=>	$total_review,
												'five_star_review'	=>	$five_star_review,
												'four_star_review'	=>	$four_star_review,
												'three_star_review'	=>	$three_star_review,
												'two_star_review'	=>	$two_star_review,
												'one_star_review'	=>	$one_star_review,
												'review_data'		=>	$review_content
											);
                      ?>
        </div>
        <div class="card-action">
            <a href="ViewTutor.php?tutor_id=<?php echo $data['tutor_id']; ?>">View</a>
        </div>
    </div>
    <?php
        }
    ?>
</div>
</body>
</html>
<?php
include('Footer.php');
?>