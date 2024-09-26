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
        background-color: #f4f7f9;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 80%;
        margin: 30px auto;
        background-color: #fff;
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
    }
    table, th, td {
        border: 1px solid #ccc;
    }
    th, td {
        padding: 12px;
        text-align: center;
    }
    th {
        background-color: #3498db;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #e8f6ff;
    }
    .reply-btn {
        background-color: #3498db;
        color: white;
        padding: 8px 12px;
        border-radius: 4px;
        text-decoration: none;
    }
    .reply-btn:hover {
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
                    <th>Action</th>
                </tr>
                <?php
                    $selqry = "select * from tbl_complaint";
                    $tut = $con->query($selqry);
                    while($data = $tut->fetch_assoc())
                    {                
                ?>
                <tr>
                    <td><?php echo $data['user_id']; ?></td>
                    <td><?php echo $data['complaint_title']; ?></td>
                    <td><?php echo $data['complaint_date']; ?></td>
                    <td><?php echo $data['complaint_content']; ?></td>
                    <td><a href="Replycomplaint.php?cid=<?php echo $data['complaint_id']; ?>" class="reply-btn">Reply</a></td>
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
