<?php
include('../Assests/connection/connection.php');
session_start();
if(isset($_POST['btnchangepassword']))
{
	$OldPassword = $_POST['txtoldpassword'];
	$NewPassword = $_POST['txtnewpassword'];
	$RetypePassword = $_POST['txtrepassword'];
	$seltutor = "select * from tbl_tutor where tutor_id = ".$_SESSION['tid'];
	$tutor = $con->query($seltutor);
	$data = $tutor->fetch_assoc();
	
	if($data['tutor_password'] == $OldPassword)
	{
		if($NewPassword == $RetypePassword)
		{
			$updatetutor = "update tbl_tutor set tutor_password='$NewPassword' where tutor_id=".$_SESSION['tid'];
			if($con->query($updatetutor))
			{
				
				echo "password Updated";
				
			}
				
				else
				{
					
					echo "Password Failed to Update";
				}
			
		}
	}
	
	else{
		echo "Old Paasword Wrong";
	}
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tutor Change password</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="443" height="231" border="1">
    <tr>
      <td width="213">Old Password</td>
      <td width="214"><label for="txtoldpassword"></label>
      <input type="text" name="txtoldpassword" id="txtoldpassword" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txtnewpassword"></label>
      <input type="text" name="txtnewpassword" id="txtnewpassword" /></td>
    </tr>
    <tr>
      <td>Re-type Password</td>
      <td><label for="txtrepassword"></label>
      <input type="text" name="txtrepassword" id="txtrepassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnchangepassword" id="btnchangepassword" value="Change password" />
      <input type="submit" name="btncancel" id="btncancel" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>