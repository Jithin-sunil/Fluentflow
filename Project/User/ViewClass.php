<?php
include('../Assests/connection/connection.php');
include('Header.php');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Video List</title>
<style>
    /* General body styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 20px;
    }

    /* Form container styling */
    form {
        width: 100%;
        max-width: 800px;
        margin: auto;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    /* Table styling */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        padding: 12px;
        text-align: center;
        border: 1px solid #ddd;
    }

    table th {
        background-color: #5a2d82;
        color: #ffffff;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #e6e6e6;
    }

    /* Video styling */
    video {
        max-width: 100%;
        height: auto;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
</style>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table width="100%" height="auto" border="1" align="center">
        <tr>
            <th width="100" align="center">Course</th>
            <th width="200" align="center">Video Name</th>
            <th width="300" align="center">Video</th>
        </tr>
        <?php
            $selqry = "SELECT * FROM tbl_video p 
                      INNER JOIN tbl_course d ON p.course_id = d.course_id";
            $vid = $con->query($selqry);
            
            while($data = $vid->fetch_assoc())
            {
        ?>
        <tr>
            <td><?php echo htmlspecialchars($data['course_name']); ?></td>
            <td><?php echo htmlspecialchars($data['video_name']); ?></td>
            <td>
                <!-- Show video using the video tag -->
                <video width="300" controls>
                    <source src="../Assests/File/Tutor/Videos/<?php echo htmlspecialchars($data['video_file']); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</form>
</body>
</html>
<?php
include('Footer.php');
?>
