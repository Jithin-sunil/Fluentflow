<?php
include('../Assests/Connection/Connection.php');
if(isset($_GET["rid"]))
	 {
		 $rid=$_GET["rid"];
		 $upQry="update tbl_tutor set tutor_status='2' where tutor_id='$rid'";
		 if($con->query($upQry))
	      {
			  ?>
              <script>
			  alert('Rejected')
			  window.location="Tutorverification.php"
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
  <table width="846" height="129" border="1">
    <tr>
      <td width="90" height="55">SLNO</td>
      <td width="122">Tutor Id</td>
      <td width="152">Tutor Name</td>
      <td width="151">Tutor Email</td>
      <td width="138">Tutor DOB</td>
      <td width="153">Tutor Contact</td>
      <td width="153">Action</td>
    </tr>
    <?php
		 $selqry="select * from tbl_tutor where tutor_status='1'";
		 $tutor=$con->query($selqry);
		 $i=0;
		 while($data=$tutor->fetch_assoc())
		 	{
				$i++;
		 	
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['tutor_id'] ?></td>
      <td><?php echo $data['tutor_name'] ?></td>
      <td><?php echo $data['tutor_email'] ?></td>
      <td><?php echo $data['tutor_dob'] ?></td>
      <td><?php echo $data['tutor_contact'] ?></td>
      <td><a href="Tutorverification.php?rid=<?php echo $data['tutor_id']?>">Reject</a></td>
    </tr>

  <?php
		}
  ?>
  </table>
</form>
</body>
</html>