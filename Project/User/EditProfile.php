<?php
include('../Assests/connection/connection.php');
include('Header.php');
if(isset($_POST['btnedit']))
{
	$name=$_POST['txtname'];
	$email=$_POST['txtemail'];
	$contact=$_POST['txtcontact'];
	$address=$_POST['txtaddress'];
	$upUser="update tbl_user set user_name='$name',user_email='$email',user_contact='$contact',user_address='$address' where user_id=".$_SESSION['uid'];
	if($con->query($upUser))
	{
		?>
        <script>
		alert("Record saved");
		</script>
        <?php
}
	else
	{
		?>
        <script>
		alert("Record Failed");
		</script>
        <?php
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
  <table width="417" height="252" border="1">
  <?php 
 $selUser="select * from tbl_user u inner join tbl_place p on u.place_id = p.place_id inner join tbl_district d on p.district_id where u.user_id = ".$_SESSION['uid'];
	$user=$con->query($selUser);
	$data=$user->fetch_assoc();
?>
    <tr>
      <td width="131" height="31">Name</td>
      <td width="270"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" value="<?php echo $data['user_name'] ?>"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" value="<?php echo $data['user_email'] ?>"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" value="<?php echo $data['user_contact'] ?>" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtaddress"></label>
      <input type="text" name="txtaddress" id="txtaddress" value="<?php echo $data['user_address'] ?>" /></td>
    </tr>
        <tr>
      <td height="49" colspan="2" align="center"><input type="submit" name="btnedit" id="btnedit" value="Edit" /></td>
    </tr>
  </table>
</form>
</body>
</html><?php
include('Footer.php');
?>