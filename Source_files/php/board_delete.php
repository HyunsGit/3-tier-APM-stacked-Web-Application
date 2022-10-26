<?php
    // mysqli Class
    require_once("./db_con.php");
    $page = $_GET["page"];
    $delete_sql = "DELETE FROM board WHERE No='$page'";
    $conn->query($delete_sql);

    $CNT = "SET @CNT=0";
    $conn->query($CNT);
    $Auto_Increment = "UPDATE board SET No = @CNT:=@CNT+1";
    $conn->query($Auto_Increment);
    
    echo "<script>alert(\"정상적으로 삭제되었습니다.\");</script>";
    echo "<script>location.replace('./board.php');</script>";
?>