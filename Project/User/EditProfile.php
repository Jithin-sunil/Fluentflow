<?php
include('../Assests/connection/connection.php');
include('Header.php');

if (isset($_POST['btnedit'])) {
    $name = $_POST['txtname'];
    $email = $_POST['txtemail'];
    $contact = $_POST['txtcontact'];
    $address = $_POST['txtaddress'];
    $upUser = "UPDATE tbl_user SET user_name='$name', user_email='$email', user_contact='$contact', user_address='$address' WHERE user_id=" . $_SESSION['uid'];
    if ($con->query($upUser)) {
        ?>
        <script>
            alert("Record saved");
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Record Failed");
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .form-container {
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

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #5a2d82;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
           
        }

        input[type="submit"]:hover {
            background-color: #7a41a8;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="form-container">
    <form id="form1" name="form1" method="post" action="">
        <table>
            <?php 
            $selUser = "SELECT * FROM tbl_user u 
                         INNER JOIN tbl_place p ON u.place_id = p.place_id 
                         INNER JOIN tbl_district d ON p.district_id = d.district_id 
                         WHERE u.user_id = " . $_SESSION['uid'];
            $user = $con->query($selUser);
            $data = $user->fetch_assoc();
            ?>
            <tr>
                <td><label for="txtname">Name</label></td>
                <td><input type="text" name="txtname" id="txtname" value="<?php echo $data['user_name'] ?>" /></td>
            </tr>
            <tr>
                <td><label for="txtemail">Email</label></td>
                <td><input type="text" name="txtemail" id="txtemail" value="<?php echo $data['user_email'] ?>" /></td>
            </tr>
            <tr>
                <td><label for="txtcontact">Contact</label></td>
                <td><input type="text" name="txtcontact" id="txtcontact" value="<?php echo $data['user_contact'] ?>" /></td>
            </tr>
            <tr>
                <td><label for="txtaddress">Address</label></td>
                <td><input type="text" name="txtaddress" id="txtaddress" value="<?php echo $data['user_address'] ?>" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnedit" id="btnedit" value="Save Changes" />
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
<?php
include('Footer.php');
?>
