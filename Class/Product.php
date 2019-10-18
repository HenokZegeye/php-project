<?php
include_once 'Connection.php';
class Product {
  private $Product_Id;
  private $Seller_Id;
  private $Product_Name;
  private $Product_Price;
  private $Product_Description;
  private $Product_Status;
  private $Product_PostDate;
  private $Subcategory_Id;
  
  function __construct($Product_Id, $Seller_Id, $Product_Name, $Product_Price, $Product_Description, $Product_Status, $Product_PostDate, $Subcategory_Id) {
      $this->Product_Id = $Product_Id;
      $this->Seller_Id = $Seller_Id;
      $this->Product_Name = $Product_Name;
      $this->Product_Price = $Product_Price;
      $this->Product_Description = $Product_Description;
      $this->Product_Status = $Product_Status;
      $this->Product_PostDate = $Product_PostDate;
      $this->Subcategory_Id = $Subcategory_Id;
  }
  function getProduct_Id() {
      return $this->Product_Id;
  }

  function getSeller_Id() {
      return $this->Seller_Id;
  }

  function getProduct_Name() {
      return $this->Product_Name;
  }

  function getProduct_Price() {
      return $this->Product_Price;
  }

  function getProduct_Description() {
      return $this->Product_Description;
  }

  function getProduct_Status() {
      return $this->Product_Status;
  }

  function getProduct_PostDate() {
      return $this->Product_PostDate;
  }

  function getSubcategory_Id() {
      return $this->Subcategory_Id;
  }

  function setProduct_Id($Product_Id) {
      $this->Product_Id = $Product_Id;
  }

  function setSeller_Id($Seller_Id) {
      $this->Seller_Id = $Seller_Id;
  }

  function setProduct_Name($Product_Name) {
      $this->Product_Name = $Product_Name;
  }

  function setProduct_Price($Product_Price) {
      $this->Product_Price = $Product_Price;
  }

  function setProduct_Description($Product_Description) {
      $this->Product_Description = $Product_Description;
  }

  function setProduct_Status($Product_Status) {
      $this->Product_Status = $Product_Status;
  }

  function setProduct_PostDate($Product_PostDate) {
      $this->Product_PostDate = $Product_PostDate;
  }

  function setSubcategory_Id($Subcategory_Id) {
      $this->Subcategory_Id = $Subcategory_Id;
  }

  function saveProduct() {
      $sql_product = "INSERT INTO Product (Seller_Id,Product_Name,Product_Price,Product_Description,Product_Status,Product_PostDate,Subcategory_Id) "
              . "Values('".$this->getSeller_Id()."','".$this->getProduct_Name()."',"
              . "".$this->getProduct_Price().",'".$this->getProduct_Description()."',"
              . "'".$this->Product_Status()."','".$this->Product_PostDate()."',".$this->getSubcategory_Id().")";
      $save = new Connection();
      $save->executeQuery($sql_product);
  }


// {{{{{{{{ HN Added}}}}}}}}}}}
  
  function ChangeProductStatus(){
      
        $sql_ProductStatus="UPDATE product SET Product_Status = '".$this->getProduct_Status()."' WHERE product.Product_Id = '".$this->getProduct_Id()."';";
        $ProductStatus=new Connection();
        $ProductStatus->executeQuery($sql_ProductStatus);
        
        //var_dump($sql_ProductStatus);
        header("location: ../Pages/admin/ProductPage.php");
  }
 
  // Called by form SellerConnector.php 
  function ChangeProductStatus_WhenAccountChange($status){
      
        $sql_ProductStatus="UPDATE product INNER JOIN seller ON product.Seller_Id=seller.Seller_Id "
                            ."INNER JOIN account ON account.Account_Id=seller.Account_Id"
                            ." SET product.Product_Status = ".$status." WHERE seller.Seller_Id = ".$this->getSeller_Id();
        $ProductStatus=new Connection();
        $ProductStatus->executeQuery($sql_ProductStatus);
        //
        //var_dump($sql_ProductStatus);
        //header("location: ../Pages/admin/ProductPage.php");
  }
  
  function ADeleteProduct($delProduct_Id){
      $sql_delProd="DELETE FROM product WHERE product.Product_Id =".$delProduct_Id;
      $ProductStatus=new Connection();
      $ProductStatus->executeQuery($sql_delProd);
        //
        //var_dump($sql_delProd);
        header("location: ../Pages/admin/ProductPage.php");
  }
  
  
}
