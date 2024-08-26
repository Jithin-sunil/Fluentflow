<!-- <?php
include('../Assests/connection/connection.php');
session_start();

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

?> -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Course</title>
</head>

<body>
  
<form id="form1" name="form1" method="post" action="">
  <table width="917" height="123" border="1" align="center">
    <tr>
      <td width="201" height="61" align="center">Course Name</td>
      <td width="170" align="center">Details</td>
      <td width="197" align="center">Language</td>
      <td width="197" align="center">Tutor Name</td>
      <td width="155" align="center">Price</td>
      <td width="160" align="center">Action</td>
    </tr>
    <?php
	
		$selqry= "select * from tbl_course p inner join tbl_language d on p.language_id=d.language_id inner join tbl_tutor o on p.tutor_id =o.tutor_id";
		 $selqry;
		 $course=$con->query($selqry);
		 $i=0;
		 while($data=$course->fetch_assoc())
		 {
			$i++;	
			
	?>
    <tr>
      <td align="center"><?php echo $data ['course_name']?></td>
      <td align="center"><?php echo $data ['course_details']?></td>
      <td align="center"><?php echo $data ['language_name']?></td>
      <td align="center"><?php echo $data ['tutor_name']?></td>
      <td align="center"><?php echo $data ['course_price']?></td>
      <td align="center"><a href="Viewcourse.php?cid=<?php echo $data ['course_id']?>">Apply</a></td>
      
    <?php
		 }
		 ?>
    </tr>
  </table>
</form>
</body>
</html>
