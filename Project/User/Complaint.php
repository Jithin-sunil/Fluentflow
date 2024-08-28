<?php
include('Header.php');
include('../Assests/connection/connection.php');
if(isset($_POST['btnsubmit']))
{

	$title = $_POST['txttitle'];
	$content = $_POST['txtcontent'];
	
	$insqry="insert into tbl_complaint(complaint_title,complaint_content,complaint_date,user_id)values('$title','$content',curdate(),'".$_SESSION['uid']."')";
	if($con->query($insqry))
	{
	?>
		<script>
	 	alert('Complaint Submited')
		</script>
        
    <?php
	}
}
if(isset($_GET["delID"]))
	 {
		 $complaint=$_GET["delID"];
		 $delqry="delete from tbl_complaint where complaint_id='$complaint'";
		 if($con->query($delqry))
	      {
			  ?>
              <script>
			  alert('Complaint Deleted')
			  </script>
              <?php
		  }
	 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Complaint</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="334" height="262" border="1" align="center">
    <tr>
      <td width="156" align="center">Title</td>
      <td width="162"><label for="txttitle"></label>
      <input type="text" name="txttitle" id="txttitle" /></td>
    </tr>
    <tr>
      <td align="center">Content</td>
      <td><label for="txtcontent"></label>
      <textarea name="txtcontent" id="txtcontent" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center" ><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
  </br></br>
  <table width="348" height="73" border="1" align="center">
    <tr>
      <td align="">Title</td>
      <td align="center">Content</td>
      <td align="center">Date</td>
      <td align="center">Reply</td>
      <td align="center">Action </td>
    </tr>
    <?php
		$selqry = "select * from tbl_complaint";
		$adm=$con->query($selqry);
		$i=0;
		 while($data=$adm->fetch_assoc())
		 {				
			$i++;
    ?>
	<tr>
      <td align="center"><?php echo $data['complaint_title']?></td>
      <td align="center"><?php echo $data['complaint_content']?></td>
      <td align="center"><?php echo $data['complaint_date']?></td>
      <td align="center"><?php echo $data['user_reply']?></td>
      <td align="center"><a href="Complaint.php?delID=<?php echo $data['complaint_id']?>">Delete</a></td>
    </tr>
    <?php
		 }
		 ?>
  </table>
</form>
</body>
</html><?php
include('Footer.php');
?>