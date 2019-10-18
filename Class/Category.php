<?php
include_once 'Connection.php';

class Category {
    private $Category_Id;
    private $Account_Id;
    Private $Category_Name;
    
    function __construct($Category_Id, $Account_Id, $Category_Name) {
        $this->Category_Id=$Category_Id;
        $this->Account_Id=$Account_Id;
        $this->Category_Name=$Category_Name;
    }
    
    function getCategory_Id() {
      return $this->Category_Id;
    }

    function getAccount_ID() {
      return $this->Account_Id;
    }
    
     function getCategory_Name() {
      return $this->Category_Name;
    }
    
    //******
    
    function setCategory_Id($Category_Id) {
        $this->Category_Id=$Category_Id;
    }

    function setAccount_Id($Account_Id) {
        $this->Account_Id = $Account_Id;
    }
    
    function setCategory_Name($Category_Name) {
        $this->Category_Name= $Category_Name;
    }
    
    //**** functions 
    
    function SaveCategory(){  
        $sql_category="INSERT INTO product_category (Category_Id, Account_Id, Category_Name) VALUES"
                . " (NULL, NULL, '".$this->getCategory_Name()."');";
        $execute_Query=new Connection();
        $execute_Query->executeQuery($sql_category);
    //
    var_dump($sql_category);   
    }
    
    function UpdateCategory(){
        $update_cat="UPDATE product_category SET  Category_Name = '".$this->getCategory_Name()."' WHERE product_category.Category_Id = '".$this->getCategory_Id()."';";
        $updateCat=new Connection();
        $updateCat->executeQuery($update_cat);
        var_dump($update_cat);
        
        header("location: ../Pages/admin/CategoryPage1.php");
    }
    
    function Filter_Product($Status){
        $query="SELECT P.Product_Id, P.Product_Name, P.Product_PostDate, P.Product_Status, S.Seller_Name, C.Category_Name, Sc.Subcategory_Name FROM product P"
                ." JOIN seller S ON S.Seller_Id = P.Seller_Id JOIN product_subcategory Sc ON Sc.Subcategory_Id = P.Subcategory_Id"
                ." JOIN product_category C ON C.Category_Id = Sc.Category_Id WHERE P.Product_Status = ".$Status." and C.Category_Id = ".$this->getCategory_Id();
        $read=new Connection();
        $result=$read->executeQuery($query);
        
        var_dump($filter_cat);  
    }

}
