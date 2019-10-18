<?php
include_once 'Connection.php';

class Seller {
    private $Seller_Id;
    private $Account_Id;
    private $Seller_Email;
    private $Seller_Name;
    private $Seller_Phone;
    private $Seller_Alternate_Phone;
    private $Region;
    private $City;
    private $Sub_City;
          function __construct($Seller_Id, $Account_Id, $Seller_Email, $Seller_Name, $Seller_Phone, $Seller_Alternate_Phone, $Region, $City, $Sub_City) {
              $this->Seller_Id = $Seller_Id;              
              $this->Account_Id = $Account_Id;
              $this->Seller_Email = $Seller_Email;
              $this->Seller_Name = $Seller_Name;
              $this->Seller_Phone = $Seller_Phone;
              $this->Seller_Alternate_Phone = $Seller_Alternate_Phone;
              $this->Region = $Region;
              $this->City = $City;
              $this->Sub_City = $Sub_City;
            
    }
    function getSeller_Id() {
        return $this->Seller_Id;
    }

    function getAccount_Id() {
        return $this->Account_Id;
    }

    function getSeller_Email() {
        return $this->Seller_Email;
    }

    function getSeller_Name() {
        return $this->Seller_Name;
    }

    function getSeller_Phone() {
        return $this->Seller_Phone;
    }

    function getSeller_Alternate_Phone() {
        return $this->Seller_Alternate_Phone;
    }

    function getRegion() {
        return $this->Region;
    }

    function getCity() {
        return $this->City;
    }

    function getSub_City() {
        return $this->Sub_City;
    }

    function setSeller_Id($Seller_Id) {
        $this->Seller_Id = $Seller_Id;
    }

    function setAccount_Id($Account_Id) {
        $this->Account_Id = $Account_Id;
    }

    function setSeller_Email($Seller_Email) {
        $this->Seller_Email = $Seller_Email;
    }

    function setSeller_Name($Seller_Name) {
        $this->Seller_Name = $Seller_Name;
    }

    function setSeller_Phone($Seller_Phone) {
        $this->Seller_Phone = $Seller_Phone;
    }

    function setSeller_Alternate_Phone($Seller_Alternate_Phone) {
        $this->Seller_Alternate_Phone = $Seller_Alternate_Phone;
    }

    function setRegion($Region) {
        $this->Region = $Region;
    }

    function setCity($City) {
        $this->City = $City;
    }

    function setSub_City($Sub_City) {
        $this->Sub_City = $Sub_City;
    }

    function SaveSeller(){
    $sql_seller="INSERT INTO Seller (Account_Id, Seller_Email, Seller_Name, Seller_Phone, Seller_Alternate_Phone, Region, City, Sub_City) VALUES"
            . " ('".$this->getAccount_Id()."', '".$this->getSeller_Email()."',"
            . " '".$this->getSeller_Name()."', '".$this->getSeller_Phone()."',"
            . " '".$this->getSeller_Alternate_Phone()."', '".$this->getRegion()."', '".$this->getCity()."', '".$this->getSub_City()."');";
    $execute_Query=new Connection();
    $execute_Query->executeQuery($sql_seller);
}

// {{{{{{{{ HN Added}}}}}}}}}}}

    function ChangeSeller_AccountStatus($status){
        $sql_changeStatus="UPDATE account INNER JOIN seller ON seller.Account_Id=account.Account_Id SET account.Account_Status = ".$status ." WHERE seller.Seller_Id = ".$this->getSeller_Id();
        $AccountStatus=new Connection();
        $AccountStatus->executeQuery($sql_changeStatus);
        //
        //var_dump($sql_changeStatus);
    }

}

