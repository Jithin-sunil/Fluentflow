<?php
include('../Assests/connection/connection.php');


if(isset($_POST['btnsave']))
{
	$name=$_POST["txtname"];
	
	$insqry="insert into tbl_category(category_name)values('$name')";
	if($con->query($insqry))
	{
	 		header("location:Category.php");	
	}
	
}



    if(isset($_GET['deltID']))
	{
		$delqry="delete from tbl_category where category_id='".$_GET['deltID']."'";
		if($con->query($delqry))	
			{
	 				header("location:Category.php");
			}
			

	}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>category</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="403" height="131" border="1">
    <tr>
      <td width="183">Category Name</td>
      <td width="216"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="save" />
      <input type="submit" name="btncancel" id="btncancel" value="cancel" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
  <br />
  <table width="416" height="130" border="1">
  
    <tr>
      
             <th>SLNO</th>
             <th>Category</th>
             <th>Action</th>
                
    </tr>
    
   <?php
	
	      $selqry="select * from tbl_category";
		  $result=$con->query($selqry);
		  $i=0;
		  while($data=$result->fetch_assoc())
		  {
			  $i++;
			  
   ?>
       <tr>
       
            <td><?php echo $i ?> </td>
            <td><?php echo $data ["category_name"]?></td>
            <td><a href="Category.php?deltID=<?php echo $data['category_id'] ?>">Delete</a></td>            
    
    </tr>
    
    <?php
		  }
		  ?>
  </table>
  