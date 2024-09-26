<?php
include('../Assests/connection/connection.php');
include('Header.php');

if (isset($_POST['btnedit'])) {
    $name = $_POST['txtname'];
    $email = $_POST['txtemail'];
    $contact = $_POST['txtcontact'];
    $address = $_POST['txtaddress'];
    $uptutor = "UPDATE tbl_tutor SET tutor_name='$name', tutor_email='$email', tutor_contact='$contact', tutor_address='$address' WHERE tutor_id=" . $_SESSION['tid'];
    if ($con->query($uptutor)) {
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Edit Profile</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Header styling */
        header {
            background-color: #6a1b9a;
            color: #ffffff;
            padding: 15px 20px;
            text-align: center;
        }

        /* Footer styling */
        footer {
            background-color: #6a1b9a;
            color: #ffffff;
            padding: 15px 20px;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        /* Form container styling */
        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        td:first-child {
            background-color: #6a1b9a;
            color: #ffffff;
            font-weight: bold;
        }

        input[type="text"] {
            width: calc(100% - 22px); /* Adjust width to account for padding */
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #6a1b9a;
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #4a148c;
        }
    </style>
</head>
<body>
    <form id="form1" name="form1" method="post" action="">
        <?php 
        $seltutor = "SELECT * FROM tbl_tutor u 
                      INNER JOIN tbl_place p ON u.place_id = p.place_id 
                      INNER JOIN tbl_district d ON p.district_id = d.district_id 
                      WHERE u.tutor_id = " . $_SESSION['tid'];
        $tutor = $con->query($seltutor);
        $data = $tutor->fetch_assoc();
        ?>
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="txtname" id="txtname" value="<?php echo htmlspecialchars($data['tutor_name']); ?>"/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="txtemail" id="txtemail" value="<?php echo htmlspecialchars($data['tutor_email']); ?>"/></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td><input type="text" name="txtcontact" id="txtcontact" value="<?php echo htmlspecialchars($data['tutor_contact']); ?>" /></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="txtaddress" id="txtaddress" value="<?php echo htmlspecialchars($data['tutor_address']); ?>" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnedit" id="btnedit" value="Save Changes" />
                </td>
            </tr>
        </table>
    </form>
    <?php include('Footer.php'); ?>
</body>
</html>
