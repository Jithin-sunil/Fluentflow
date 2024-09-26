<?php
include('../Assests/connection/connection.php');
include('Header.php');

if (isset($_POST['btnsubmit'])) {
    $name = $_POST['txtname'];
    $email = $_POST['txtemail'];
    $districtID = $_POST["seldistrict"];
    $place = $_POST["selplace"];
    $address = $_POST["txtaddress"];
    $contact = $_POST["txtcontact"];
    $dob = $_POST["txtdob"];
    $doj = $_POST["txtdoj"];
    $password = $_POST["txtpassword"];
    $confrimpassword = $_POST["txtconfrimpassword"];
    $photo = $_FILES['filephoto']['name'];
    $tempphoto = $_FILES['filephoto']['tmp_name'];
    $proof = $_FILES['fileproof']['name'];
    $tempproof = $_FILES['fileproof']['tmp_name'];

    move_uploaded_file($tempphoto, '../Assests/File/Tutor/Photo/' . $photo);
    move_uploaded_file($tempproof, '../Assests/File/Tutor/Proof/' . $proof);

    $insqry = "INSERT INTO tbl_tutor(tutor_name, tutor_email, place_id, tutor_address, tutor_contact, tutor_photo, tutor_proof, tutor_dob, tutor_doj, tutor_password) VALUES ('$name', '$email', '$place', '$address', '$contact', '$photo', '$proof', '$dob', '$doj', '$password')";

    if ($confrimpassword == $password) {
        if ($con->query($insqry)) {
?>
            <script>
                alert('Tutor Registration Successful');
            </script>
<?php
        } else {
?>
            <script>
                alert('Tutor Registration Failed');
            </script>
<?php
        }
    } else {
?>
        <script>
            alert("Password doesn't match");
        </script>
<?php
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tutor Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5; /* Light grey background */
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            max-width: 800px;
            margin: 40px auto;
            background-color: #ffffff; /* White background for form */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #6a0dad; /* Violet color */
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
            background-color: #6a0dad; /* Violet color */
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .form-group input[type="submit"]:hover {
            background-color: #5c00a3; /* Darker violet for hover effect */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table td {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tutor Registration</h1>
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="txtname">Name</label>
                <input type="text" name="txtname" id="txtname" required pattern="[A-Za-z\s]+" title="Name should only contain letters and spaces." />
            </div>
            <div class="form-group">
                <label for="txtemail">Email</label>
                <input type="text" name="txtemail" id="txtemail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter a valid email address." />
            </div>
            <div class="form-group">
                <label for="seldistrict">District</label>
                <select name="seldistrict" id="seldistrict" required onChange="getPlace(this.value)">
                    <option value="--select--">--select--</option>
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
                    <option value="--select--">--select--</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txtaddress">Address</label>
                <textarea name="txtaddress" id="txtaddress" cols="45" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="txtcontact">Contact</label>
                <input type="text" name="txtcontact" id="txtcontact" required pattern="\d{10}" title="Contact must be a 10-digit number." />
            </div>
            <div class="form-group">
                <label for="filephoto">Photo</label>
                <input type="file" name="filephoto" id="filephoto" required />
            </div>
            <div class="form-group">
                <label for="fileproof">Proof</label>
                <input type="file" name="fileproof" id="fileproof" required />
            </div>
            <div class="form-group">
                <label for="txtdob">Date of Birth</label>
                <input type="date" name="txtdob" id="txtdob" required />
            </div>
            <div class="form-group">
                <label for="txtdoj">Date of Join</label>
                <input type="date" name="txtdoj" id="txtdoj" required />
            </div>
            <div class="form-group">
                <label for="txtpassword">Password</label>
                <input type="password" name="txtpassword" id="txtpassword" required pattern=".{8,}" title="Password must be at least 8 characters long." />
            </div>
            <div class="form-group">
                <label for="txtconfrimpassword">Confirm Password</label>
                <input type="password" name="txtconfrimpassword" id="txtconfrimpassword" required />
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

    // JavaScript Form Validation
    function validateForm() {
        var password = document.getElementById("txtpassword").value;
        var confirmPassword = document.getElementById("txtconfrimpassword").value;
        
        if (password !== confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>
</html>
<?php
include('Foot.php');
?>
