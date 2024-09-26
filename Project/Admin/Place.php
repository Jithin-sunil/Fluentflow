<?php
include('../Assests/connection/connection.php');
include('Header.php');

if(isset($_POST['btnsubmit']) != null)
{
	$name = $_POST['txtname'];
	$pincode = $_POST['txtpincode'];
	$districtID = $_POST["selDistrict"];
	
	$insqry = "insert into tbl_place(place_name, place_pincode, district_id) values('$name', '$pincode', '$districtID')";
	if($con->query($insqry))
	{
		echo "Record saved";
	}
	else
	{
		echo "Error in query";
	}
}

if(isset($_GET["delID"]))
{
	$placeID = $_GET["delID"];
	$delQry = "delete from tbl_place where place_id='$placeID'";
	if($con->query($delQry))
	{
		echo "Record Deleted";
	}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place Management</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7f9;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 80%;
        margin: 20px auto;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 10px;
    }
    h1 {
        text-align: center;
        color: #333;
        margin-top: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    table, th, td {
        border: 1px solid #ccc;
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
    form {
        margin: 0 auto;
        padding: 20px;
    }
    input[type="text"], select {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    input[type="submit"] {
        background-color: #3498db;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }
    input[type="submit"]:hover {
        background-color: #2980b9;
    }
    .delete-btn {
        color: red;
        text-decoration: none;
        font-weight: bold;
    }
    .delete-btn:hover {
        color: darkred;
    }
    .dashboard-title {
        text-align: center;
        font-size: 24px;
        color: #2c3e50;
        font-weight: bold;
    }
</style>
</head>

<body>
    <div class="container">
        <h1>Place Management</h1>
        <form id="form1" name="form1" method="post" action="">
            <table>
                <tr>
                    <td><label for="selDistrict">District</label></td>
                    <td>
                        <select name="selDistrict">
                            <option value="--select--">--select--</option>
                            <?php
                            $selQry = "select * from tbl_district";
                            $result = $con->query($selQry);
                            while($data = $result->fetch_assoc())
                            {
                            ?>
                            <option value="<?php echo $data['district_id']; ?>"><?php echo $data['district_name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="txtname">Place Name</label></td>
                    <td><input type="text" name="txtname" id="txtname" /></td>
                </tr>
                <tr>
                    <td><label for="txtpincode">Pincode</label></td>
                    <td><input type="text" name="txtpincode" id="txtpincode" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>	
                </tr>
            </table>
        </form>

        <div class="dashboard-title">Place List</div>
        <table>
            <tr>
                <th>SINo</th>
                <th>Place Name</th>
                <th>Pincode</th>
                <th>District</th>
                <th>Action</th>
            </tr>
            <?php
            $selQry = "select * from tbl_place p inner join tbl_district d on p.district_id = d.district_id";
            $result = $con->query($selQry);
            $i = 0;
            while($data = $result->fetch_assoc())
            {
                $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['place_name']; ?></td>
                <td><?php echo $data['place_pincode']; ?></td>
                <td><?php echo $data['district_name']; ?></td>
                <td><a href="Place.php?delID=<?php echo $data['place_id']; ?>" class="delete-btn">Delete</a></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
<?php
include('Footer.php');
?>