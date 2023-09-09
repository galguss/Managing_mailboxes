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

    public function GetAllMailBoxes(){
        $query = "SELECT * FROM `mailboxes`";
        $result = mysqli_query($this->mysql, $query);
        return $result;
    }
    public function GetMailBox($id){
        $query = "SELECT * FROM `mailboxes` ";
        $query .= "WHERE id=$id;";

        $result = mysqli_query($this->mysql, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

   public function CreateMailBox($params){
        $name = isset($params['name']) ? $params['name'] : '';
        $mailBoxNum = isset($params['box_number']) ? $params['box_number'] : '';
        $phoneNumber = isset($params['phone_number']) ? $params['phone_number'] : '';


        $query = "INSERT INTO `mailboxes` ( `name`, `box_number`, `phone_number`) ";
        $query .= " VALUES ( '$name', '$mailBoxNum', '$phoneNumber')";;

       $result = mysqli_query($this->mysql, $query);
    }

    public function EditMailBox($params){
        $id = isset($params['id'])? $params['id'] : -1 ;
        $name = isset($params['name']) ? $params['name'] : '';
        $mailBoxNum = isset($params['box_number']) ? $params['box_number'] : '';
        $phoneNumber = isset($params['phone_number']) ? $params['phone_number'] : '';

        if($id > 0){
            $query = "UPDATE `mailboxes` SET ";
            $query .= "name = '$name' , ";
            $query .= "box_number = $mailBoxNum , ";
            $query .= "phone_number = $phoneNumber ";
            $query .= "WHERE id =$id";

            $result = mysqli_query($this->mysql, $query);
        }
    }

    public function DeleteMailbox($id){
            $query = "DELETE FROM `mailboxes`";
            $query .= "WHERE id = '$id' ";

            $result = mysqli_query($this->mysql, $query);
    }
}
