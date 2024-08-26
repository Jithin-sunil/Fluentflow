<?php

include('../Assests/connection/connection.php');

if(isset($_GET['cid']))
{
  $update="update tbl_booking set booking_status='4' where booking_id=".$_GET['cid'];
  if($con->query($update))
  {
    ?>
    <script>
      alert('Updated');
      window.location="Myrequest.php";
    </script>
    <?php
  }
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Request</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="850" height="130" border="1" align="center">
    <tr>
      <td width="172">Course</td>
      <td width="214">Tutor Name</td>
      <td width="160">Fee</td>
      <td width="116">Date</td>
      <td width="154">Status</td>
    </tr>
    <?php
          
		  $selqry="select * from tbl_booking p inner join tbl_course d on p.course_id=d.course_id inner join tbl_tutor m on d.tutor_id=m.tutor_id";
		 $book=$con->query($selqry);
		 $i=0;
		 while($data=$book->fetch_assoc())
		 {
			$i++;	
	
	?>	
    <tr>
      <td><?php echo $data ['course_name'] ?></td>
      <td><?php echo $data ['tutor_name'] ?></td>
      <td><?php echo $data ['course_price'] ?></td>
      <td><?php echo $data ['booking_date'] ?></td>
      <td>
      <?php
      if($data['booking_status']==0)
      {
        echo "Request Pending";
      }
      else if($data['booking_status']==1)
      {
        echo " Approved";
        ?>
        <a href="Payment.php?bid=<?php echo $data ['booking_id']?>">Payment</a>
        <?php
      }
      else if($data['booking_status']==3)
      {
      
        echo "Class Started";
        ?>
        <a href="">Watch Class</a>
        <a href="Chat.php?id=<?php echo $data['tutor_id']?>">Chat</a>

        <a href="Myrequest.php?cid=<?php echo $data ['booking_id']?>">Class completed</a>
        <?php
      }
      else if($data['booking_status']==4)
      {
      
        
        ?>
        <a href=""> Exam</a>
        <a href="Rating.php?pid=<?php echo $data['tutor_id']?>">Rating</a>
        <?php
      }
      else
      {
        echo "Rejected";
      }
      ?>
      </td>
      <?php
		 }
	 ?>
    </tr>
  </table>
</form>
</body>
</html>