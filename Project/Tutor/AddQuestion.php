<?php
include('../Assests/connection/connection.php');



// Handle form submission for adding a new question
if (isset($_POST['btnsubmit'])) {
    $paperID = $_GET['paper_id'];
    $questionText = $_POST['question_text'];

    $insQry = "INSERT INTO tbl_question (questionpaper_id, question_content) VALUES ('$paperID', '$questionText')";
    if ($con->query($insQry)) {
        echo "Question added successfully.";
    } else {
        echo "Error adding question.";
    }
}

// Handle deletion of a question
if (isset($_GET["delID"])) {
    $questionID = $_GET["delID"];
    $delQry = "DELETE FROM tbl_question WHERE question_id='$questionID'";
    if ($con->query($delQry)) {
        echo "Question deleted successfully.";
    } else {
        echo "Error deleting question.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Questions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
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
    </style>
</head>
<body>
<div class="container">
    <form id="main-form" method="post" action="">
        <h2>Add Question</h2>
       

        <label for="question_text">Question Text:</label>
        <input type="text" name="question_text" id="question_text" required />

        <input type="submit" name="btnsubmit" id="btnsubmit" value="Add Question" />
    </form>

    <table>
        <tr>
            <th>SI No</th>
            <th>Question</th>
            <th>Action</th>
        </tr>

        <?php
        // Fetch questions for a selected paper (if any)
            $selQry = "SELECT * FROM tbl_question WHERE questionpaper_id='".$_GET['paper_id']."'";
            $result = $con->query($selQry);
            $i = 0;
            while ($data = $result->fetch_assoc()) {
                $i++;
        ?>

        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data["question_content"]; ?></td>
            <td>
                <a href="AddQuestion.php?delID=<?php echo $data["question_id"]; ?>" class="delete-btn">Delete</a>
                <a href="AddChoice.php?choice_id=<?php echo $data["question_id"]; ?>" class="delete-btn">Add Choice</a>
            </td>
        </tr>

        <?php
            }
        
        ?>
    </table>
</div>
</body>
</html>
