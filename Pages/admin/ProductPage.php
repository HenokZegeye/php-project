
<html>
    <body>

        <div>Filter Product</div>
        
        <form action="FilteredProduct.php" method="POST">
                <table border="1">
                    <tr>
                        <td> Status <br>
                            <select name="Product_Status" required="">
                                <option value="NULL"></option>
                                <option value="1">Approve</option>
                                <option value="0">Disapprove</option>
                            </select>
                        </td>
                        <td> Category Name
                            <select name="Category_Id">
                                <option value="NULL">select</option>
                                <?php
                                
                                $query = "SELECT Category_Id, Category_Name FROM product_category";
                                include_once '../../Class/Connection.php';
                                $read = new Connection();
                                $result = $read->executeQuery($query);
                               while ($row = mysqli_fetch_object($result)) {
                                ?>
                               <option value="<?php print($row->Category_Id)?>"><?php print($row->Category_Name); ?></option>

                               <?php
                               }
                               ?>
                            </select>
                            
                        </td>
                        <td>
                            <button type="submit" name="submit" value="Filter category">Filter</button>
                        </td>
                    </tr>
                </table>    
            </form>
        
            <div>Search Product </div>
             <form action="FilteredProduct.php" method="POST">
                <table border="1">
                    <tr>
                        <td>
                            <input type="text" name="Product_Id"/>
                            <button type="submit" name="submit" value="Search_Product">Search</button>
                        </td>
                    </tr>
                </table>    
            </form>
    
        <div>View Products</div><br/>
         
        <table border="1">
                <tr>
                    <td>Product Id</td>
                    <td>Product Name</td>
                    <td>Seller Name</td>  
                    <td>Category</td>
                    <td>Sub-category</td>
                    <td>Date</td>    
                    <td>Product Status</td>  
                    <td colspan="3">Operation</td>                     
                </tr>    
                
                <?php
                $query = "SELECT P.Product_Id, P.Product_Name, P.Product_PostDate, P.Product_Status, S.Seller_Name, C.Category_Name, Sc.Subcategory_Name FROM product P JOIN seller S ON S.Seller_Id = P.Seller_Id JOIN product_subcategory Sc ON Sc.Subcategory_Id = P.Subcategory_Id JOIN product_category C ON C.Category_Id = Sc.Category_Id";
                include_once '../../Class/Connection.php';
                $read = new Connection();
                $result = $read->executeQuery($query);
                while ($row = mysqli_fetch_object($result)) {
                 ?>
                    <tr>
                        <td><?php print($row->Product_Id); ?></td>
                        <td><?php print($row->Product_Name); ?></td>  
                        <td><?php print($row->Seller_Name); ?></td>
                        <td><?php print($row->Category_Name); ?></td>
                        <td><?php print($row->Subcategory_Name); ?></td>
                        <td><?php print($row->Product_PostDate); ?></td>
                        <td>
                            <?php 
                            if($row->Product_Status==1)                          
                                print("Approved"); 
                            else
                                print("Not Approved");
                            ?>
                        </td>
                        <td> 
                            <a href="ViewProduct.php?proid=<?php print($row->Product_Id);?>">View</a>
                        </td>
                        <td>
                            <form action="../../Connector/ProductConnector.php" method="POST">
                                <input type="hidden" name="Product_Id" value="<?php print($row->Product_Id);?>"/>
                                <button type="submit" name="submit" value="Delete_Product">Delete</button>
                            </form>
                            
                        </td>                     
                        <td> 
                           <!--div>product status<div-->
                            <form action="../../Connector/ProductConnector.php" method="POST">
                                <input type="hidden" name="Product_Id" value="<?php print($row->Product_Id);?>"/>
                                <select name="Product_Status">
                                    <option value="">Select Product Status</option>
                                    <option value="1">Approve</option>
                                    <option value="0">Disapprove</option>
                                </select><br/>
                                <button type="submit" name="submit" value="ChangeProduct_status">Change Status</button>
                            </form>
                       </td>         
                    </tr>  
                    <?php
                }
                ?>

            </table>
        
    
    
    
    </body>
</html>



