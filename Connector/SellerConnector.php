<?php
session_start();
include_once '../Class/Account.php';
include_once '../Class/Seller.php';
include_once '../Class/Product.php';

extract($_POST);


if($_POST['submit']=='Save Seller'){
    $acc = new Account(NULL,$User_Email, md5($User_Password),'Seller',$Account_Created_By,NULL,'0');
    $Account_ID = $acc->SaveAccount();
    $seller = new Seller(NULL,$Account_ID,$Seller_Email,$Seller_Name,$Seller_Phone,$Seller_Alternate_Phone,$Region,$City,$Sub_City);
    $seller->SaveSeller();

    $_SESSION['loggeduser'] = $email;
    
    $_SESSION['validated'] = true;
}

// {{{{{{{{ HN Added}}}}}}}}}}}
/*if ($_POST['submit']=='ChangeAccount_status'){
    
    $status_value=$_POST['Account_Status'];
    //print_r($status_value);
    
    if($_POST['Account_Status']=="null"){
       
       header("location:../Pages/admin/SellerPage.php");
    }
    
    elseif ($_POST['Account_Status']==1) { // if account is activate then also approve the product by making the Product_status 1
    
        $seller = new Seller($Seller_Id, null, null, null, null, null, null, null, null);
        $seller->ChangeSeller_AccountStatus($_POST['Account_Status']);
        $product = new Product(null, $Seller_Id, null, null, null, null ,null, null);
        $product->ChangeProductStatus_WhenAccountChange($_POST['Account_Status']);
        
        header("location:../Pages/admin/SellerPage.php");
    }
    
    elseif ($_POST['Account_Status']==0) { // if account is deactivated then disapprove the product by making the Product_status 0
    
     $seller = new Seller($Seller_Id, null, null, null, null, null, null, null, null);
       $seller->ChangeSeller_AccountStatus($_POST['Account_Status']);
       $product = new Product(null, $Seller_Id, null, null, null, null, null, null);
       $product->ChangeProductStatus_WhenAccountChange($_POST['Account_Status']); 
       
       header("location:../Pages/admin/SellerPage.php");
    }
    
    else if ($_POST['Account_Status']=="Filter_Seller"){
        
    }

}*/
