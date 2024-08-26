<?php
include('../Assests/connection/connection.php');
if(isset($_POST['btnsubmit'])!=null)
{
	$name=$_POST['txtname'];
	
    $insqry="insert into tbl_district(district_name)values('$name')";
	if($con->query($insqry))
	{
	 		echo "record saved";
	}
	else
	{
			echo "error in query";
	}
}
    if(isset($_GET["delID"]))
{
	$districtID=$_GET["delID"];
	$delQry="delete from tbl_district where district_id='$districtID'";
	if($con->query($delQry))
	{
		
		echo "record Deleted";
}
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table align="center" border="1">
    <tr>
      <td >District Name</td>
      <td ><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>	
    </tr>
  </table>
</form>
</body>
</html>


<br />
<table border="1" align="center">
			<tr>
            		<th>SINo</th>
                    <th>DistrictName</th>
                  
                    <th>Action</th>
           </tr>
           
           <?php
		   
		   				$selQry="select * from tbl_district";
						$result=$con->query($selQry);
						$i=0;
						while($data=$result->fetch_assoc())
						{
							$i++;
			?>
            
            <tr>
            		<td><?php echo $i;?></td>
                    <td><?php echo $data["district_name"]?></td>
                    <td><a href="District.php?delID=<?php echo $data["district_id"]?>">Delete</a></td>
                    
            </tr>
            
            <?php
			
						}
			?>
						
</table>