<?php
include('../Assests/connection/connection.php');
include('Header.php');
if (isset($_POST['btnsubmit'])) {
    $reply = $_POST['txtreply'];
    $update = "UPDATE tbl_complaint SET user_reply='" . $reply . "' WHERE complaint_id=" . $_GET['cid'];
    if ($con->query($update)) {
?>
        <script>
            alert('Complaint Replied');
            window.location.href = 'ComplaintsList.php'; // Redirect to a page where you list complaints
        </script>
<?php
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reply to Complaint</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        textarea {
            width: calc(100% - 24px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
        }
        input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Reply to Complaint</h1>
        <form id="form1" name="form1" method="post" action="">
            <table>
                <tr>
                    <td>Reply</td>
                    <td>
                        <textarea name="txtreply" id="txtreply" cols="45" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

<?php
include('Footer.php');
?>
