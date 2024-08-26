<?php
include('../Assests/connection/connection.php');
session_start();
if(isset($_POST['btn_submit']))
{
	$email=$_POST['txtemail'];
	$password=$_POST['txtpassword'];
	
	$selAdmin = "select * from tbl_admin where admin_email = '".$email."' and admin_password = '".$password."'";
	$resultAdmin = $con -> query($selAdmin);
	
	$selUser = "select * from tbl_user where user_email = '".$email."' and user_password = '".$password."'";
	$resultUser = $con -> query($selUser);
	
	$selTutor = "select * from tbl_tutor where tutor_email = '".$email."' and tutor_password = '".$password."'";
	$resultTutor = $con -> query($selTutor);
	
	if($data = $resultAdmin->fetch_assoc())
	{
		$_SESSION['aid'] = $data['admin_id'];
		$_SESSION['aName'] = $data['admin_name'];
		header('location:../Admin/HomePage.php');

	}
	
	else if($data = $resultUser->fetch_assoc())
	{
		$_SESSION['uid'] = $data['user_id'];
		$_SESSION['uName'] = $data['user_name'];
		header('location:../User/HomePage.php');

	}

	else if($data = $resultTutor->fetch_assoc())
	{
		$_SESSION['tid'] = $data['tutor_id'];
		$_SESSION['tName'] = $data['tutor_name'];
		header('location:../Tutor/HomePage.php');

	}
	{
		?>
		
		<script>
					alert("Invalid Credentials...");
				
		</script>
        <?php
	}
	
	
  
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="337" height="179" border="1">
    <tr>
      <td width="170">Email</td>
      <td width="151"><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>