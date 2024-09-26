<?php
include('../Assests/connection/connection.php');
include('Header.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint Management</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 80%;
        margin: 50px auto;
        background-color: #ffffff;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        padding: 30px;
        border-radius: 10px;
    }
    h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    table, th, td {
        border: 1px solid #ccc;
    }
    th, td {
        padding: 15px;
        text-align: center;
        font-size: 16px;
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
        background-color: #d9ecff;
    }
    .action-btn {
        background-color: #3498db;
        color: white;
        padding: 8px 12px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 14px;
    }
    .action-btn:hover {
        background-color: #2980b9;
    }
</style>
</head>

<body>
    <div class="container">
        <h1>Complaint Management</h1>
        <form id="form1" name="form1" method="post" action="">
            <table>
                <tr>
                    <th>User Name</th>
                    <th>Complaint Title</th>
                    <th>Date</th>
                    <th>Content</th>
                    <th>Reply</th>
                </tr>
                <?php
                    $selqry = "select * from tbl_complaint where complaint_status = '1' ";
                    $tut = $con->query($selqry);
                    while($data = $tut->fetch_assoc())
                    {                
                ?>
                <tr>
                    <td><?php echo $data['user_id']; ?></td>
                    <td><?php echo $data['complaint_title']; ?></td>
                    <td><?php echo $data['complaint_date']; ?></td>
                    <td><?php echo $data['complaint_content']; ?></td>
                    <td><?php echo $data['complaint_reply']; ?></td>
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

