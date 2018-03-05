<?php
    include("conn.php");
        $id = $_REQUEST['id'];
    $delete = $conn->query("DELETE FROM users WHERE id = '$id'");
        header("location:view.php");
?>