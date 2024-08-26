<?php
include('../Assests/connection/connection.php');
session_start();

 $selUser="select * from tbl_user u inner join tbl_place p on u.place_id = p.place_id inner join tbl_district d on p.district_id where u.user_id = ".$_SESSION['uid'];
	$user=$con->query($selUser);
	$data=$user->fetch_assoc();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Myprofile</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    table {
        width: 100%;
        max-width: 500px;
        border-collapse: collapse;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
    }

    table img {
        width: 100%;
        height: auto;
        border-bottom: 2px solid #ddd;
    }

    td {
        padding: 15px;
        font-size: 14px;
        color: #333;
    }

    td:first-child {
        font-weight: bold;
        background-color: #f9f9f9;
        width: 40%;
    }

    tr:last-child td {
        text-align: center;
    }

    a {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
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
</html>
