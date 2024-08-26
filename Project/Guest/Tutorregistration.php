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
	$dob=$_POST["txtdob"];
	$doj=$_POST["txtdoj"];
	$password=$_POST["txtpassword"];
	$confrimpassword=$_POST["txtpassword"];
	$photo=$_FILES['filephoto']['name'];
    $tempphoto=$_FILES['filephoto']['tmp_name'];
	$proof=$_FILES['fileproof']['name'];
	$tempproof=$_FILES['fileproof']['tmp_name'];
	move_uploaded_file($tempphoto,'../Assests/File/User/Photo/'.$photo);
	move_uploaded_file($tempproof,'../Assests/File/Tutor/Photo/'.$proof);
	
	$insqry="insert into tbl_tutor(tutor_name,tutor_email,place_id,tutor_address,tutor_contact,tutor_photo,tutor_proof,tutor_dob,tutor_doj,tutor_password)values('$name','$email','$place','$address','$contact','$photo','$proof','$dob','$doj','$password')";
 	if($confrimpassword==$password)
	{
		if($con->query($insqry))
		{
	 ?>
     
        <script>
		alert('Tutor Registration Succesfully')
		</script>
        
     <?php
	}
	  else
	  {
	 ?>
     
	  	<script>
		alert('Tutor Registration Falied')
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
<title>Tutor Registration</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="617" height="751" border="1" align="center">
    <tr>
      <td width="179">Name </td>
      <td width="185"><label for="txtname"></label>
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
        <label for="selplace"></label>
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
      <td>Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="filephoto"></label>
      <input type="file" name="filephoto" id="filephoto" /></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label for="fileproof"></label>
      <input type="file" name="fileproof" id="fileproof" /></td>
    </tr>
    <tr>
      <td>Date of Birth</td>
      <td><label for="txtdob"></label>
      <input type="date" name="txtdob" id="txtdob" /></td>
    </tr>
    <tr>
      <td>Date of Join</td>
      <td><label for="txtdoj"></label>
      <input type="date" name="txtdoj" id="txtdoj" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" /></td>
    </tr>
    <tr>
      <td>Confrim Password</td>
      <td><label for="txtconfrimpassword"></label>
      <input type="password" name="txtconfrimpassword" id="txtconfrimpassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
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