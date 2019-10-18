<?php

include_once '../../Class/Connection.php';

$Prod_Id=$_REQUEST['proid'];
//print_r($Prod_Id);
$sql_prod="select p.Product_Name, p.Product_Price, p.Product_Status, p.Product_PostDate,p.Product_Description, s.Seller_Id, s.Seller_Name, psc.Subcategory_Name from product p, product_subcategory psc, seller s where p.Subcategory_Id=psc.Subcategory_Id AND p.Seller_Id=s.Seller_Id and Product_ID='".$Prod_Id."'";
$prod = new Connection();
$record= mysqli_fetch_object($prod->executeQuery($sql_prod));
//print_r($record);
//print_r($sql_prod);

?>
<html>
    <body>
        <button>
            <a href="ProductPage.php"> Back</a>
        </button>
        <table border="1">
                 <tr>
                    <td>
                        prod name: <?php print($record->Product_Name); ?>
                    </td>
                    <td colspan="2">
                        prod price: <?php print($record->Product_Price); ?>
                    </td>
                        
                 </tr>
                 <tr>
                    <td>
                        prod sub_cat: <?php print($record->Subcategory_Name); ?>
                    </td>  
                    <td>
                        prod status: 
                        <?php 
                        if($record->Product_Status==1)                          
                            print("Approved"); 
                        else
                            print("Not Approved");
                        ?>
                    </td>
                    <td>
                        post date : <?php print($record->Product_PostDate); ?>
                    </td>
                 </tr>
                  <tr>
                    <td>
                        seller id: <?php print($record->Seller_Id); ?>
                    </td>
                    <td colspan="2">
                        seller name: <?php print($record->Seller_Name); ?>
                    </td>
                  </tr>
                  <td colspan="3">
                        description: <?php print($record->Product_Description); ?>
                    </td> 
                </tr>  
        </table> 
    </body> 
</html>

