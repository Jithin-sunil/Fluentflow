
<?php
include('../Assests/connection/connection.php');

$userID = $_SESSION['uid']; // Assuming user ID is 1 for now (this would normally come from session or login)

// Fetch the latest exam for the user
$examQry = "SELECT * FROM tbl_examhead WHERE user_id = '$userID' ORDER BY exam_id DESC LIMIT 1";
$examResult = $con->query($examQry);
$examData = $examResult->fetch_assoc();
$examID = $examData['exam_id'];

// Fetch the user's answers and scores from tbl_exambody
$bodyQry = "SELECT q.question_text, c.choice_text, b.is_correct 
            FROM tbl_exambody b
            INNER JOIN tbl_questions q ON b.question_id = q.question_id
            INNER JOIN tbl_choices c ON b.selected_choice = c.choice_id
            WHERE b.exam_id = '$examID'";
$bodyResult = $con->query($bodyQry);

// Calculate total correct answers
$correctCountQry = "SELECT COUNT(*) as correct_count 
                    FROM tbl_exambody 
                    WHERE exam_id = '$examID' AND is_correct_choice_id = 1";
$correctResult = $con->query($correctCountQry);
$correctCountData = $correctResult->fetch_assoc();
$totalCorrect = $correctCountData['correct_count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Results</title>
</head>
<body>
    <h1>Your Exam Results</h1>
    <p><strong>Total Correct Answers: </strong><?php echo $totalCorrect; ?></p>
    <h2>Question Breakdown</h2>
    <table border="1">
        <tr>
            <th>Question</th>
            <th>Your Answer</th>
            <th>Correct?</th>
        </tr>
        <?php while ($row = $bodyResult->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['question_text']; ?></td>
            <td><?php echo $row['choice_text']; ?></td>
            <td><?php echo ($row['is_correct_choice_id'] == 1) ? 'Yes' : 'No'; ?></td>
        </tr>
        <?php } ?>
    </table>

    <br><br>
    <!-- <form action="generate_certificate.php" method="POST">
        <input type="hidden" name="examID" value="<?php echo $examID; ?>">
        <input type="submit" value="Generate Certificate">
    </form> -->
</body>
</html>
