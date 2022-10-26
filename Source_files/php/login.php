<?php
    require_once("./db_con.php");
    $userid=$_POST["login_id"];
    $userpw=$_POST["login_pw"];

    $sql_check="SELECT * FROM member WHERE ID='$userid' and PW=password('$userpw')";
    $result=$conn->query($sql_check);
    $num = $result->num_rows;

    if($num > 0) {
        session_start();
        $_SESSION["userid"] = $userid;
        echo "<script>alert(\"환영합니다\");</script>";
        echo "<script>location.replace('../index_auth.html');</script>";

    } else {
        echo "<script>alert(\"인증실패\");</script>";
        echo "<script>window.history.back();</script>";
    }
?>

