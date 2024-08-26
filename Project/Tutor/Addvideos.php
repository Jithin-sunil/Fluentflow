<?php
include('../Assests/connection/connection.php');
if(isset($_POST['btnadd']))
  {
	  $name=$_POST['txtname'];
	  $file=$_FILES['file_files']['name'];
	  $tempfile=$_FILES['file_files']['tmp_name'];
	  move_uploaded_file($tempfile,'../Assests/File/Tutor/Videos/'.$file);
  
	  $insqry="insert into tbl_video(video_name,video_file)values('$name','$file')";
	  if($con->query($insqry))
	  {
		?>
        <script>
		alert('File Added')
		</script>
        <?php
	  }
  }
  
if(isset($_GET["delID"]))
	{
	$video=$_GET["delID"];
	$delqry="delete from tbl_videos where video_id='$video'";
	if($con->query($delqry))
		  {
			  ?>
              <script>
			  alert('File Deleted')
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
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1" align="center">
    <tr>
      <td width="85">Name </td>
      <td width="99"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td> File</td>
      <td><label for="file_files"></label>
      <input type="file" name="file_files" id="file_files" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnadd" id="btnadd" value="Add" /></td>
    </tr>
  </table><br/>
  <table width="351" height="71" border="1" align="center">
    <tr>
      <td width="70" align="center">Course</td>
      <td width="92" align="center">Video Name</td>
      <td width="76" align="center">File</td>
      <td width="85" align="center">Action</td>
    </tr>
    <?php
			$selqry="select * from tbl_video p inner join tbl_course d on p.course_id = d.course_id ";
			$vid=$con->query($selqry);
			$i=0;
			while($data=$vid->fetch_assoc())
			{
			  $i++;
        
	?>
    <tr>
   	  <td><?php echo $data['course_name']?></td>
      <td><?php echo $data['video_name']?></td>
      <td><?php echo $data['video_file']?></td>
      <td><a href="Addvideos.php?delID=<?php echo $data['video_id']?>">Delete</a></td>
      <?php
			}
	   ?>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>	