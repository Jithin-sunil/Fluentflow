<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1>Hello <?php echo $_SESSION['aName']; ?></h1>
<a href="District.php">District</a><br/><br/>
<a href="Place.php">Place</a><br/><br/>
<a href="Category.php">Category</a><br/><br/>
<a href="subcategory.php">Subcategory</a><br/><br/>
<a href="Tutorverification.php">Tutor Verification</a><br/><br/>
<a href="Tutorlist.php">Tutor List</a><br/><br/>
<a href="Userlist.php">User List</a><br/><br/>
<a href="UserPayments.php">User Payments</a><br/><br/>
<a href="ViewComplaint.php">View Complaint</a><br/><br/>
</body>
</html>