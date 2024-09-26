<?php
include('../Assests/connection/connection.php');
include('Header.php');
if(isset($_GET['aid']))
{
    $up = "update tbl_booking set booking_status=1 where course_id='".$_GET['aid']."'";
    if($con->query($up))
    {
        ?>
        <script>
        alert('Request Approved');
        window.location="Viewusercourse.php";
        </script>
        <?php
    }
}

if(isset($_GET['rid']))
{
    $up = "update tbl_booking set booking_status=2 where course_id='".$_GET['rid']."'";
    if($con->query($up))
    {
        ?>
        <script>
        alert('Request Rejected');
        window.location="Viewusercourse.php";
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
    <title>View User Courses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .header {
            text-align: center;
            padding-bottom: 20px;
        }

        .header h1 {
            color: #5a2d82;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
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
            background-color: #f4e8ff;
        }

        .action-links a {
            text-decoration: none;
            margin: 0 5px;
            padding: 8px 15px;
            background-color: #5a2d82;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .action-links a:hover {
            background-color: #7a41a8;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>View User Courses</h1>
    </div>

    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <th>User Name</th>
                <th>Course Name</th>
                <th>Details</th>
                <th>Language</th>
                <th>Contact</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php
            $selqry = "select * from tbl_booking b inner join tbl_course c on b.course_id=c.course_id inner join tbl_user u on b.user_id=u.user_id inner join tbl_language l on c.language_id=l.language_id";
            $course = $con->query($selqry);
            while($data = $course->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $data['user_name']; ?></td>
                <td><?php echo $data['course_name']; ?></td>
                <td><?php echo $data['course_details']; ?></td>
                <td><?php echo $data['language_name']; ?></td>
                <td><?php echo $data['user_contact']; ?></td>
                <td><?php echo $data['course_price']; ?></td>
                <td class="action-links">
                    <?php
                    if($data['booking_status'] == 0) {
                        ?>
                        <a href="Viewusercourse.php?aid=<?php echo $data['course_id']; ?>">Accept</a>
                        <a href="Viewusercourse.php?rid=<?php echo $data['course_id']; ?>">Reject</a>
                        <?php
                    } else if($data['booking_status'] == 1) {
                        echo "Payment Pending";
                    } else if($data['booking_status'] == 3) {
                        echo "Class Started";
                        ?>
                        <a href="Chat.php?id=<?php echo $data['user_id']; ?>">Chat</a>
                        <?php
                    } else if($data['booking_status'] == 4) {
                        echo "Class Completed";
                        ?>
                        <a href="AddQuestionPaper.php">Start Exam</a>
                        <?php
                    } else {
                        echo "Rejected";
                    }
                    ?>
                </td>
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
