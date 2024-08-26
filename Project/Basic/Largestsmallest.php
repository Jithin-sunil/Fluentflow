<?php
$large=" ";
$small=" ";
if (isset($_POST['btnfind'])!=null)
{
	$no1=$_POST['txtnumber1'];
	$no2=$_POST['txtnumber2'];
	$no3=$_POST['txtnumber3'];
	if($no1>$no2)
	{
		$large=$no1;
	}
	else
	{
		$large=$no2;
	}
	if($large>$no3)
	{
		$result="largest=".$large;
	}
	else
	{
		$large="".$no3;	
	}
	if($no1<$no2)
	{
		$small=$no1;
	}
	else
	{
		$small=$no2;
	}
	if($small<$no3)
	{
		$result="smallest=".$small;
	}
	else
	{
		$result="smallest=".$no3;
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
  <table width="321" height="171" border="1">
    <tr>
      <td width="104">Number 1</td>
      <td width="201"><label for="txtnumber1"></label>
      <input type="text" name="txtnumber1" id="txtnumber1" /></td>
    </tr>
    <tr>
      <td>Number 2</td>
      <td><label for="txtnumber2"></label>
      <input type="text" name="txtnumber2" id="txtnumber2" /></td>
    </tr>
    <tr>
      <td>Number 3</td>
      <td><label for="txtnumber3"></label>
      <input type="text" name="txtnumber3" id="txtnumber3" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnfind" id="btnfind" value="Find" /></td>
    </tr>
    <tr>
      <td>Largest</td>
      <td><?php echo $large ?></td>
    </tr>
    <tr>
      <td>Smallest</td>
      <td><?php echo $small ?></td>
    </tr>
  </table>
</form>
</body>
</html>
