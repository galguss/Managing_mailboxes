<?php

class mailboxes {
    private $mysql;
    private $password;

    function __construct($conn){
        $this->mysql = $conn;
        $this->password = 'AAA';
    }

    public function IsValid($pass){
        return $pass == $this->password ;
    }

   public function CreateMailBox($params){
        $name = isset($params['name']) ? $params['name'] : '';
        $mailBoxNum = isset($params['box_number']) ? $params['box_number'] : '';
        $phoneNumber = isset($params['phone_number']) ? $params['phone_number'] : '';


        $q = "INSERT INTO `mailboxes` ( `name`, `box_number`, `phone_number`) ";
        $q .= " VALUES ( '$name', '$mailBoxNum', '$phoneNumber')";;

       $result = mysqli_query($this->mysql, $q);
    }
}
