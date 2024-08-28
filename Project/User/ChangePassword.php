<?php
include('../Assests/connection/connection.php');
include('Header.php');
if(isset($_POST['btnchangepassword']))
{
	$OldPassword = $_POST['txtoldpassword'];
	$NewPassword = $_POST['txtnewpassword'];
	$RetypePassword = $_POST['txtrepassword'];
	$selUser = "select * from tbl_user where user_id = ".$_SESSION['uid'];
	$user = $con->query($selUser);
	$data = $user->fetch_assoc();
	
	if($data['user_password'] == $OldPassword)
	{
		if($NewPassword == $RetypePassword)
		{
			$updateuser = "update tbl_user set user_password='$NewPassword' where user_id=".$_SESSION['uid'];
			if($con->query($updateuser)){
				
				echo "password Updated";
				
				}
				
				else{
					
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
<title>Untitled Document</title>
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
<?php
include('Footer.php');
?>