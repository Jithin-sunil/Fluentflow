<?php
include('../Assests/connection/connection.php');
include('Header.php');

$seltutor = "SELECT * FROM tbl_tutor u 
             INNER JOIN tbl_place p ON u.place_id = p.place_id 
             INNER JOIN tbl_district d ON p.district_id = d.district_id 
             WHERE u.tutor_id = " . $_SESSION['tid'];
$tutor = $con->query($seltutor);
$data = $tutor->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tutor MyProfile</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    .profile-container {
        width: 80%;
        max-width: 900px;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .profile-container img {
        max-width: 400px;
        height: auto;
        border-radius: 10px;
        display: block;
        margin: 0 auto;
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

    .profile-actions {
        text-align: center;
        padding-top: 20px;
    }

    .profile-actions a {
        text-decoration: none;
        padding: 10px 20px;
        background-color: #5a2d82;
        color: #fff;
        border-radius: 5px;
        margin: 0 10px;
        transition: background-color 0.3s ease;
    }

    .profile-actions a:hover {
        background-color: #7a41a8;
    }
</style>
</head>

<body>

<div class="profile-container">
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td colspan="2">
                    <img src='../Assests/File/Tutor/Photo/<?php echo $data['tutor_photo'] ?>' alt="Tutor Photo"/>
                </td>
            </tr>
            <tr>
                <td><strong>Name</strong></td>
                <td><?php echo $data['tutor_name'] ?></td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td><?php echo $data['tutor_email'] ?></td>
            </tr>
            <tr>
                <td><strong>Contact</strong></td>
                <td><?php echo $data['tutor_contact'] ?></td>
            </tr>
            <tr>
                <td><strong>Address</strong></td>
                <td><?php echo $data['tutor_address'] ?></td>
            </tr>
            <tr>
                <td><strong>District</strong></td>
                <td><?php echo $data['district_name'] ?></td>
            </tr>
            <tr>
                <td><strong>Place</strong></td>
                <td><?php echo $data['place_name'] ?></td>
            </tr>
            <tr>
                <td><strong>Date of Birth</strong></td>
                <td><?php echo $data['tutor_dob'] ?></td>
            </tr>
            <tr>
                <td colspan="2" class="profile-actions">
                    <a href="EditProfile.php">Edit Profile</a>
                    <a href="ChangePassword.php">Change Password</a>
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
