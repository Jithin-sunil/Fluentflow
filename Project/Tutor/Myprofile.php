<?php
include('../Assests/connection/connection.php');
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tutor Myprofile</title>
</head>
<body>
<?php
 
  
  $seltutor="select * from tbl_tutor u inner join tbl_place p on u.place_id = p.place_id inner join tbl_district d on p.district_id=d.district_id where u.tutor_id = ".$_SESSION['tid'];
 
	$tutor=$con->query($seltutor);
	$data=$tutor->fetch_assoc();
?>
<form id="form1" name="form1" method="post" action="">
  <table width="410" height="591" border="1" align="center">
    <tr>
      <td height="200" colspan="2"><img src='../Assests/File/Tutor/Photo/<?php echo $data['tutor_photo'] ?>' height="200" width="400"/></td>
    </tr>
    <tr>
      <td width="186">Name</td>
      <td width="208"><?php echo $data['tutor_name'] ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data['tutor_email'] ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data['tutor_contact'] ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data['tutor_address'] ?></td>
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
      <td><?php echo $data['tutor_dob'] ?></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><a href="EditProfile.php">Edit profile</a>  &nbsp;  <a href="ChangePassword.php">Change password</a></td>
    </tr>
  </table>
</form>
</body>
</html>