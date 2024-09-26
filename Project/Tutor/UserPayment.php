<?php
include('../Assests/connection/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Payment List</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Container for the table */
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #6a1b9a;
            color: #ffffff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Responsive table */
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <form id="form1" name="form1" method="post" action="">
            <table>
                <tr>
                    <th>User Name</th>
                    <th>Course</th>
                    <th>Language</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
                <?php    
                    $selqry = "SELECT * FROM tbl_booking p 
                               INNER JOIN tbl_course d ON p.course_id = d.course_id 
                               INNER JOIN tbl_user u ON p.user_id = u.user_id 
                               INNER JOIN tbl_language l ON d.language_id = l.language_id 
                               WHERE booking_status = '2'";
                    $book = $con->query($selqry);
                    while ($data = $book->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($data['user_name']); ?></td>
                    <td><?php echo htmlspecialchars($data['course_name']); ?></td>
                    <td><?php echo htmlspecialchars($data['language_name']); ?></td>
                    <td><?php echo htmlspecialchars($data['course_price']); ?></td>
                    <td><?php echo htmlspecialchars($data['booking_date']); ?></td>
                    <td>Paid</td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </form>
    </div>
</body>
</html>
