<?php
include('../Assests/Connection/Connection.php');
include('Header.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User List</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f4f7;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 90%;
        margin: 30px auto;
        background-color: #ffffff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 10px;
    }
    h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th, td {
        padding: 15px;
        text-align: center;
    }
    th {
        background-color: #3498db;
        color: white;
        font-weight: bold;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tr:hover {
        background-color: #e3f2fd;
    }
</style>
</head>

<body>
    <div class="container">
        <h1>User List</h1>
        <form id="form1" name="form1" method="post" action="">
            <table>
                <tr>
                    <th>SLNO</th>
                    <th>User Id</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User DOB</th>
                    <th>User Contact</th>
                </tr>
                <?php
                    $selqry = "select * from tbl_user";  
                    $user = $con->query($selqry);
                    $i = 0;
                    while($data = $user->fetch_assoc())
                    {
                        $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['user_id']; ?></td>
                    <td><?php echo $data['user_name']; ?></td>
                    <td><?php echo $data['user_email']; ?></td>
                    <td><?php echo $data['user_dob']; ?></td>
                    <td><?php echo $data['user_contact']; ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </form>
    </div>
</body>
</html>
<?php
include('Footer.php');
?>