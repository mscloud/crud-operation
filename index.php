<?php
    session_start();
    include"conn.php";
$user = "";
if (isset($_SESSION['user'])&& $user != "") {
    header("location:view.php");
}
if (isset($_POST['submit'])) {
	
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $_SESSION['user'] = $user;
	
    if ($log = $conn->query("SELECT * FROM log WHERE pass = '".$pass."' AND user = '".$user."'")) { 
        if ($log->num_rows > 0) {
            header("location:view.php");
        } else {
    echo "could not login";    
}
}
}
?>
<html>
    <head>
        <title>
            mycrud | Login
        </title>
    </head>
    <body>
        <form method = "post">
            <input type="hidden" name="id">
            <input type="text" name="username" placeholder="UserName" required ><br><br>
            <input type="password" name="password" placeholder="PassWord" required><br><br>
            <input type="submit" name="submit" value="LogIn">
        </form>
    </body>
</html>