<?php
include('../Assests/connection/connection.php');

// Fetch questions to populate the dropdown
$questionsQry = "SELECT * FROM tbl_question";
$questionsResult = $con->query($questionsQry);

// Handle form submission for adding choices
if (isset($_POST['btnsubmit'])) {
    $choices = $_POST['choices'];
    $correctChoice = $_POST['correct_choice'];

    foreach ($choices as $index => $choice) {
        $status = ($index == $correctChoice) ? 1 : 0;
        $insQry = "INSERT INTO tbl_choice (question_id, choice_content, choice_status) VALUES ('".$_GET['choice_id']."', '$choice', '$status')";
        if (!$con->query($insQry)) {
            echo "Error adding choice: " . $con->error;
        }
    }

    echo "Choices added successfully.";
}

// Handle deletion of a choice
if (isset($_GET["delID"])) {
    $choiceID = $_GET["delID"];
    $delQry = "DELETE FROM tbl_choice WHERE choice_id='$choiceID'";
    if ($con->query($delQry)) {
        echo "Choice deleted successfully.";
    } else {
        echo "Error deleting choice.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Choices</title>
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
        select, input[type="text"], input[type="radio"] {
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
        <h2>Add Choices</h2>
       

        <label for="choice1">Choice 1:</label>
        <input type="text" name="choices[]" id="choice1" required />

        <label for="choice2">Choice 2:</label>
        <input type="text" name="choices[]" id="choice2" required />

        <label for="choice3">Choice 3:</label>
        <input type="text" name="choices[]" id="choice3" required />

        <label for="choice4">Choice 4:</label>
        <input type="text" name="choices[]" id="choice4" required />

        <label for="correct_choice">Correct Choice:</label>
        <select name="correct_choice" id="correct_choice" required>
            <option value="">Select Correct Choice</option>
            <option value="0">Choice 1</option>
            <option value="1">Choice 2</option>
            <option value="2">Choice 3</option>
            <option value="3">Choice 4</option>
        </select>

        <input type="submit" name="btnsubmit" id="btnsubmit" value="Add Choices" />
    </form>

    <table>
        <tr>
            <th>SI No</th>
            <th>Choice</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php
        // Fetch choices for a selected question (if any)
            $selQry = "SELECT * FROM tbl_choice WHERE question_id='".$_GET['choice_id']."'";
            $result = $con->query($selQry);
            $i = 0;
            while ($data = $result->fetch_assoc()) {
                $i++;
        ?>

        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data["choice_content"]; ?></td>
            <td><?php echo ($data["choice_status"] == 1) ? "Correct" : "Incorrect"; ?></td>
            <td>
                <a href="AddChoice.php?delID=<?php echo $data["choice_id"]; ?>" class="delete-btn">Delete</a>
            </td>
        </tr>

        <?php
            }
        
        ?>
    </table>
</div>
</body>
</html>
