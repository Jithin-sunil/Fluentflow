<?php
include('../Assests/connection/connection.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>User Payments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
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
            background-color: #e0e0e0;
        }
        .status-paid {
            color: #2ecc71; /* Green color for "Paid" status */
            font-weight: bold;
        }
        .status-pending {
            color: #e74c3c; /* Red color for "Pending" status */
            font-weight: bold;
        }
        .status-processing {
            color: #f39c12; /* Orange color for "Processing" status */
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>User Payments</h1>
        <form id="form1" name="form1" method="post" action="">
            <table>
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Course</th>
                        <th>Language</th>
                        <th>Tutor Name</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $selqry = "SELECT * FROM tbl_booking p
                               INNER JOIN tbl_course d ON p.course_id=d.course_id
                               INNER JOIN tbl_tutor t ON d.tutor_id=t.tutor_id
                               INNER JOIN tbl_language l ON d.language_id = l.language_id
                               INNER JOIN tbl_user u ON p.user_id = u.user_id
                               WHERE booking_status = '2'";
                    $book = $con->query($selqry);
                    $i = 0;
                    while ($data = $book->fetch_assoc()) {
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($data['user_name']); ?></td>
                        <td><?php echo htmlspecialchars($data['course_name']); ?></td>
                        <td><?php echo htmlspecialchars($data['language_name']); ?></td>
                        <td><?php echo htmlspecialchars($data['tutor_name']); ?></td>
                        <td><?php echo htmlspecialchars($data['course_price']); ?></td>
                        <td><?php echo htmlspecialchars($data['booking_date']); ?></td>
                        <td class="status-paid">Paid</td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>
