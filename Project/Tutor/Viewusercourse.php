<?php

include('../Assests/connection/connection.php');
if(isset($_GET['aid']))
{
  $up="update tbl_booking set booking_status=1 where course_id='".$_GET['aid']."'";
  if($con->query($up))
  {
    ?>
    <script>
      alert('Request Approved');
      window.location="Viewcourse.php";
    </script>
    
    <?php
  }
  
}
if(isset($_GET['rid']))
{
  $up="update tbl_booking set booking_status=2 where course_id='".$_GET['rid']."'";
  if($con->query($up))
  {
    ?>
    <script>
      alert('Request Rejected');
      window.location="Viewcourse.php";
    </script>
    
    <?php
  }
  
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>viewcourse</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="852" height="148" border="1" align="center">
    <tr>
      <td width="160">User Name </td>
      <td width="160">Course Name </td>
      <td width="125">Detais</td>
      <td width="125">Language</td>
      <td width="125">Contact</td>
      <td width="96">Price</td>
      <td width="172">Action</td>
    </tr>
    <?php
         $selqry="select * from tbl_booking b inner join tbl_course c on b.course_id=c.course_id inner join tbl_user u on b.user_id=u.user_id";
		 $course=$con->query($selqry);
		 $i=0;
		 while($data=$course->fetch_assoc())
		 {
			$i++;	
	
	?>
    
    <tr>
      <td><?php echo $data ['user_name']?></td>
      <td><?php echo $data ['course_name']?></td>
      <td><?php echo $data ['course_details']?></td>
      <td><?php echo $data ['language_id']?></td>
      <td><?php echo $data ['user_contact']?></td>
      <td><?php echo $data ['course_price']?></td>
      <td><?php
      if($data['booking_status']==0)
      {
        ?>
        <a href="Viewusercourse.php?aid=<?php echo $data ['course_id']?>">Accept</a>
      <a href="Viewusercourse.php?rid=<?php echo $data ['course_id']?>">reject</a>
      <?php
      }
      else if($data['booking_status']==1)
      {
        echo "Payment Pending";
      }
      else if($data['booking_status']==3)
      {
      
        echo "Class Started";
        ?>
        <a href="Chat.php?id=<?php echo $data['user_id']?>">Chat</a>
        <?php
      }
      else if($data['booking_status']==4)
      {
      
        echo "Class Completed";
        ?>
        <a href="">Start Exam</a>
        <?php
      }
      else
      {
        echo "Rejected";
      }
      ?></td>
      
    <?php
		 }
		 ?>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>