<?php
include('../Assests/connection/connection.php');

if(isset($_POST['btnadd']))
{
    $name = $_POST['txtname'];
    $file = $_FILES['file_files']['name'];
    $tempfile = $_FILES['file_files']['tmp_name'];
    move_uploaded_file($tempfile, '../Assests/File/Tutor/Videos/'.$file);

    $insqry = "insert into tbl_video(video_name, video_file, course_id) values ('$name', '$file', '".$_GET['cid']."')";
    if($con->query($insqry))
    {
        ?>
        <script>
        alert('File Added');
        </script>
        <?php
    }
}

if(isset($_GET["delID"]))
{
    $video = $_GET["delID"];
    $delqry = "delete from tbl_video where video_id='$video'";
    if($con->query($delqry))
    {
        ?>
        <script>
        alert('File Deleted');
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
    <title>Manage Videos</title>
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

        h1 {
            text-align: center;
            color: #5a2d82;
            margin-bottom: 30px;
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

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #5a2d82;
        }

        .form-group input[type="text"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group input[type="submit"] {
            background-color: #5a2d82;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group input[type="submit"]:hover {
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

<div class="container">
    <h1>Manage Videos</h1>

    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div class="form-group">
            <label for="txtname">Video Name</label>
            <input type="text" name="txtname" id="txtname" />
        </div>
        <div class="form-group">
            <label for="file_files">Upload File</label>
            <input type="file" name="file_files" id="file_files" />
        </div>
        <div class="form-group">
            <input type="submit" name="btnadd" id="btnadd" value="Add" />
        </div>
    </form>

    <table>
        <tr>
            <th>Course</th>
            <th>Video Name</th>
            <th>File</th>
            <th>Action</th>
        </tr>
        <?php
        $selqry = "select * from tbl_video p inner join tbl_course d on p.course_id = d.course_id where p.course_id =".$_GET['cid'];
        $vid = $con->query($selqry);
        while($data = $vid->fetch_assoc())
        {
        ?>
        <tr>
            <td><?php echo $data['course_name']; ?></td>
            <td><?php echo $data['video_name']; ?></td>
            <td><?php echo $data['video_file']; ?></td>
            <td class="action-links">
                <a href="Addvideos.php?delID=<?php echo $data['video_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>

</body>
</html>
	