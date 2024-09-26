<?php
include('../Assests/Connection/Connection.php');
include('Header.php');

if (isset($_GET["aid"])) {
    $aid = $_GET["aid"];
    $upQry = "UPDATE tbl_tutor SET tutor_status='1' WHERE tutor_id='$aid'";
    if ($con->query($upQry)) {
        ?>
        <script>
            alert('Approved');
            window.location = "Tutorverification.php";
        </script>
        <?php
    }
}

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
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
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
            background-color: #e0f7fa;
        }
        a {
            color: #e74c3c;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .status-table {
            margin-bottom: 40px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tutor Verification</h1>
        <table class="status-table">
            <thead>
                <tr>
                    <th>SLNO</th>
                    <th>Tutor Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Photo</th>
                    <th>Proof</th>
                    <th>Date of Join</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $selqry = "SELECT * FROM tbl_tutor WHERE tutor_status='0'";
                $tutor = $con->query($selqry);
                $i = 0;
                while ($data = $tutor->fetch_assoc()) { 
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['tutor_name']; ?></td>
                    <td><?php echo $data['tutor_email']; ?></td>
                    <td><?php echo $data['tutor_contact']; ?></td>
                    <td><?php echo $data['tutor_address']; ?></td>
                    <td><?php echo $data['tutor_photo']; ?></td>
                    <td><?php echo $data['tutor_proof']; ?></td>
                    <td><?php echo $data['tutor_doj']; ?></td>
                    <td>
                        <a href="Tutorverification.php?aid=<?php echo $data['tutor_id']; ?>">Accept</a> | 
                        <a href="Tutorverification.php?rid=<?php echo $data['tutor_id']; ?>">Reject</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

       
        <h1>Verified</h1>

        <table class="status-table">
            <thead>
                <tr>
              
                    <th>Tutor Id</th>
                    <th>Tutor Name</th>
                    <th>Tutor Email</th>
                    <th>Tutor DOB</th>
                    <th>Tutor Contact</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selqry = "SELECT * FROM tbl_tutor WHERE tutor_status='1'";
                $tutor = $con->query($selqry);
                $i = 0;
                while ($data = $tutor->fetch_assoc()) {
                    $i++;
                ?>
                <tr>

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
            </tbody>
        </table>

        <h1>Rejected</h1>

        <table class="status-table">
            <thead>
                <tr>
                    <th>SLNO</th>
                    <th>Tutor Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Photo</th>
                    <th>Proof</th>
                    <th>Date of Join</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $selqry = "SELECT * FROM tbl_tutor WHERE tutor_status='2'";
                $tutor = $con->query($selqry);
                $i = 0;
                while ($data = $tutor->fetch_assoc()) { 
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['tutor_name']; ?></td>
                    <td><?php echo $data['tutor_email']; ?></td>
                    <td><?php echo $data['tutor_contact']; ?></td>
                    <td><?php echo $data['tutor_address']; ?></td>
                    <td><?php echo $data['tutor_photo']; ?></td>
                    <td><?php echo $data['tutor_proof']; ?></td>
                    <td><?php echo $data['tutor_doj']; ?></td>
                    <td>
                        <a href="Tutorverification.php?aid=<?php echo $data['tutor_id']; ?>">Accept</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
include('Footer.php')
?>
