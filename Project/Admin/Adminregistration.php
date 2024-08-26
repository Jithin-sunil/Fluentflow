

<?php

include('../Assests/connection/connection.php');

if(isset($_POST['btnregister'])!=null)
{
	
	$name=$_POST['txtname'];
	$email=$_POST['txtemail'];
	$password=$_POST['txtpassword'];
	
    $insqry="insert into tbl_admin(admin_name,admin_email,admin_password)values('$name','$email','$password')";
	if($con->query($insqry))
	{
?>

		<script>
					alert("Record Saved...");
					window.location="Adminregistration.php";
		</script>
		
<?php
	}
	else
	{
?>
				<script>
					alert("Error");
					window.location="Adminregistration.php";
				</script>
<?php
			
	}
}
?>



<?php

if(isset($_GET["delID"]))
{
	$adminID=$_GET["delID"];
	$delQry="delete from tbl_admin where admin_id=$adminID";
	if($con->query($delQry))
	{
?>

		<script>
					alert("Record Deleted...");
					window.location="Adminregistration.php";
		</script>
		
<?php
	}
	else
	{
?>
				<script>
					alert("Error");
					window.location="Adminregistration.php";
				</script>
<?php
			
	}
	
}


?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AdminRegistration</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="405" height="175" border="1" border="1" align="center">
    <tr>
      <td width="106">Name</td>
      <td width="130"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td><p>Email</p></td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnregister" id="btnregister" value="Register" /></td>
    </tr>
  </table>

</form>
</body>
</html>


<br />
<table border="1" align="center">
			<tr>
            		<th>SINo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
           </tr>
           
           <?php
		   
		   				$selQry="select * from tbl_admin";
						$result=$con->query($selQry);
						$i=0;
						while($data=$result->fetch_assoc())
						{
							$i++;
			?>
            
            <tr>
            		<td><?php echo $i;?></td>
                    <td><?php echo $data["admin_name"]?></td>
                    <td><?php echo $data["admin_email"]?></td>
                    <td><?php echo $data["admin_password"]?></td>
                    <td><a href="Adminregistration.php?delID=<?php echo $data["admin_id"]?>">Delete</a></td>
            </tr>
            
            <?php
			
						}
			?>
						
</table>