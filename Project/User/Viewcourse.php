<?php
include('../Assests/connection/connection.php');
include('Header.php');

if(isset($_GET["cid"]))
{
	$insqry="insert into tbl_booking (booking_date,user_id,course_id)values (curdate(),'".$_SESSION['uid']."','".$_GET['cid']."')";
    if($con->query($insqry))
		{
	 ?>
     <script>
	 alert('Applied')
	 window.location = "Myrequest.php";
	 </script>
     <?php
		}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Course</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    .course-container {
        width: 80%;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .course-header {
        text-align: center;
        padding-bottom: 20px;
    }

    .course-header h1 {
        color: #5a2d82;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px;
        text-align: center;
        border: 1px solid #ddd;
    }

    th {
        background-color: #5a2d82;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f0e5f7;
    }

    tr:nth-child(odd) {
        background-color: #ffffff;
    }

    tr:hover {
        background-color: #f4e8ff;
    }

    .course-actions a {
        text-decoration: none;
        margin: 0 5px;
        padding: 8px 15px;
        background-color: #5a2d82;
        color: #fff;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .course-actions a:hover {
        background-color: #7a41a8;
    }
</style>
</head>

<body>
  
<div class="course-container">
    <div class="course-header">
        <h1>Available Courses</h1>
    </div>

    <table>
        <tr>
            <th>Course Name</th>
            <th>Details</th>
            <th>Language</th>
            <th>Tutor Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php
            $selqry= "select * from tbl_course p inner join tbl_language d on p.language_id=d.language_id inner join tbl_tutor o on p.tutor_id =o.tutor_id";
            $course=$con->query($selqry);
            while($data=$course->fetch_assoc())
            {
        ?>
        <tr>
            <td><?php echo $data['course_name']; ?></td>
            <td><?php echo $data['course_details']; ?></td>
            <td><?php echo $data['language_name']; ?></td>
            <td><?php echo $data['tutor_name']; ?></td>
            <td><?php echo $data['course_price']; ?></td>
            <td class="course-actions">
                <a href="ViewTutor.php?tid=<?php echo $data['tutor_id']; ?>">View Tutor</a>
                <a href="Viewcourse.php?cid=<?php echo $data['course_id']; ?>">Apply</a>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</div>

</body>
</html>
<?php
include('Footer.php');
?>
