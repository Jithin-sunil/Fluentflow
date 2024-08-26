<?php
$name=" ";
$gender=" ";
$dept=" ";
$total=" ";
$pp=" ";
$grade=" ";
if(isset($_POST['btnsubmit'])!=null)
{
	$fname=$_POST['txtfname'];
	$lname=$_POST['txtlname'];
	$gender=$_POST['gender'];
	$dept=$_POST['seldept'];
	$m1=$_POST['txtm1'];
	$m2=$_POST['txtm2'];
	$m3=$_POST['txtm3'];
	
	if($gender=="male")
	{
		$name = "Mr.".$fname."".$lname;
	}
		else
		{
			$name = "Mrs.".$fname."".$lname;
		}
		
		$total=$m1+$m2+$m3;
		$pp=($total/300)*100;
		
		if($pp>=90)
		{
			$grade="A+";
		}
		else if($pp>=80)
		{
			$grade="A";
		}
		else if($pp>=70)
		{
			$grade="B+";
		}
		else if($pp>=60)
		{
			$grade="B";
		}
			else if($pp>=50)
		{
			$grade="C+";
		}
		else if($pp>=40)
		{
			$grade="C";
		}
		else if($pp>=30)
		{
			$grade="E";
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
  <table width="260" height="318" border="1">
    <tr>
      <td width="100">Firstname</td>
      <td width="144"><label for="txtfname"></label>
      <input type="text" name="txtfname" id="txtfname" /></td>
    </tr>
    <tr>
      <td>Lastname</td>
      <td><label for="txtlname"></label>
      <input type="text" name="txtlname" id="txtlname" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="gender" id="gender" value="male" />
      <label for="gender">male
        <input type="radio" name="gender" id="gender2" value="female" />
      female</label></td>
    </tr>
    <tr>
      <td>Department</td>
      <td> 
        <select name="seldept" id="Department">
        <option>--select--</option>
        <option>BCA</option>
        <option>BBA</option>
        <option>BCOM</option>
      </select></td>
    </tr>
    <tr>
      <td>M1</td>
      <td><label for="txtm1"></label>
      <input type="text" name="txtm1" id="txtm1" /></td>
    </tr>
    <tr>
      <td>M2</td>
      <td><label for="txtm2"></label>
      <input type="text" name="txtm2" id="txtm2" /></td>
    </tr>
    <tr>
      <td>M3</td>
      <td><label for="txtm3"></label>
      <input type="text" name="txtm3" id="txtm3" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="cancel" /></td>
    </tr>
  </table>
  <table width="204" height="190" border="1">
    <tr>
      <td width="88">Name</td>
      <td width="100"> <?php echo $name ?></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><?php echo $gender ?></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><?php echo $dept ?></td>
    </tr>
    <tr>
      <td>Total</td>
      <td><?php echo $total ?></td>
    </tr>
    <tr>
      <td>Percentage</td>
      <td><?php echo $pp ?></td>
    </tr>
    <tr>
      <td height="23">Grade</td>
      <td><?php echo $grade ?></td>
    </tr>
  </table>
</form>
</body>
</html>