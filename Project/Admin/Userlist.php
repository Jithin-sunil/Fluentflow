<?php
include('../Assests/Connection/Connection.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserList</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="702" height="114" border="1">
    <tr>
      <td>SLNO</td>
      <td>User Id</td>
      <td>User Name</td>
      <td>User Email</td>
      <td>User DOB</td>
      <td>User Contact</td>
    </tr>
  <?php
  	$selqry="select * from tbl_user";  
    $user=$con->query($selqry);
	$i=0;
	while($data=$user->fetch_assoc())
	{
		$i++;
		?>
        
        <tr>
         <td><?php echo $i ?></td>
         <td><?php echo $data['user_id'] ?></td>
         <td><?php echo $data['user_name'] ?></td>
         <td><?php echo $data['user_email'] ?></td>
         <td><?php echo $data['user_dob'] ?></td>
         <td><?php echo $data['user_contact'] ?></td>
		</tr>
        
        <?php
	}
		?>
         
  </table>
</form>
</body>
</html>