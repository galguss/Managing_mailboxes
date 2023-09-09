<?php
include "mySql_connection.php";
$sql = new mysql_conn();
$mySql = $sql->GetConn();

include "class_mailboxes_M.php";
$mailboxes = new mailboxes($mySql);

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$mailBox = $mailboxes->GetMailBox($id);


if(isset($_GET['btnForm'])) {
    $mailboxes->EditMailBox($_GET);
    header("location:./ListMailBox.php");
}

?>
<!doctype html>
<html lang="en">
<head>
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
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="">
    <input type="hidden" name="id" value="<?= $mailBox['id']?>" />
    <input type="text" name="name" value="<?= $mailBox["name"]?>" placeholder="please Enter Name"/>
    <input type="number" name="box_number" value="<?= $mailBox["box_number"]?>" placeholder="please Enter box Number"/>
    <input type="number" name="phone_number" value="<?= $mailBox["phone_number"]?>" placeholder="please Enter phone Number"/>

    <button name="btnForm" value="1">submit</button>
</form>
</body>
</html>
