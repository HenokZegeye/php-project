

<html>
    <!--
    Rename Sub-category
    Category Page *** this page
    -->
    <body>
                
        <form action="FilteredSubCategory.php" method="POST">
                <table border="1">
                    <tr>
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
        
        <div>View SubCategory </div><br/>
         
        <table border="1">
                <tr>
                    <td>Subcategory Id</td>
                    <td>Subcategory Name</td>
                    <td>Category Name </td>
                    <td>Total Products</td> 
                    <td colspan="2">Action</td> 
                </tr>    
                
                <?php
                 $query1="SELECT Subcategory_Id, Subcategory_Name FROM product_subcategory";
                include_once '../../Class/Connection.php';
                $read = new Connection();
                $result = $read->executeQuery($query1);
                while ($row = mysqli_fetch_object($result)) {
                 ?>
                    <tr>
                        <td><?php print($row->Subcategory_Id); ?></td>
                        <td><?php print($row->Subcategory_Name); ?></td>  
                        
                        <td>
                            <?php 
                             $query2="SELECT Category_Name FROM product_category pc, product_subcategory psc WHERE pc.Category_Id=psc.Category_Id AND psc.Subcategory_Id=".($row->Subcategory_Id);
                              
                             //print_r($query2);
                             $subNum= mysqli_fetch_object($read->executeQuery($query2));
                             print($subNum->Category_Name);
                             
                            ?>
                        </td>
                        <td>
                            <?php
                             $query3="SELECT COUNT(*) AS prod_num FROM product p, product_subcategory psc WHERE p.Subcategory_Id=psc.Subcategory_Id AND psc.Subcategory_Id=".($row->Subcategory_Id);
                              
                             //print_r($query3);
                             $proNum= mysqli_fetch_object($read->executeQuery($query3));
                             print($proNum->prod_num);
                             
                            ?>
                        </td>
                        <td>
                            <!-- Rename Subcategory -->
                            <div></div>
                             <form action="../../Connector/SubcategoryConnector.php" method="POST">
                               
                                <input type="hidden" name="Subcategory_Id" value="<?php print($row->Subcategory_Id);?>"/>
                                <label> Edit Subcategory Name: </label>
                                <input type="text" name="Subcategory_Name" required /><br/>
                                <button type="submit" name="submit" value="Update subcategory">Rename Subcategory </button>
                                      
                            </form>                            
                         
                        </td>
                        
                        <td>
                            <!-- Change Category of Subcategory -->
                            <form action="../../Connector/SubcategoryConnector.php" method="POST">
                                
                                <input type="hidden" name="Subcategory_Id" value="<?php print($row->Subcategory_Id);?>"/>
                                <label> To New Category Id: </label>
                                <input type="text" name="Category_Id" required /><br/>
                                <button type="submit" name="submit" value="Change subcategory"> Change Subcategory </button>
                                            
                            </form>    
                            
                        </td>
                                              
                    </tr>  
                    <?php
                }
                ?>

            </table>
        </form>
        
    </body>
</html>

