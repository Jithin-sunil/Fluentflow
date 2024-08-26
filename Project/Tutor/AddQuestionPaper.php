<?php
include('../Assests/connection/connection.php');
session_start();
// Handle form submission for creating a new question paper
if (isset($_POST['btnsubmit'])) {
    $paperName = $_POST['paper_name'];
    $lag = $_POST['paper_id'];

    $insQry = "INSERT INTO tbl_questionpaper (questionpaper_name,questionpaper_date,tutor_id,language_id) VALUES ('$paperName',curdate(),".$_SESSION['tid'].",'$lag')";
    if ($con->query($insQry)) {
        echo "Question paper created successfully.";
    } else {
        echo "Error creating question paper.";
    }
}

// Handle deletion of a question paper
if (isset($_GET["delID"])) {
    $paperID = $_GET["delID"];
        $delQry = "DELETE FROM tbl_questionpaper WHERE questionpaper_id ='$paperID'";
        if ($con->query($delQry)) {
            echo "Question paper deleted successfully.";
        } else {
            echo "Error deleting question paper.";
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Question Paper</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: auto;
            overflow: hidden;
        }
        #main-form {
            background: #fff;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 16px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .delete-btn {
            color: red;
            text-decoration: none;
        }
        .delete-btn:hover {
            text-decoration: underline;
        }
    
        select, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 16px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
<div class="container">
    <form id="main-form" method="post" action="">
        <h2>Create Question Paper</h2>
        <label for="paper_id">Select Question Paper:</label>
        <select name="paper_id" id="paper_id" required>
            <option value="">Select Paper</option>
            <?php
            $papersQry = "SELECT * FROM tbl_language";
            $papersResult = $con->query($papersQry);
            while ($paper = $papersResult->fetch_assoc()) {
                echo "<option value='".$paper['language_id ']."'>".$paper['language_name']."</option>";
            }
            ?>
        </select>
        <label for="paper_name">Question Paper Name:</label>
        <input type="text" name="paper_name" id="paper_name" required />
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Create" />
    </form>

    <table>
        <tr>
            <th>SI No</th>
            <th>Question Paper Name</th>
            <th>Action</th>
        </tr>

        <?php
        $selQry = "SELECT * FROM tbl_questionpaper";
        $result = $con->query($selQry);
        $i = 0;
        while ($data = $result->fetch_assoc()) {
            $i++;
        ?>

        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data["questionpaper_name"]; ?></td>
            <td>
                <a href="AddQuestionPaper.php?delID=<?php echo $data["questionpaper_id"]; ?>" class="delete-btn">Delete</a>
                <a href="AddQuestion.php?paper_id=<?php echo $data["questionpaper_id"]; ?>" class="delete-btn">Add Question</a>
            </td>
        </tr>

        <?php
        }
        ?>

    </table>
</div>
</body>
</html>
