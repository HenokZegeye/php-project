<?php
session_start();
include_once '../Class/Product.php';

extract($_POST);

print_r($_POST);

if($_POST['submit']=='Add product'){
    $product = new Product(NULL, 1, $Product_Name, $Product_Price, $Product_Description, $Product_Status, $Product_PostDate, 1);
    $product->saveProduct();
}

// {{{{{{{{ HN Added}}}}}}}}}}}
// NOTICE data type of product_status changed to int

//change approval status 
if($_POST['submit']=="ChangeProduct_status"){
    $product = new Product($Product_Id, null, null, null, null, $Product_Status,null, null);
    $product->ChangeProductStatus();
}

if($_POST['submit']=="Delete_Product"){
    $delProduct_Id=$_POST['Product_Id'];
    $product = new Product($Product_Id, null, null, null, null, null,null, null);
    $product->DeleteProduct($delProduct_Id);
    
}


