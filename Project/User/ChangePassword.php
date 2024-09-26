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
				echo "<p class='success'>Password updated successfully.</p>";
			} else {
				echo "<p class='error'>Failed to update password.</p>";
			}
		} else {
			echo "<p class='error'>New passwords do not match.</p>";
		}
	} else {
		echo "<p class='error'>Old password is incorrect.</p>";
	}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
<style>
    /* General body styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }
    
    /* Form container styling */
    form {
        width: 100%;
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Table styling */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
    }

    table tr:last-child td {
        border-bottom: none;
    }

    /* Input field styling */
    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    /* Button styling */
    input[type="submit"] {
        background-color: #5a2d82;
        color: #ffffff;
        border: none;
        padding: 12px 20px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #7a4f9f;
    }

    /* Success and error message styling */
    .success {
        color: #4caf50;
        font-weight: bold;
        text-align: center;
        margin-bottom: 15px;
    }

    .error {
        color: #f44336;
        font-weight: bold;
        text-align: center;
        margin-bottom: 15px;
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td>Old Password</td>
      <td><input type="text" name="txtoldpassword" id="txtoldpassword" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><input type="text" name="txtnewpassword" id="txtnewpassword" /></td>
    </tr>
    <tr>
      <td>Re-type Password</td>
      <td><input type="text" name="txtrepassword" id="txtrepassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="btnchangepassword" id="btnchangepassword" value="Change Password" />
      </td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include('Footer.php');
?>
