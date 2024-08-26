<?php
include('../Assests/connection/connection.php');
session_start();
if(isset($_POST['btnadd']))
	{
      $coursename=$_POST['txtcoursename'];
	  $coursedetails=$_POST['txtcoursedetails'];
	  $courseprice=$_POST['txtcourseprice'];
	  $language=$_POST['sellanguage'];
	  
	 $insqry="insert into tbl_course(course_name,course_details,course_price,language_id,tutor_id)values('$coursename','$coursedetails','$courseprice','$language','".$_SESSION['tid']."')";
	 if($con->query($insqry))
		{
	 ?>
     <script>
	 alert('Course Added')
	 </script>
     
     <?php
		}
	
	}
 if(isset($_GET["delID"]))
	 {
		 $cours=$_GET["delID"];
		 $delqry="delete from tbl_course where course_id='$cours'";
		 if($con->query($delqry))
	      {
			  ?>
              <script>
			  alert('Deleted')
			  </script>
              <?php
		  }
	 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Course</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="356" height="287" border="1" align="center">
    <tr>
      <td width="171" height="58">Course Name</td>
      <td width="157"><label for="txtcoursename"></label>
      <input type="text" name="txtcoursename" id="txtcoursename" /></td>
    </tr>
    <tr>
      <td height="60">Course Details</td>
      <td><label for="txtcoursedetails"></label>
      <input type="text" name="txtcoursedetails" id="txtcoursedetails" /></td>
    </tr>
    <tr>
      <td>Course Price</td>
      <td><label for="txtcourseprice"></label>
      <input type="text" name="txtcourseprice" id="txtcourseprice" /></td>
    </tr>
    <tr>
      <td height="56">Language</td>
      <td><label for="sellanguage"></label>
        <select name="sellanguage" id="sellanguage">
        <option "value= --select--">--select--</option>
         <?php
         $selqry="select * from tbl_language";
		 $lang=$con->query($selqry);
		 $i=0;
		 while($data=$lang->fetch_assoc())
		 {
			 $i++;	
	
	?>
    <option value= <?php echo $data['language_id']?>> <?php echo $data['language_name']?></option>
    <?Php
		 }
	?>
      </select></td>
    </tr>
    
   
      <td colspan="2" align="center"><input type="submit" name="btnadd" id="btnadd" value="Add" /></td>
    </tr>
	
  </table>
  </br>
  <table width="785" height="85" border="1" align="center">
    <tr>
      <td width="191">Course Name</td>
      <td width="142">Details</td>
      <td width="126">Price</td>
      <td width="134">Language</td>
      <td width="158">Action</td>
    </tr>
     <?php
         $selqry="select * from tbl_course p inner join tbl_language d on p.language_id=d.language_id";
		 $course=$con->query($selqry);
		 $i=0;
		 while($data=$course->fetch_assoc())
		 {
			$i++;	
	
	?>
    
    <tr>
      <td><?php echo $data ['course_name'] ?></td>
      <td><?php echo $data ['course_details'] ?></td>
      <td><?php echo $data ['course_price'] ?></td>
      <td><?php echo $data ['language_name'] ?></td>
      <td><a href="Course.php?delID=<?php echo $data['course_id']?>">delete</a></td>
     
     
    <?php
		 }
		 ?>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>