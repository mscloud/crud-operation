<?php
    $myhost = "localhost";
    $myuser = "root";
    $mypass = "";
    $mydb = "test";
$conn = new mysqli($myhost, $myuser, $mypass, $mydb);
if ($conn->connect_error) {
    die("Error!!! ");
}
?>