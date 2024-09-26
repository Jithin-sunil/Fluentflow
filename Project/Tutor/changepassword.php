<?php
include('../Assests/connection/connection.php');
session_start();
if(isset($_POST['btnchangepassword']))
{
    $OldPassword = $_POST['txtoldpassword'];
    $NewPassword = $_POST['txtnewpassword'];
    $RetypePassword = $_POST['txtrepassword'];
    $seltutor = "SELECT * FROM tbl_tutor WHERE tutor_id = " . $_SESSION['tid'];
    $tutor = $con->query($seltutor);
    $data = $tutor->fetch_assoc();
    
    if($data['tutor_password'] == $OldPassword)
    {
        if($NewPassword == $RetypePassword)
        {
            $updatetutor = "UPDATE tbl_tutor SET tutor_password='$NewPassword' WHERE tutor_id=" . $_SESSION['tid'];
            if($con->query($updatetutor))
            {
                echo "<p class='success'>Password Updated</p>";
            }
            else
            {
                echo "<p class='error'>Password Failed to Update</p>";
            }
        }
        else
        {
            echo "<p class='error'>New passwords do not match</p>";
        }
    }
    else
    {
        echo "<p class='error'>Old Password is incorrect</p>";
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tutor Change Password</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        max-width: 600px;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        padding: 12px;
        text-align: left;
        border-bottom: 2px solid #ddd;
        background-color: #5a2d82;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f0e5f7;
    }

    tr:nth-child(odd) {
        background-color: #ffffff;
    }

    tr:hover {
        background-color: #e0d9f4;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .form-actions {
        text-align: center;
        margin-top: 20px;
    }

    .form-actions input {
        background-color: #5a2d82;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin: 0 10px;
    }

    .form-actions input:hover {
        background-color: #7a41a8;
    }

    .success {
        color: green;
        text-align: center;
    }

    .error {
        color: red;
        text-align: center;
    }
</style>
</head>

<body>

<div class="container">
    <form id="form1" name="form1" method="post" action="">
        <div class="form-group">
            <label for="txtoldpassword">Old Password</label>
            <input type="password" name="txtoldpassword" id="txtoldpassword" required />
        </div>
        <div class="form-group">
            <label for="txtnewpassword">New Password</label>
            <input type="password" name="txtnewpassword" id="txtnewpassword" required />
        </div>
        <div class="form-group">
            <label for="txtrepassword">Re-type Password</label>
            <input type="password" name="txtrepassword" id="txtrepassword" required />
        </div>
        <div class="form-actions">
            <input type="submit" name="btnchangepassword" id="btnchangepassword" value="Change Password" />
            <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
        </div>
    </form>
</div>

</body>
</html>
