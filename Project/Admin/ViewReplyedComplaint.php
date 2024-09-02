<?php
include('../Assests/connection/connection.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="414" height="71" border="1" align="center">
    <tr>
      <td width="57" align="center">User Name</td>
      <td width="99" align="center">Complaint Title</td>
      <td width="73" align="center">Date</td>
      <td width="57" align="center">Content</td>
      <td width="61" align="center">Action</td>
    </tr>
     <?php
		$selqry = "select * from tbl_complaint where complaint_status = '1' ";
		$tut=$con->query($selqry);
		 $i=0;
		 while($data=$tut->fetch_assoc())
		 {				
			$i++; 
	?>
    <tr>
      <td align="center"><?php echo $data['user_id']?></td>
      <td align="center"><?php echo $data['complaint_title']?></td>
      <td align="center"><?php echo $data['complaint_date']?></td>
      <td align="center"><?php echo $data['complaint_content']?></td>
      <td align="center"><?php echo $data['complaint_reply']?></td>
      </tr>
    <?php
		 }
		 ?>
   
  </table>
</form>
</body>
</html>