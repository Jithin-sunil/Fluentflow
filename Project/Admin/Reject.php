<?php
include('../Assests/Connection/Connection.php');

if(isset($_GET["aid"]))
	 {
		 $aid=$_GET["aid"];
		 $upQry="update tbl_tutor set tutor_status='1' where tutor_id='$aid'";
		 if($con->query($upQry))
	      {
			  ?>
              <script>
			  alert('Approved')
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
<title>Tutor Verfication</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="1117" height="173" border="1" align="center">
    <tr>
      <td width="109">SLNO</td>
      <td width="108">Tutor Name</td>
      <td width="101">Email</td>
      <td width="120">Contact</td>
      <td width="115">Address</td>
      <td width="108">Photo</td>
      <td width="106">Proof</td>
      <td width="106">Date of Join</td>
      <td width="186">Action</td>
    </tr>
    <?php 
	
		$selqry="select * from tbl_tutor where tutor_status='2' ";
		$tutor=$con->query($selqry);
		$i=0;
		while($data=$tutor->fetch_assoc())
		{	
		$i++;
		
	?>
      <tr>
      	<td><?php echo $i ?></td>
      	<td><?php echo $data ['tutor_name']?></td>
      	<td><?php echo $data ['tutor_email']?></td>
      	<td><?php echo $data ['tutor_contact']?></td>
      	<td><?php echo $data ['tutor_address']?></td>
      	<td><?php echo $data ['tutor_photo']?></td>
      	<td><?php echo $data ['tutor_proof']?></td>
        <td><?php echo $data ['tutor_doj']?></td>
      	<td><a href="Tutorverification.php?aid=<?php echo $data['tutor_id']?>">Accept</a>&nbsp;&nbsp;
      </tr>
    <?php
		}
	?>
	
  </table>
</form>
</body>
</html>