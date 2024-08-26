<?php
include('../Assests/connection/connection.php');
if(isset($_POST['btnadd']))
{
	$language=$_POST['txtlanguage'];
	
	$insqry= "insert into tbl_language(language_name)values('$language')";
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
		 $languag=$_GET["delID"];
		 $delqry="delete from tbl_language where language_id='$languag'";
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
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="337" height="111" border="1" align="center">
    <tr>
      <td>Language
        <label for="txtlanguage"></label>
      <input type="text" name="txtlanguage" id="txtlanguage" /></td>
    </tr>
    <tr>
      <td align="center"><input type="submit" name="btnadd" id="btnadd" value="Add" /></td>
    </tr>
  </table><br/>
  <table width="267" height="117" border="1" align="center">
    <tr>
      <td width="130">SLNO</td>
      <td width="121">Language</td>
      <td width="130">Action</td>
    </tr>
    <?php
         $selqry="select * from tbl_language";
		 $lang=$con->query($selqry);
		 $i=0;
		 while($data=$lang->fetch_assoc())
		 {
			$i++;	
	
	?>
    
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data ['language_name'] ?></td>
      <td><a href="Language.php?delID=<?php echo $data['language_id']?>">delete</a></td>
      <?php
		 }
	  ?>

    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>