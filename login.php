<?php
session_start(); // Cookie poisoning מגן מפני הרעלת עוגיה
include "mySql_connection.php";
$sql = new mysql_conn();
$mySql = $sql->GetConn();

include "class_mailboxes_M.php";
$mailboxes = new mailboxes($mySql);

$gss = isset($_SESSION['gss'])? $_SESSION['gss'] : 0;
if(isset($_GET['btnForm'])){
    if($gss < 4 && $mailboxes->IsValid($_GET['password'])){ // brute force למנוע ניחוש סיסמה
        $_SESSION['IsLogged'] = true;
        header("location:./ListMailBox.php");
    }else{
        echo "Try again";
        $gss++;
    }
    $_SESSION['gss'] = $gss;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin: auto;
        }
        input{
            height: 30px;
            margin-bottom:10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<form action="">
    <input type="text" name="password" placeholder="Enter Password please"/>
    <button value="1" name="btnForm">login</button>
</form>

</body>
</html>
