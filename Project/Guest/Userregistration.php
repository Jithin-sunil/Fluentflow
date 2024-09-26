<?php
include('Header.php');
include('../Assests/connection/connection.php');

if (isset($_POST['btnsubmit'])) {
    $name = $_POST['txtname'];
    $email = $_POST['txtemail'];
    $place = $_POST["selplace"];
    $address = $_POST["txtaddress"];
    $contact = $_POST["txtcontact"];
    $dob = $_POST["date"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["password2"];
    $photo = $_FILES['filephoto']['name'];
    $tempPhoto = $_FILES['filephoto']['tmp_name'];
    move_uploaded_file($tempPhoto, '../Assests/File/User/Photo/' . $photo);

    $insqry = "INSERT INTO tbl_user(user_name, user_email, place_id, user_address, user_photo, user_contact, user_dob, user_password) 
    VALUES ('$name', '$email', '$place', '$address', '$photo', '$contact', '$dob', '$password')";

    if ($confirmPassword == $password) {
        if ($con->query($insqry)) {
            echo "<script>alert('User Registration Successfully');</script>";
        } else {
            echo "<script>alert('User Registration Failed');</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match');</script>";
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 70%;
            max-width: 800px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #6a0dad;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        .form-group input[type="text"], 
        .form-group input[type="date"], 
        .form-group input[type="password"], 
        .form-group textarea, 
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input[type="file"] {
            padding: 5px 0;
            margin-bottom: 10px;
        }
        .form-group input[type="submit"] {
            background-color: #6a0dad;
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .form-group input[type="submit"]:hover {
            background-color: #5c00a3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>User Registration</h1>
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="txtname">Name</label>
                <input type="text" name="txtname" id="txtname" required pattern="^[A-Za-z\s]+$" title="Name should contain only letters and spaces" />
            </div>
            <div class="form-group">
                <label for="txtemail">Email</label>
                <input type="email" name="txtemail" id="txtemail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter a valid email address" />
            </div>
            <div class="form-group">
                <label for="seldistrict">District</label>
                <select name="seldistrict" id="seldistrict" onChange="getPlace(this.value)" required>
                    <option value="">--select--</option>
                    <?php
                    $selQry = "SELECT * FROM tbl_district";
                    $district = $con->query($selQry);
                    while ($data = $district->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $data['district_id'] ?>"><?php echo $data['district_name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="selplace">Place</label>
                <select name="selplace" id="selplace" required>
                    <option value="">--select--</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txtaddress">Address</label>
                <textarea name="txtaddress" id="txtaddress" cols="45" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="filephoto">Photo</label>
                <input type="file" name="filephoto" id="filephoto" required />
            </div>
            <div class="form-group">
                <label for="txtcontact">Contact</label>
                <input type="text" name="txtcontact" id="txtcontact" required pattern="^\d{10}$" title="Contact number should be 10 digits" />
            </div>
            <div class="form-group">
                <label for="date">Date of Birth</label>
                <input type="date" name="date" id="date" required />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required pattern=".{6,}" title="Password must be at least 6 characters long" />
            </div>
            <div class="form-group">
                <label for="password2">Confirm Password</label>
                <input type="password" name="password2" id="password2" required pattern=".{6,}" title="Password must be at least 6 characters long" />
            </div>
            <div class="form-group">
                <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
            </div>
        </form>
    </div>
</body>
<script src="../Assests/JQ/jQuery.js"></script>
<script>
    function getPlace(did) {
        $.ajax({
            url: "../Assests/AjaxPages/AjaxPlace.php?did=" + did,
            success: function (result) {
                $("#selplace").html(result);
            }
        });
    }

    function validateForm() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("password2").value;
        if (password !== confirmPassword) {
            alert("Passwords do not match");
            return false;
        }
        return true;
    }
</script>
</html>

<?php
include('Foot.php');
?>
