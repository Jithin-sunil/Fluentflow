<?php
include('../Assests/connection/connection.php');
include('Header.php');
if(isset($_POST['btnadd']))
{
	$language=$_POST['txtlanguage'];
	
	$insqry= "insert into tbl_language(language_name)values('$language')";
	if($con->query($insqry))
	{
	 ?>
     <script>
	 alert('Language Saved')
	 </script>
     <?php
	}	
}
if(isset($_GET["delID"]))
{
	$languag=$_GET["delID"];
	$delqry="delete from tbl_language where language_id='$languag'";
	if($con->query($delqry))
	{
		?>
		<script>
		alert('Language Deleted')
		</script>
		<?php
	}
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Dashboard - Manage Languages</title>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fa;
        margin: 0;
        padding: 0;
    }
    h1 {
        text-align: center;
        color: #2c3e50;
        margin-top: 30px;
    }
    .container {
        width: 80%;
        margin: 30px auto;
        background-color: white;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 8px;
    }
    form {
        background-color: white;
        padding: 20px;
        border: 1px solid #e3e3e3;
        border-radius: 5px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: white;
    }
    table, th, td {
        border: 1px solid #d1d1d1;
    }
    th, td {
        padding: 12px;
        text-align: center;
    }
    th {
        background-color: #3498db;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #e8f6ff;
    }
    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        width: 100%;
        background-color: #3498db;
        color: white;
        padding: 12px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #2980b9;
    }
    .delete-btn {
        color: red;
        font-weight: bold;
        text-decoration: none;
    }
    .delete-btn:hover {
        color: darkred;
    }
    .dashboard-title {
        text-align: center;
        font-size: 24px;
        color: #2c3e50;
        font-weight: bold;
        margin-bottom: 20px;
    }
</style>
</head>

<body>
    <div class="container">
        <h1>Admin Dashboard - Manage Languages</h1>
        <form id="form1" name="form1" method="post" action="">
            <table>
                <tr>
                    <td>
                        <label for="txtlanguage">Language:</label>
                        <input type="text" name="txtlanguage" id="txtlanguage" />
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <input type="submit" name="btnadd" id="btnadd" value="Add Language" />
                    </td>
                </tr>
            </table>
        </form>

        <div class="dashboard-title">Language List</div>
        <table>
            <tr>
                <th>SLNO</th>
                <th>Language</th>
                <th>Action</th>
            </tr>
            <?php
            $selqry = "select * from tbl_language";
            $lang = $con->query($selqry);
            $i = 0;
            while ($data = $lang->fetch_assoc()) {
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data['language_name'] ?></td>
                <td>
                    <a href="Language.php?delID=<?php echo $data['language_id']?>" class="delete-btn">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
<?php
include('Footer.php');
?>