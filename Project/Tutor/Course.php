<?php
include('../Assests/connection/connection.php');
include('Header.php');
if(isset($_POST['btnadd']))
{
    $coursename = $_POST['txtcoursename'];
    $coursedetails = $_POST['txtcoursedetails'];
    $courseprice = $_POST['txtcourseprice'];
    $language = $_POST['sellanguage'];

    $insqry = "insert into tbl_course(course_name,course_details,course_price,language_id,tutor_id)
               values('$coursename','$coursedetails','$courseprice','$language','".$_SESSION['tid']."')";
    if ($con->query($insqry)) {
        ?>
        <script>
        alert('Course Added');
        </script>
        <?php
    }
}

if (isset($_GET["delID"])) {
    $cours = $_GET["delID"];
    $delqry = "delete from tbl_course where course_id='$cours'";
    if ($con->query($delqry)) {
        ?>
        <script>
        alert('Deleted');
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
<title>Course Management</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    .form-container {
        width: 80%;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .form-header {
        text-align: center;
        padding-bottom: 20px;
    }

    .form-header h1 {
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

    input[type="text"], select {
        width: 90%;
        padding: 8px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        width: 100px;
        padding: 10px;
        background-color: #5a2d82;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #7a41a8;
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

<div class="form-container">
    <div class="form-header">
        <h1>Add New Course</h1>
    </div>

    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td>Course Name</td>
                <td><input type="text" name="txtcoursename" id="txtcoursename" /></td>
            </tr>
            <tr>
                <td>Course Details</td>
                <td><input type="text" name="txtcoursedetails" id="txtcoursedetails" /></td>
            </tr>
            <tr>
                <td>Course Price</td>
                <td><input type="text" name="txtcourseprice" id="txtcourseprice" /></td>
            </tr>
            <tr>
                <td>Language</td>
                <td>
                    <select name="sellanguage" id="sellanguage">
                        <option value="--select--">--select--</option>
                        <?php
                        $selqry = "select * from tbl_language";
                        $lang = $con->query($selqry);
                        while ($data = $lang->fetch_assoc()) {
                            echo "<option value='{$data['language_id']}'>{$data['language_name']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnadd" id="btnadd" value="Add" />
                </td>
            </tr>
        </table>
    </form>

    <h1 class="form-header">Available Courses</h1>

    <table>
        <tr>
            <th>Course Name</th>
            <th>Details</th>
            <th>Price</th>
            <th>Language</th>
            <th>Action</th>
        </tr>
        <?php
        $selqry = "select * from tbl_course p inner join tbl_language d on p.language_id=d.language_id";
        $course = $con->query($selqry);
        while ($data = $course->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $data['course_name']; ?></td>
            <td><?php echo $data['course_details']; ?></td>
            <td><?php echo $data['course_price']; ?></td>
            <td><?php echo $data['language_name']; ?></td>
            <td class="action-links">
                <a href="Course.php?delID=<?php echo $data['course_id']; ?>">Delete</a>
                <a href="Addvideos.php?cid=<?php echo $data['course_id']; ?>">Add Video</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
<?php
include('Footer.php');
?>

