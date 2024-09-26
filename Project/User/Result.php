<?php
include('../Assests/connection/connection.php');
include('Header.php');

$userID = $_SESSION['uid']; // Assuming user ID is 1 for now (this would normally come from session or login)

// Fetch the latest exam for the user
$examQry = "SELECT * FROM tbl_examhead WHERE user_id = '$userID' ORDER BY examhead_id DESC LIMIT 1";
$examResult = $con->query($examQry);
$examData = $examResult->fetch_assoc();
$examID = $examData['examhead_id'];

// Fetch the user's answers and scores from tbl_exambody
$bodyQry = "SELECT *
            FROM tbl_exambody b
            INNER JOIN tbl_question q ON b.question_id = q.question_id
            INNER JOIN tbl_choice c ON b.choice_id = c.choice_id
            WHERE b.examhead_id = '$examID'";
$bodyResult = $con->query($bodyQry);

// Calculate total correct answers
$correctCountQry = "SELECT COUNT(*) as correct_count 
                    FROM tbl_exambody 
                    WHERE examhead_id = '$examID' AND is_correct_choice_id = 1";
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
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        /* Heading styling */
        h1 {
            color: #5a2d82;
            text-align: center;
            margin-bottom: 20px;
        }

        h2 {
            color: #5a2d82;
            margin-top: 20px;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #5a2d82;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        /* Form styling */
        form {
            text-align: center;
        }

        input[type="submit"] {
            background-color: #5a2d82;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #4a1b6f;
        }

        /* Paragraph styling */
        p {
            font-size: 18px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
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
            <td><?php echo htmlspecialchars($row['question_content']); ?></td>
            <td><?php echo htmlspecialchars($row['choice_content']); ?></td>
            <td><?php echo ($row['is_correct_choice_id'] == 1) ? 'Yes' : 'No'; ?></td>
        </tr>
        <?php } ?>
    </table>

    <br><br>
    <form action="Certificate.php" method="POST">
        <input type="hidden" name="examID" value="<?php echo htmlspecialchars($examID); ?>">
        <input type="submit" value="Generate Certificate">
    </form>
</body>
</html>
<?php
include('Footer.php');
?>
