<?php
    require_once("./db_con.php");
    session_start();
    $title = $_POST["title"];
    $content = $_POST["content"];
    $userid = $_SESSION["userid"];
    $date = $_POST["date"];

    $insert_sql = "INSERT INTO board (title,content,userid,date) VALUES ('$title','$content','$userid','$date')";
    if (mysqli_query($conn,$insert_sql)){
        
        $CNT = "SET @CNT=0";
        $conn->query($CNT);
        $Auto_Increment = "UPDATE board SET No = @CNT:=@CNT+1";
        $conn->query($Auto_Increment);

        echo "<script>alert(\"정상적으로 등록되었습니다.\");</script>";
        echo "<script>location.replace('./board.php');</script>";
        exit;
    } else {
	    echo "<script>alert(\"오류발생: 관리자에게 문의하세요.\");</script>";
        echo "<script>location.replace('./board.php');</script>";
        exit;
    }
?>





