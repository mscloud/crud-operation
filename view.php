<?php
    session_start();
if (!isset($_SESSION['user'])) {
    header("location:index.php");
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title> mycrud | View </title>
        <link href="styl.css" rel="stylesheet">
    </head>
    <body>
        <p>Welcome 
			<span style="text-transform: uppercase; color: red; padding: 0px 5px;"><?= 					$_SESSION['user'] ?>
			</span>
			<a href = "add.php">Add Record</a> || 
			<a href = "logout.php">LogOut</a>
		</p>
        <table id="t01">
			<tr>
				<th>SerialNo.</th>
				<th>FName</th>
				<th>SName</th>
				<th>State</th>
				<th colspan="2">Actions</th>
			</tr>
<?php
    include("conn.php");
                $count=1;
                $sel_query = $conn->query("SELECT * FROM users ORDER BY id DESC;");
                while($row = $sel_query->fetch_assoc()) { 
?>
            <tr>
				<td align="center"><?= $count; ?></td>
				<td align="center"><?= $row["fname"]; ?></td>
				<td align="center"><?= $row["sname"]; ?></td>
				<td align="center"><?= $row["state"]; ?></td><td align="center">
				<a href="edit.php?id=<?= $row['id']; ?>">Edit</a></td>
				<td align="center">
					<a onClick="return confirm('your deleting a record! Comfirm.');" href="delete.php?id=<?= $row['id']; ?>">Delete</a>
				</td>
			</tr>
            <?php
                $count++;
                } 
            ?>
            </table>
    </body>
</html>