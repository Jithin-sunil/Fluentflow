<?php

include('../Assests/connection/connection.php');

if(isset($_POST['btnsubmit'])!=null)
{
	$name=$_POST['txtname'];
	$pincode=$_POST['txtpincode'];
	$districtID=$_POST["selDistrict"];
	
    $insqry="insert into tbl_place(place_name,place_pincode,district_id)values('$name','$pincode','$districtID')";
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
	$placeID=$_GET["delID"];
	$delQry="delete from tbl_place where place_id='$placeID'";
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
<title>Place</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table align="center" border="1">
  
  	<tr>
    			<td>District</td>
                <td>
                		<select name="selDistrict">
                        
                        		<option value="--select--">--select---</option>
                                
                                <?php
		   
		   								$selQry="select * from tbl_district";
										$result=$con->query($selQry);
										while($data=$result->fetch_assoc())
										{
								?>
                                
                                <option value="<?php echo $data["district_id"]?>"><?php echo $data["district_name"]?></option>
                                
                                <?php
										}
								?>
                                
                        </select>
                        
                </td>
    
    </tr>
  
  
  
    <tr>
      <td >Place Name</td>
      <td ><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    
    
    
    
    <tr>
      <td >Pincode</td>
      <td ><label for="txtpincode"></label>
      <input type="text" name="txtpincode" id="txtpincode" /></td>
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
                    <th>PlaceName</th>
                  	<th>Pincode</th>
                    <th>District</th>
                    <th>Action</th>
           </tr>
           
           <?php
		   
		   				$selQry="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
						$result=$con->query($selQry);
						$i=0;
						while($data=$result->fetch_assoc())
						{
							$i++;
			?>
            
            <tr>
            		<td><?php echo $i;?></td>
                    <td><?php echo $data["place_name"]?></td>
                    <td><?php echo $data["place_pincode"]?></td>
                    <td><?php echo $data["district_name"]?></td>
                    <td><a href="Place.php?delID=<?php echo $data["place_id"]?>">Delete</a></td>
                    
            </tr>
            
            <?php
			
						}
			?>
						
</table>