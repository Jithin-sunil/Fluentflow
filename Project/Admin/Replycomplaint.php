<?php
session_start();
include('../Assests/connection/connection.php');
if(isset($_POST['btnsubmit']))
{
	$reply=$_POST['txtreply'];
	
	$update = " update tbl_complaint set user_reply='".$reply."' where complaint_id=".$_GET['cid'];
	if($con->query($update))
	{
	?>
		<script>
	 	alert('Complaint Replied')
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
  <table width="367" height="158" border="1" align="center">
    <tr>
      <td width="71" align="center">Reply</td>
      <td width="141"><label for="txtreply"></label>
      <textarea name="txtreply" id="txtreply" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>