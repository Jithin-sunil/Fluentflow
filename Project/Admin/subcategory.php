<?php
include('../Assests/connection/connection.php');

if(isset($_POST['btnsave']))
{
	$name=$_POST["selcategory"];
	$subname=$_POST["txtsubcategory"];
	$insqry="insert into tbl_subcategory(subcategory_name,category_id)values('$subname','$name')";
	if($con->query($insqry))
	{	
?>
	<script>
	alert('Inserted')
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
  <table width="441" height="196" border="1" align="center">
    <tr>
      <td width="160">Category</td>
      <td width="265"><label for="selcategory"></label>
        <select name="selcategory" id="selcategory">
        <option value="--select--">--select---</option>
        <?php
			$selqry="select * from tbl_category";
			$subcategory=$con->query($selqry);
			$i=0;
			while($data=$subcategory->fetch_assoc())
		     {
				 $i++;

		?>
        <option value="<?php echo $data['category_id']?>"><?php echo $data['category_name']?>"</option>
        <?php
			 }
		?>
      </select></td>
    </tr>
    <tr>
      <td>subcategory</td>
      <td><label for="txtsubcategory"></label>
      <input type="text" name="txtsubcategory" id="txtsubcategory" /></td>
    </tr>
    <tr>
      <td colspan="2"align="center"><input type="submit" name="btnsave" id="btnsave" value="save" />
      <input type="submit" name="btncancel" id="btncancel" value="cancel" /></td>
    </tr>
    </table>
      <br>
  <table width="280" height="78" border="1" align="center">
    <tr>
      <td width="83">Category</td>
      <td width="70">Subcategory</td>
      <td width="69">Action</td>
    </tr>
    <?php
		$selqry="select * from tbl_subcategory";
		$subcat=$con->query($selqry);
		$i=0;
		while($data=$subcat->fetch_assoc())
		{	
		$i++;
		
	?>
	
	
    <tr>
      <td><?php echo $data['category_id']?></td>
      <td><?php echo $data['subcategory_name']?></td>
      <td><a href="Subcategory.php?delID=<?php echo $data['subcategory_id']?>">delete</a></td>
    </tr>
    <?php
		}
		?>
  </table>
</form>
</body>
</html>
