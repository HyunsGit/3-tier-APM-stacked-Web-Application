<?php
    require_once("./db_con.php"); 
    $userid=$_POST["id"];
    $userpw=$_POST["pw"];
    $userpw2=$_POST["pw2"];
    $username=$_POST["name"];
    $userphone=$_POST["phone"];
    $useraddr=$_POST["addr"];
    $usermail=$_POST["mail"];

    if ( $userpw != $userpw2 ){
        echo "<script>alert(\"패스워드가 일치하지 않습니다.\");</script>";
	    echo "<script>window.history.back();</script>";
        exit;
    }
    
    $id_check_sql = "SELECT * FROM member WHERE id='$userid'";
    $result = $conn->query($id_check_sql);

   if($result->num_rows==1)
    {
        echo "<script>alert(\"이미 사용중인 ID입니다.\");</script>";
	    echo "<script>window.history.back();</script>";
        exit;
    }

    $insert_sql = "INSERT INTO member (ID,PW,Name,Phone,Addr,Mail) VALUES ('$userid',password('$userpw'),'$username','$userphone','$useraddr','$usermail')";

    if (mysqli_query($conn,$insert_sql)){
        $CNT = "SET @CNT=0";
        mysqli_query($conn,$CNT);
        $Auto_Increment = "UPDATE member SET No = @CNT:=@CNT+1";
        mysqli_query($conn,$Auto_Increment);
        echo "<script>alert(\"정상적으로 회원가입이 완료되었습니다.\");</script>";
	    echo "<script>location.replace('../index.html');</script>";
        exit;

    } else { 
	    echo "<script>alert(\"오류발생: 관리자에게 문의하세요.\");</script>";
        echo "<script>location.replace('../index.html');</script>";
        exit;
    }
?>
