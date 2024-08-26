<?php
include('../Assests/connection/connection.php');
session_start();
if(isset($_POST['btnadd']))
  {
	  $language=$_POST['sellang'];
	  
	  $insqry= "insert into tbl_tutor_language(language_id,tutor_id)values ('$language','".$_SESSION['tid']."')";
	  if($con->query($insqry))
		{
	 ?>
     	<script>
	 	alert('Language Saved')
	    </script>
     
     <?php
		}
  }
 if(isset($_GET["delID"]))
	 {
	 $language=$_GET["delID"];
	 $delqry="delete from tbl_tutor_language where language_id='$language'";
		if($con->query($delqry))
	      {
			  ?>
              <script>
			  alert('Language Deleted')
			  </script>
              <?php
		  }
	 }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My language</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="317" height="159" border="1" align="center">
    <tr>
      <td width="154">Language</td>
      <td width="147"><label for="sellang"></label>
        <select name="sellang" id="sellang">
        <option value="--select--">--select--</option>
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
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnadd" id="btnadd" value="Submit" /></td>
    </tr>
  </table>
  </br>
  <table width="294" height="96" border="1" align="center">
    <tr>
      <td>Language</td>
      <td>Action</td>
    </tr>
    <?php
         $selqry="select * from tbl_tutor_language p inner join tbl_language d on p.language_id = d.language_id";
		 $lang=$con->query($selqry);
		 $i=0;
		 while($data=$lang->fetch_assoc())
		 {
			 $i++;	
	
	?>
    
    <tr>
      <td><?php echo $data['language_name']?></td>
      <td><a href="Mylanguage.php?delID=<?php echo $data['language_id']?>">delete</a></td>
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