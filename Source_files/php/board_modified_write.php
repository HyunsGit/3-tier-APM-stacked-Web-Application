<?php
    require_once("./db_con.php");
    session_start();
    $content = $_POST["content"];
    $userid = $_SESSION["userid"];
    $date = $_POST["date"];
    $page = $_POST["page"];
    
    $UPdate_sql = "UPDATE board SET content='$content',date='$date' WHERE No='$page'";

    if (mysqli_query($conn,$UPdate_sql)){
        echo "<script>alert(\"정상적으로 수정되었습니다.\");</script>";
        echo "<script>location.replace('./board_read.php?page=$page');</script>";
    } else {
        echo "<script>alert(\"오류발생: 관리자에게 문의하세요.\");</script>";
        echo "<script>location.replace('./board_read.php');</script>";
        exit;
    }
?>



