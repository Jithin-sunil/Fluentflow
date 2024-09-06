<?php
include('../Assests/connection/connection.php');
session_start();
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

        echo "Exam submitted successfully!";
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
</head>

<body>
    <h1>Questions</h1>
    <form method="POST" >
        <?php while ($question = $questionResult->fetch_assoc()) { ?>
            <div>
                <h3><?php echo $question['question_content']; ?></h3>
                <?php
                // Fetch choices for the question
                $questionID = $question['question_id'];
                $choiceQry = "SELECT * FROM tbl_choice WHERE question_id = '$questionID'";
                $choiceResult = $con->query($choiceQry);
                while ($choice = $choiceResult->fetch_assoc()) { ?>
                    <label>
                        <input type="radio" name="question_<?php echo $questionID; ?>"
                            value="<?php echo $choice['choice_id']; ?>">
                        <?php echo $choice['choice_content']; ?>
                    </label><br>
                <?php } ?>
            </div>
        <?php } ?>
        <input type="hidden" name="paperID" value="<?php echo $paperID; ?>">
        <input type="submit" name="submitExam" value="Submit Exam">
    </form>
</body>

</html>