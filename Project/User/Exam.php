<?php
include('../Assests/connection/connection.php');
include('Header.php');

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
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        /* Heading styling */
        h1 {
            color: #5a2d82;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Table container styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            max-width: 800px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Table header styling */
        th {
            background-color: #5a2d82;
            color: #ffffff;
            padding: 12px;
            text-align: left;
        }

        /* Table cell styling */
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        /* Table row hover effect */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e6e6e6;
        }

        /* Link styling */
        a {
            color: #5a2d82;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Available Question Papers</h1>
    <table>
        <tr>
            <th>Paper Title</th>
            <th>Action</th>
        </tr>
        <?php while ($paper = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo htmlspecialchars($paper['questionpaper_name']); ?></td>
            <td><a href="questions.php?paperID=<?php echo htmlspecialchars($paper['questionpaper_id']); ?>">Start Exam</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
<?php
include('Footer.php');
?>
