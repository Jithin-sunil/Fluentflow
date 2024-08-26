<?php
include('../Assests/connection/connection.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Payments</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="858" height="114" border="1" align="center">
    <tr>
      <td width="185" align="center">User Name</td>
      <td width="185" align="center">Course</td>
      <td width="155" align="center">Langauge</td>
      <td width="191" align="center">Tutor Name</td>
      <td width="140" align="center">Amount</td>
      <td width="140" align="center">Date</td>
      <td width="153" align="center">Status</td>
    </tr>
    <?php
	     $selqry= "select * from tbl_booking p inner join tbl_course d on p.course_id=d.course_id inner join tbl_tutor t on d.tutor_id=t.tutor_id inner join tbl_language l on d.language_id = l.language_id inner join tbl_user u on p.user_id = u.user_id where booking_status = '2'";
		 $book=$con->query($selqry);
		 $i=0;
		 while($data=$book->fetch_assoc())
			{
				$i++;
				
	?>
    <tr>
      <td align="center"><?php echo $data['user_name']?></td>
      <td align="center"><?php echo $data['course_name']?></td>
      <td align="center"><?php echo $data['language_name']?></td>
      <td align="center"><?php echo $data['tutor_name']?></td>
      <td align="center"><?php echo $data['course_price']?></td>
      <td align="center"><?php echo $data['booking_date']?></td>
      <td align="center">Paid</td>
    </tr>
    <?php
		}
	?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>