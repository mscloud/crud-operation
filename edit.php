<html>
    <head>
        <title> EditPage </title>
        <meta charset="utf-8">
    </head>
    <body>
    <?php
            session_start();
            include"conn.php";
           if (!isset($_SESSION['user'])) {
                header("location:index.php");
                exit();
           }
            $id = $_REQUEST['id'];
            $select = $conn->query("SELECT * FROM users WHERE id = '$id'");
            $rows = $select->fetch_assoc();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
			
            $fname = $_POST['fname'];
            $sname = $_POST['sname'];
            $state = $_POST['state'];
			
            $edit = $conn->query("UPDATE users set fname = '$fname', sname = '$sname', state = '$state' WHERE id = '$id'");
            header("location:view.php");
        }
    ?>
        <form method = "post">
            <input type = "hidden" name = "id" value="<?= $rows['id']; ?>"><br><br>
            <input type="text" name="fname" value="<?= $rows['fname']; ?>"><br><br>
            <input type="text" name="sname" value = "<?= $rows['sname']; ?>"><br><br>
            <input type="text" name="state" value = "<?= $rows['state']; ?>"><br><br>
            <input type="submit" name="submit" value="Update">
        </form>
    </body>
</html>