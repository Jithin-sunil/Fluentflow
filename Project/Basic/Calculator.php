<?php
$result=" ";
  if(isset($_POST['btnplus'])!=null)
  {
	  $no1=$_POST['txtnumber1'];
	  $no2=$_POST['txtnumber2'];
	  $sum=$no1+$no2;
	  $result="sum=".$sum;
  }
  if(isset($_POST['btnminus'])!=null)
  {
	  $no1=$_POST['txtnumber1'];
	  $no2=$_POST['txtnumber2'];
	  $minus=$no1-$no2;
	  $result="minus=".$minus;
  }
   if(isset($_POST['btnmultiplication'])!=null)
  {
	  $no1=$_POST['txtnumber1'];
	  $no2=$_POST['txtnumber2'];
	  $multi=$no1*$no2;
	  $result="multiply=".$multi;
  }
   if(isset($_POST['btndivision'])!=null)
  {
	  $no1=$_POST['txtnumber1'];
	  $no2=$_POST['txtnumber2'];
	  $div=$no1/$no2;
	  $result="division=".$div;
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
  <table width="295" height="172" border="1">
    <tr>
      <td width="82">Number 1</td>
      <td width="197">
      <input type="text" name="txtnumber1" id="txtnumber1" /></td>
    </tr>
    <tr>
      <td>Number 2</td>
      <td>
      <input type="text" name="txtnumber2" id="txtnumber2" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnplus" id="btnplus" value="+" />
      <input type="submit" name="btnminus" id="btnminus" value="-" />
      <input type="submit" name="btnmultiplication" id="btnmultiplication" value="*" />
      <input type="submit" name="btndivision" id="btndivision" value="/" /></td>
    </tr>
    <tr>
      <td height="42">Result</td>
      <td><?php echo $result ?></td>
    </tr>
  </table>
</form>
</body>
</html>