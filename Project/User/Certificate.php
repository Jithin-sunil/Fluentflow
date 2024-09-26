<?php
require('../Assests/fpdf/fpdf.php');
include('../Assests/connection/connection.php');

$examID = $_POST['examID'];

// Fetch exam and user data
$examQry = "SELECT * 
            FROM tbl_examhead e 
            JOIN tbl_user u ON e.user_id = u.user_id
            JOIN tbl_questionpaper q ON e.questionpaper_id = q.questionpaper_id
            WHERE e.examhead_id = '$examID'";
$examResult = $con->query($examQry);
$examData = $examResult->fetch_assoc();

$username = $examData['user_name'];
$examDate = $examData['exam_date'];
$questionPaperName = $examData['questionpaper_name'];

// Fetch the user's total score
$correctCountQry = "SELECT COUNT(*) as correct_count 
                    FROM tbl_exambody 
                    WHERE examhead_id = '$examID' AND is_correct_choice_id = 1";
$correctResult = $con->query($correctCountQry);
$correctCountData = $correctResult->fetch_assoc();
$totalCorrect = $correctCountData['correct_count'];

// Certificate design
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 24);

// Title
$pdf->Cell(0, 50, 'Certificate of Course Completion', 0, 1, 'C');

// User and Course Details
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 20, "This is to certify that", 0, 1, 'C');
$pdf->Cell(0, 20, "$username", 0, 1, 'C');
$pdf->Cell(0, 20, "has successfully completed the course '$questionPaperName'", 0, 1, 'C');
$pdf->Cell(0, 20, "on $examDate and is eligible for the next level.", 0, 1, 'C');

// Footer
$pdf->Ln(20);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 20, 'Signature', 0, 1, 'R');

// Output PDF
$pdf->Output('D', 'certificate.pdf');
?>
