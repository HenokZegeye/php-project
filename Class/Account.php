<?php
session_start();
include_once 'Connection.php';
class Account {
   private $Account_ID;
    private $User_Email;
    private $User_Password;
    private $Account_Type;
    private $Account_Created_By;
    private $Account_Approved_By;
    private $Account_Status; 
    
    function __construct($Account_ID, $User_Email, $User_Password, $Account_Type, $Account_Created_By, $Account_Approved_By, $Account_Status) {
        $this->Account_ID = $Account_ID;
        $this->User_Email = $User_Email;
        $this->User_Password = $User_Password;
        $this->Account_Type = $Account_Type;
        $this->Account_Created_By = $Account_Created_By;
        $this->Account_Approved_By = $Account_Approved_By;
        $this->Account_Status = $Account_Status;
    }
    function getAccount_ID() {
        return $this->Account_ID;
    }

    function getUser_Email() {
        return $this->User_Email;
    }

    function getUser_Password() {
        return $this->User_Password;
    }

    function getAccount_Type() {
        return $this->Account_Type;
    }

    function getAccount_Created_By() {
        return $this->Account_Created_By;
    }

    function getAccount_Approved_By() {
        return $this->Account_Approved_By;
    }

    function getAccount_Status() {
        return $this->Account_Status;
    }

    function setAccount_ID($Account_ID) {
        $this->Account_ID = $Account_ID;
    }

    function setUser_Email($User_Email) {
        $this->User_Email = $User_Email;
    }

    function setUser_Password($User_Password) {
        $this->User_Password = $User_Password;
    }

    function setAccount_Type($Account_Type) {
        $this->Account_Type = $Account_Type;
    }

    function setAccount_Created_By($Account_Created_By) {
        $this->Account_Created_By = $Account_Created_By;
    }

    function setAccount_Approved_By($Account_Approved_By) {
        $this->Account_Approved_By = $Account_Approved_By;
    }

    function setAccount_Status($Account_Status) {
        $this->Account_Status = $Account_Status;
    }

    function SaveAccount(){
        $sql = "INSERT INTO Account (User_Email, User_Password, Account_Type,Account_Status) VALUES
( '".$this->getUser_Email()."', '".$this->getUser_Password()."', '".$this->getAccount_Type()."','".$this->getAccount_Status()."');";
        $save = new Connection();
        $save->executeQuery($sql);
        $sql_id="select Account_ID from Account order by Account_ID DESC;";
        $ID = mysqli_fetch_object($save->executeQuery($sql_id));
        $sql_update_Acc_created = "UPDATE Account set Account_Created_By=".$ID->Account_ID." where Account_ID=".$ID->Account_ID.";";
        $save->executeQuery($sql_update_Acc_created);
        header("location: ../Pages/Product/newProduct.php");
        return $ID->Account_ID;
    }
    
    function login(){
        $pass = md5($pass);
        $sql2 = "Select User_Email from Account where User_Email='".$this->getUser_Email()."' and User_Password='".$this->getUser_Password()."';";
        print($sql2);
        $result = new Connection();
        $acc = $result->executeQuery($sql2);
        $count = $acc->num_rows;
        
        $loggeduser = mysqli_fetch_object($acc);



        if($count == 1){
            $_SESSION['name'] = $loggeduser->User_Email;
            if ($loggeduser->Account_Type==='Admin') {
                echo "Hello";
            }else{
                echo $loggeduser->Account_Type;
                header("Location: http://localhost/PhpGroupProject_marketplace_final/Pages/Product/newProduct.php");
            }
        } else {
            header("Location: http://localhost/PhpGroupProject_marketplace_final/Pages/Seller/seller_login.php");
        }
    }
    
    function logout(){
        session_destroy();
        unset($_SESSION['name']);
    }
    
    
    
}
