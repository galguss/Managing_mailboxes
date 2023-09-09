<?php
include "mySql_connection.php";
$sql = new mysql_conn();
$mySql = $sql->GetConn();

include "class_mailboxes_M.php";
$mailboxes = new mailboxes($mySql);

$id = isset($_GET['id'])? $_GET['id'] : -1;
if($id > 0){
    $mailboxes->DeleteMailbox($id);
    header("location:./ListMailBox.php");
}
