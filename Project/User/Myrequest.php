<?php
include('../Assests/connection/connection.php');
include('Header.php');

if(isset($_GET['cid']))
{
  $update="update tbl_booking set booking_status='4' where booking_id=".$_GET['cid'];
  if($con->query($update))
  {
    ?>
    <script>
      alert('Updated');
      window.location="Myrequest.php";
    </script>
    <?php
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Request</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    .request-container {
        width: 80%;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
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

    .status-actions a {
        text-decoration: none;
        margin: 0 5px;
        padding: 8px 15px;
        background-color: #5a2d82;
        color: #fff;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .status-actions a:hover {
        background-color: #7a41a8;
    }
</style>
</head>

<body>
<div class="request-container">
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <th>Course</th>
                <th>Tutor Name</th>
                <th>Fee</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
            <?php
            $selqry="select * from tbl_booking p inner join tbl_course d on p.course_id=d.course_id inner join tbl_tutor m on d.tutor_id=m.tutor_id";
            $book=$con->query($selqry);
            while($data=$book->fetch_assoc())
            {
            ?>
            <tr>
                <td><?php echo $data['course_name']; ?></td>
                <td><?php echo $data['tutor_name']; ?></td>
                <td><?php echo $data['course_price']; ?></td>
                <td><?php echo $data['booking_date']; ?></td>
                <td class="status-actions">
                <?php
                if($data['booking_status']==0)
                {
                    echo "Request Pending";
                }
                else if($data['booking_status']==1)
                {
                    echo "Approved";
                    ?>
                    <a href="Payment.php?bid=<?php echo $data['booking_id']; ?>">Payment</a>
                    <?php
                }
                else if($data['booking_status']==3)
                {
                    echo "Class Started";
                    ?>
                    <a href="ViewClass.php?id=<?php echo $data['course_id']; ?>">Watch Class</a>
                    <a href="Chat.php?id=<?php echo $data['tutor_id']; ?>">Chat</a>
                    <a href="Myrequest.php?cid=<?php echo $data['booking_id']; ?>">Class Completed</a>
                    <?php
                }
                else if($data['booking_status']==4)
                {
                    ?>
                    <a href="Exam.php">Exam</a>
                    <a href="ViewClass.php?id=<?php echo $data['course_id']; ?>">Watch Class</a>
                    <a href="Rating.php?pid=<?php echo $data['tutor_id']; ?>">Rating</a>
                    <?php
                }
                else
                {
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
