<html>
    <body>
        <div>Filter Seller page</div><br/>
        <div>Seller Status</div>
    
            <form action="FilteredSeller.php" method="POST">
                <table border="1">
                    <tr>
                        <td>
                            <select name="Account_Status">
                                <option value="NULL"></option>
                                <option value="1">Activate</option>
                                <option value="0">Deactivate</option>
                            </select>
                            <button type="submit" name="submit" value="Filter_Seller">Change Status</button>
                        </td>
                    </tr>
                </table>    
            </form>
    
    <div>Search </div>
             <form action="FilteredSeller.php" method="POST">
                <table border="1">
                    <tr>
                        <td>
                            <input type="text" name="Seller_Id"/>
                            <button type="submit" name="submit" value="Filter_Seller">Change Status</button>
                        </td>
                    </tr>
                </table>    
            </form>
    
            <!-- View seller-->
            <div>seller list</div>
    
            <table border="1">
                <tr>
                    <td>Seller Id</td>
                    <td>Seller Name</td> 
                    <td>Seller Email</td>
                    <td>Number of Products</td>    
                    <td>Account Status</td>  
                    <td>Action</td>                    
                </tr>    
                
                <?php
                
                $accountStatus=$_POST['Account_Status'];
                $sellerId=$_POST['Seller_Id'];
                
                $query = "SELECT Seller_Id, Seller_Name, Seller_Email from seller";
                
                 //include_once '../../Class/Connection.php';
                
                $read = new Connection();
                $result = $read->executeQuery($query);
                while ($row = mysqli_fetch_object($result)) {
                 ?>
                    <tr>
                        <td><?php print($row->Seller_Id); ?></td>
                        <td><?php print($row->Seller_Name); ?></td>  
                        <td><?php print($row->Seller_Email); ?></td>
                        
                        <!-- Number of products-->
                        <td>
                            <?php
                             $query="SELECT COUNT(*) AS pro_num FROM product p, seller s WHERE p.Seller_Id=s.Seller_Id AND s.Seller_Id=".$row->Seller_Id;
                              
                             //print_r($query3);
                             $proNum= mysqli_fetch_object($read->executeQuery($query));
                             print($proNum->pro_num);
                            ?>
                        </td>
                        <!-- Account Status -->
                        <td>
                            <?php 
                            $query2="SELECT a.Account_Status FROM account a, seller s WHERE a.Account_Id=s.Account_Id AND s.Seller_Id=".$row->Seller_Id;
                              
                             //print_r($query2);
                            
                             $proNum= mysqli_fetch_object($read->executeQuery($query2));
                             //print($proNum->pro_num);
                            $acc_status=$proNum->Account_Status;
                            if($acc_status==1)                          
                                print("Activated"); 
                            else
                                print("Deactivated");
                           
                            ?>
                        </td>
                        <!-- Action -->
                        <td>                            
                            <form action="../../Connector/SellerConnector.php" method="POST">
                            <input type="hidden" name="Seller_Id" value="<?php print($row->Seller_Id);?>" required />
                            <select name="Account_Status">
                                <option value="null"></option>
                                <option value="1">Activate</option>
                                <option value="0">Deactivate</option>
                            </select>
                            <button type="submit" name="submit" value="ChangeAccount_status">Change Status</button>
                           
                            </form>
                        </td>        
                    </tr>  
                    <?php
                }
                ?>

            </table>    
    

    </body>
</html>


