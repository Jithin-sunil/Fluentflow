<?php

include('../Assests/connection/connection.php');

if(isset($_POST['btnsubmit'])!=null)
{
	$name=$_POST['txtname'];
	$email=$_POST['txtemail'];
	$districtID=$_POST["seldistrict"];
	$place=$_POST["selplace"];
	$address=$_POST["txtaddress"];
	$contact=$_POST["txtcontact"];
	$dob=$_POST["date"];
	$password=$_POST["password"];
	$confrimpassword=$_POST["password"];
	$photo=$_FILES['filephoto']['name'];
    $tempphoto=$_FILES['filephoto']['tmp_name'];
	move_uploaded_file($tempphoto,'../Assests/File/User/Photo/'.$photo);

   	$insqry="insert into tbl_user(user_name,user_email,place_id,user_address,user_photo,user_contact,user_dob,user_password,user_district)
	values('$name','$email','$place','$address','$photo','$contact','$dob','$password','$districtID')";
	if($confrimpassword==$password)
	{
		if($con->query($insqry))
		{
	 	?>
        <script>
		alert('User Registration Succesfully')
		</script>
        <?php
	}
	  else
	  {
		?>
	  	<script>
		alert('User Registration Falied')
		</script>
     	<?php
	  }
}
	  else
	  {
		  ?>
        <script>
		alert("Password doesn't match")
		</script>
        <?php
	  }

}
		?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserRegistration</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="434" height="507" border="1">
    <tr>
      <td width="222"><p>Name </p></td>
      <td width="196"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" /></td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="seldistrict"></label>
        <select name="seldistrict" id="seldistrict" onChange="getPlace(this.value)">
        <option value="--select--">--select---</option> 
        
        <?php
		
		$selQry="select * from tbl_district";
		$district=$con->query($selQry);
		while($data=$district->fetch_assoc())
		{
			$i++;
			
		?>
			<option value="<?php echo $data ['district_id']?>"><?php
			echo $data['district_name']?></option>
		<?php
		}
		?>
        
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="selplace"></label>
        <select name="selplace" id="selplace">
        <option value="--select--">--select---</option>
        
       
      </select></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtaddress"></label>
      <textarea name="txtaddress" id="txtaddress" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="filephoto"></label>
      <input type="file" name="filephoto" id="filephoto" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" /></td>
    </tr>
    <tr>
      <td>Date of Birth</td>
      <td><label for="date"></label>
      <input type="date" name="date" id="date" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="password"></label>
      <input type="password" name="password" id="password" /></td>
    </tr>
    <tr>
      <td>ConfrimPassword</td>
      <td><label for="password"></label>
      <input type="password" name="password2" id="password" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
<script src="../Assests/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assests/AjaxPages/AjaxPlace.php?did=" + did,
      success: function (result) {

        $("#selplace").html(result);
      }
    });
  }

</script>
</html>