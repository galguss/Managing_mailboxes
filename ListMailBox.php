<?php
session_start();

if(!$_SESSION['IsLogged']){
    header("location:./login.php");
}

include "mySql_connection.php";
$sql = new mysql_conn();
$mySql = $sql->GetConn();

include 'class_mailboxes_M.php';
$mailboxes = new mailboxes($mySql);

$data = $mailboxes->GetAllMailBoxes();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        a{
            text-decoration: none;
        }
        th,td{
            border: black solid 1px;
            text-align: center;
            padding: 4px;
        }
        table{
            margin: auto;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <table>
        <tr><th colspan="5"><a href="./createMailBox.php">create new</a></th></tr>
        <tr>
            <th></th>
            <th>name</th>
            <th>box number</th>
            <th>phone number</th>
            <th></th>
        </tr>
        <?php foreach ($data as $item) {?>
            <tr>
                <td><a href="./EditMailBox.php?id=<?= $item['id']?>">Edit</a></td>
                <td><?= htmlspecialchars($item['name'])?></td> // stored XSS מגן מפני הזרקת סקריפט זדוני לבסיס נתונים
                <td><?= htmlspecialchars($item['box_number'])?></td> // stored XSS
                <td><?= htmlspecialchars($item['phone_number'])?></td> // stored XSS
                <td><a href="./DeleteMailBox.php?id=<?= $item['id']?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>
