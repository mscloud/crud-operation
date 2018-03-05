<?php
    session_start();
      include("conn.php");
if (!isset($_SESSION['user'])) {
    header("location:index.php");
}
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $fname = $_POST['fname'];
        $sname = $_POST['sname'];
        $state = $_POST['state'];
    if ($insert = $conn->query("INSERT INTO users (fname, sname, state) VALUES('$fname', '$sname', '$state')")) {
        header("location:view.php");
    }
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            Mycrud | Home
        </title>
    </head>
    <body>
        <p><a href = "view.php">View Records</a></p>
        <form method="post" >
            <input type="text" name="fname" placeholder="FirstName" autofocus required><br><br>
            <input type="text" name="sname" required placeholder="SecondName"><br><br>
            <input type="text" name="state" required placeholder="State"><br><br>
            <input type="submit" value="Insert" name="insert">
        </form>
    </body>
</html>