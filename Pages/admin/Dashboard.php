
<html>
    <body>
        
        <div>Products</div>
        <table border="1">
            <tr>
                  
                <td> 
                   Approve Products :
                    <?php

                    $query = "SELECT COUNT(*) AS Approve_Products FROM product WHERE Product_Status=1";
                    include_once '../../Class/Connection.php';
                    $read = new Connection();
                    $result = $read->executeQuery($query);
                     $approvedNum= mysqli_fetch_object($read->executeQuery($query));
                     print($approvedNum->Approve_Products);
                    
                   ?>
                </td>
            </tr>
            <tr>
                <td> 
                   Not Approved Products :
                    <?php

                    $query = "SELECT COUNT(*) AS Not_Approve_Products FROM product WHERE Product_Status=0";
                    include_once '../../Class/Connection.php';
                    $read = new Connection();
                    $result = $read->executeQuery($query);
                     $NotApprovedNum= mysqli_fetch_object($read->executeQuery($query));
                     print($NotApprovedNum->Not_Approve_Products);
                    
                   ?>
                </td>
            </tr>
            <tr>
                <td> 
                   Total Products :
                    <?php

                    $query = "SELECT COUNT(*) AS Total_Products FROM product";
                    include_once '../../Class/Connection.php';
                    $read = new Connection();
                    $result = $read->executeQuery($query);
                     $TotalNum= mysqli_fetch_object($read->executeQuery($query));
                     print($TotalNum->Total_Products);
                    
                   ?>
                </td>     
            </tr>
        </table> 
        
        <div>Category</div>
        <table border="1">
            <tr>
                  
                <td> 
                   Total Categories:
                    <?php

                    $query = "SELECT COUNT(*) AS Total_Category FROM product_category";
                    include_once '../../Class/Connection.php';
                    $read = new Connection();
                    $result = $read->executeQuery($query);
                     $totalCategory= mysqli_fetch_object($read->executeQuery($query));
                     print($totalCategory->Total_Category);
                    
                   ?>
                </td>
            </tr>
            <tr>
                  
                <td> 
                   Total Subcategories:
                    <?php

                    $query = "SELECT COUNT(*) AS Total_Subcategory FROM product_subcategory";
                    include_once '../../Class/Connection.php';
                    $read = new Connection();
                    $result = $read->executeQuery($query);
                     $totalSubcategory= mysqli_fetch_object($read->executeQuery($query));
                     print($totalSubcategory->Total_Subcategory);
                    
                   ?>
                </td>
            </tr>
        </table>
        
         <div>Sellers</div>
        <table border="1">
            <tr>
                  
                <td> 
                   With Active Accounts:
                    <?php

                    $query = "SELECT COUNT(*) AS Active_Sellers FROM account, seller WHERE account.Account_Id=seller.Account_Id AND account.Account_Status=1 ";
                    include_once '../../Class/Connection.php';
                    $read = new Connection();
                    $result = $read->executeQuery($query);
                    $activeAccount= mysqli_fetch_object($read->executeQuery($query));
                     print($activeAccount->Active_Sellers);
                    
                   ?>
                </td>
            </tr>
            
            <tr>
                  
                <td> 
                   With Deactivated Accounts:
                    <?php
                    
                    $query_total = "SELECT COUNT(*) Total_Sellers FROM account, seller WHERE seller.Account_Id=account.Account_Id";
                    $query_active = "SELECT COUNT(*) AS Active_Sellers FROM account, seller WHERE account.Account_Id=seller.Account_Id AND account.Account_Status=1 ";
                    include_once '../../Class/Connection.php';
                    $read = new Connection();
                    $result = $read->executeQuery($query);
                    
                    $totalSeller= mysqli_fetch_object($read->executeQuery($query_total));
                    $totalActive=mysqli_fetch_object($read->executeQuery($query_active));
                    
                    $totalSeller=$totalSeller->Total_Sellers;
                    $totalActive=$totalActive->Active_Sellers;
                    
                    //print_r($totalSeller);
                    //print_r($totalActive);
                    print $totalSeller - $totalActive;
                    
                   ?>
                </td>
            </tr>
            
            <tr>
                  
                <td> 
                   Total Sellers:
                    <?php

                    $query = "SELECT COUNT(*) Total_Sellers FROM account, seller WHERE seller.Account_Id=account.Account_Id";
                    include_once '../../Class/Connection.php';
                    $read = new Connection();
                    $result = $read->executeQuery($query);
                    $totSeller= mysqli_fetch_object($read->executeQuery($query));
                    print($totSeller->Total_Sellers);
                    
                   ?>
                </td>
            </tr>
            
        </table>
    </body>
</html>
