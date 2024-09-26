<?php
include('../Assests/connection/connection.php');
include('Header.php');

$paperID = $_GET['paperID'];

// Fetch all questions for the selected paper
$questionQry = "SELECT * FROM tbl_question WHERE questionpaper_id = '$paperID'";
$questionResult = $con->query($questionQry);

if (isset($_POST['submitExam'])) {
    $paperID = $_POST['paperID'];
    $userID = $_SESSION['uid']; // Assuming user ID is 1 for now (this would normally come from session or login)

    // Insert into tbl_examhead
    $insertExamHead = "INSERT INTO tbl_examhead (user_id, questionpaper_id, exam_date) VALUES ('$userID', '$paperID', NOW())";
    if ($con->query($insertExamHead)) {
        $examID = $con->insert_id; // Get the last inserted exam ID

        // Iterate over submitted answers
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'question_') === 0) {
                $questionID = str_replace('question_', '', $key);
                $selectedChoice = $value;

                // Fetch if the selected choice is correct
                $checkQry = "SELECT * FROM tbl_choice WHERE choice_id = '$selectedChoice' AND choice_status = 1";
                $isCorrect = $con->query($checkQry)->num_rows > 0 ? 1 : 0;

                // Insert into tbl_exambody
                $insertExamBody = "INSERT INTO tbl_exambody (examhead_id, question_id, choice_id, is_correct_choice_id) VALUES ('$examID', '$questionID', '$selectedChoice', '$isCorrect')";
                $con->query($insertExamBody);
            }
        }

        ?>
        <script>
            alert('Exam submitted successfully!..');
            window.location="Result.php";
        </script>
        <?php
    } else {
        echo "Error submitting exam!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        /* Heading styling */
        h1 {
            color: #5a2d82;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Form container styling */
        form {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Question and choice styling */
        .question {
            margin-bottom: 20px;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .question h3 {
            margin-top: 0;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
            color: #333;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        /* Submit button styling */
        input[type="submit"] {
            background-color: #5a2d82;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            display: block;
            margin: 20px auto;
        }

        input[type="submit"]:hover {
            background-color: #4a1b6f;
        }
    </style>
</head>

<body>
    <h1>Questions</h1>
    <form method="POST">
        <?php while ($question = $questionResult->fetch_assoc()) { ?>
            <div class="question">
                <h3><?php echo htmlspecialchars($question['question_content']); ?></h3>
                <?php
                // Fetch choices for the question
                $questionID = $question['question_id'];
                $choiceQry = "SELECT * FROM tbl_choice WHERE question_id = '$questionID'";
                $choiceResult = $con->query($choiceQry);
                while ($choice = $choiceResult->fetch_assoc()) { ?>
                    <label>
                        <input type="radio" name="question_<?php echo htmlspecialchars($questionID); ?>"
                            value="<?php echo htmlspecialchars($choice['choice_id']); ?>">
                        <?php echo htmlspecialchars($choice['choice_content']); ?>
                    </label>
                <?php } ?>
            </div>
        <?php } ?>
        <input type="hidden" name="paperID" value="<?php echo htmlspecialchars($paperID); ?>">
        <input type="submit" name="submitExam" value="Submit Exam">
    </form>
</body>

</html>

<?php
include('Footer.php');
?>
