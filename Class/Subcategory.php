<?php
include_once 'Connection.php';
class Subcategory {
    //put your code here
    private $Subcategory_Id;
    private $Category_Id;
    private $Account_Id;
    private $Subcategory_Name;
    
    function __construct($Subcategory_Id, $Category_Id, $Account_Id, $Subcategory_Name) {
        $this->Subcategory_Id = $Subcategory_Id;
        $this->Category_Id = $Category_Id;
        $this->Account_Id = $Account_Id;
        $this->Subcategory_Name = $Subcategory_Name;
    }

    function getSubcategory_Id() {
        return $this->Subcategory_Id;
    }

    function getCategory_Id() {
        return $this->Category_Id;
    }

    function getAccount_Id() {
        return $this->Account_Id;
    }

    function getSubcategory_Name() {
        return $this->Subcategory_Name;
    }

    function setSubcategory_Id($Subcategory_Id) {
        $this->Subcategory_Id = $Subcategory_Id;
    }

    function setCategory_Id($Category_Id) {
        $this->Category_Id = $Category_Id;
    }

    function setAccount_Id($Account_Id) {
        $this->Account_Id = $Account_Id;
    }

    function setSubcategory_Name($Subcategory_Name) {
        $this->Subcategory_Name = $Subcategory_Name;
    }
    
    // function
     /*INSERT INTO `product_subcategory` (`Subcategory_Id`, `Category_Id`, `Account_Id`, `Subcategory_Name`) VALUES (NULL, '1', NULL, 'land');
     * 
     */
    function SaveSubcategory(){
        
        $sql_subcategory="INSERT INTO product_subcategory (Subcategory_Id, Category_Id, Account_Id, Subcategory_Name) VALUES"
                . " (NULL, '".$this->getCategory_Id()."',NULL, '".$this->getSubcategory_Name()."');";
        $execute_Query=new Connection();
        $execute_Query->executeQuery($sql_subcategory);
        
        //
        //var_dump($sql_subcategory);
        header("location: ../Pages/admin/CategoryPage1.php");
    }
    
    function UpdateSubCategory(){
        $update_subcat="UPDATE product_subcategory SET Subcategory_Name = '".$this->getSubcategory_Name()."' WHERE product_subcategory.Subcategory_Id = '".$this->getSubcategory_Id()."';";
        $updateSubcat=new Connection();
        $updateSubcat->executeQuery($update_subcat);
        //
        //var_dump($update_subcat);
        header("location: ../Pages/admin/SubcategoryPage.php");
    }
    
    function ChangeSubCategory_Category(){
        $change_subcat="UPDATE product_subcategory SET Category_Id = '".$this->getCategory_Id()."' WHERE product_subcategory.Subcategory_Id = '".$this->getSubcategory_Id()."';";
        $changeSubcat=new Connection();
        $changeSubcat->executeQuery($change_subcat);
        //
        var_dump($change_subcat);
        header("location: ../Pages/admin/SubcategoryPage.php");
    }    
}

// UPDATE `product_subcategory` SET `Category_Id` = '5' WHERE `product_subcategory`.`Subcategory_Id` = 9;