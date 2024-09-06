<?php
include('../Assests/connection/connection.php');

// Fetch all question papers
$selQry = "SELECT * FROM tbl_questionpaper";
$result = $con->query($selQry);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Papers</title>
</head>
<body>
    <h1>Available Question Papers</h1>
    <table border="1">
        <tr>
            <th>Paper Title</th>
            <th>Action</th>
        </tr>
        <?php while ($paper = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $paper['questionpaper_name']; ?></td>
            <td><a href="questions.php?paperID=<?php echo $paper['questionpaper_id']; ?>">Start Exam</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
