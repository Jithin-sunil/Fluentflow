<?php
include('../Assests/Connection/Connection.php');
include('Header.php');

if (isset($_GET["rid"])) {
    $rid = $_GET["rid"];
    $upQry = "UPDATE tbl_tutor SET tutor_status='2' WHERE tutor_id='$rid'";
    if ($con->query($upQry)) {
        ?>
        <script>
            alert('Rejected');
            window.location = "Tutorverification.php";
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tutor Verification</title>
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
        a {
            color: #e74c3c;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tutor List</h1>
        <form id="form1" name="form1" method="post" action="">
            <table>
                <tr>
                    <th>SLNO</th>
                    <th>Tutor Id</th>
                    <th>Tutor Name</th>
                    <th>Tutor Email</th>
                    <th>Tutor DOB</th>
                    <th>Tutor Contact</th>
                    <th>Action</th>
                </tr>
                <?php
                $selqry = "SELECT * FROM tbl_tutor WHERE tutor_status='1'";
                $tutor = $con->query($selqry);
                $i = 0;
                while ($data = $tutor->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data['tutor_id']; ?></td>
                        <td><?php echo $data['tutor_name']; ?></td>
                        <td><?php echo $data['tutor_email']; ?></td>
                        <td><?php echo $data['tutor_dob']; ?></td>
                        <td><?php echo $data['tutor_contact']; ?></td>
                        <td><a href="Tutorverification.php?rid=<?php echo $data['tutor_id']; ?>">Reject</a></td>
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
