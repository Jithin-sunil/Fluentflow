<?php
include('../Assests/connection/connection.php');
include('Header.php');

 $selUser="select * from tbl_user u inner join tbl_place p on u.place_id = p.place_id inner join tbl_district d on p.district_id where u.user_id = ".$_SESSION['uid'];
	$user=$con->query($selUser);
	$data=$user->fetch_assoc();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Myprofile</title>

</head>

<body>

<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td colspan="2"><img src='../Assests/File/User/Photo/<?php echo $data['user_photo'] ?>' alt="User Photo"/></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $data['user_name'] ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data['user_email'] ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data['user_contact'] ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data['user_address'] ?></td>
    </tr>
    <tr>
      <td>District</td>
      <td><?php echo $data['district_name'] ?></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><?php echo $data['place_name'] ?></td>
    </tr>
    <tr>
      <td>Date of Birth</td>
      <td><?php echo $data['user_dob'] ?></td>
    </tr>
    <tr>
      <td colspan="2"><a href="EditProfile.php">Edit profile</a>  &nbsp;  <a href="ChangePassword.php">Change password</a></td>
    </tr>
  </table>
</form>

</body>
</html><?php
include('Footer.php');
?>
