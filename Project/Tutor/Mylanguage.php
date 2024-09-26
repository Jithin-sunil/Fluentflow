<?php
include('../Assests/connection/connection.php');
session_start();
if(isset($_POST['btnadd']))
{
    $language = $_POST['sellang'];

    $insqry = "insert into tbl_tutor_language(language_id,tutor_id)values ('$language','".$_SESSION['tid']."')";
    if ($con->query($insqry)) {
        ?>
        <script>
        alert('Language Saved');
        </script>
        <?php
    }
}

if (isset($_GET["delID"])) {
    $language = $_GET["delID"];
    $delqry = "delete from tbl_tutor_language where language_id='$language'";
    if ($con->query($delqry)) {
        ?>
        <script>
        alert('Language Deleted');
        </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Languages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .form-container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .form-header {
            text-align: center;
            padding-bottom: 20px;
        }

        .form-header h1 {
            color: #5a2d82;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #5a2d82;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f0e5f7;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        tr:hover {
            background-color: #f4e8ff;
        }

        input[type="text"], select {
            width: 90%;
            padding: 8px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100px;
            padding: 10px;
            background-color: #5a2d82;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #7a41a8;
        }

        .action-links a {
            text-decoration: none;
            margin: 0 5px;
            padding: 8px 15px;
            background-color: #5a2d82;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .action-links a:hover {
            background-color: #7a41a8;
        }

    </style>
</head>
<body>

<div class="form-container">
    <div class="form-header">
        <h1>Add Language</h1>
    </div>

    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td>Language</td>
                <td>
                    <select name="sellang" id="sellang">
                        <option value="--select--">--select--</option>
                        <?php
                        $selqry = "select * from tbl_language";
                        $lang = $con->query($selqry);
                        while ($data = $lang->fetch_assoc()) {
                            echo "<option value='{$data['language_id']}'>{$data['language_name']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnadd" id="btnadd" value="Submit" />
                </td>
            </tr>
        </table>
    </form>

    <h1 class="form-header">My Languages</h1>

    <table>
        <tr>
            <th>Language</th>
            <th>Action</th>
        </tr>
        <?php
        $selqry = "select * from tbl_tutor_language p inner join tbl_language d on p.language_id = d.language_id";
        $lang = $con->query($selqry);
        while ($data = $lang->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $data['language_name']; ?></td>
            <td class="action-links">
                <a href="Mylanguage.php?delID=<?php echo $data['language_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
