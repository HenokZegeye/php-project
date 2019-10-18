

<html>
    <!--
    Add category
    Rename category
    Category Page *** this page
    -->
    <body>
        
        <div>Add category</div>
        <form action="../../Connector/CategoryConnector.php" method="POST">
            <table border="1">
                <tr>
                    <td>
                        <label> Category Name: </label>
                        <input type="text" name="Category_Name" required/>
                        <button type="submit" name="submit" value="Save category">Add Category </button>
                    </td>
                </tr>
            </table>
        </form>
        
        Category List
        <br/>
    
        <div>View Category </div><br/>
         
        <table border="1">
                <tr>
                    <td>Category Id</td>
                    <td>Category Name</td>
                    <td>Number of SubCategories</td>
                    <td>Total Products</td> 
                    <td colspan="2">Action</td> 
                </tr>    
                
                <?php
                /*$query ="SELECT product_category.Category_Id, product_category.Category_Name, COUNT(product.Subcategory_Id) AS prod_num"
                        ." FROM product_subcategory JOIN product_category ON product_category.Category_Id = product_subcategory.Category_Id"
                        ." JOIN product ON product.Subcategory_Id = product_subcategory.Subcategory_Id GROUP BY 1";
                 * */
                 $query1="SELECT Category_Id, Category_Name FROM product_category";
                include_once '../../Class/Connection.php';
                $read = new Connection();
                $result = $read->executeQuery($query1);
                while ($row = mysqli_fetch_object($result)) {
                 ?>
                    <tr>
                        <td><?php print($row->Category_Id); ?></td>
                        <td><?php print($row->Category_Name); ?></td>  
                        
                        <td>
                            <?php 
                             $query2="SELECT pc.Category_Id, pc.Category_Name, COUNT(*) AS Num_of_SubCat" 
                                      ." FROM product_subcategory psc, product_category pc WHERE psc.Category_Id=pc.Category_Id AND pc.Category_Id=".($row->Category_Id);
                              
                              //print_r($query2);
                             $subNum= mysqli_fetch_object($read->executeQuery($query2));
                             print($subNum->Num_of_SubCat);
                             
                            ?>
                        </td>
                        <td>
                            <?php 
                             $query3="SELECT COUNT(*) AS Num_of_Prod FROM product_subcategory psc, product_category pc, product p"
                                     ." WHERE p.Subcategory_Id=psc.Subcategory_Id AND psc.Category_Id=pc.Category_Id AND pc.Category_Id=".($row->Category_Id);
                              
                             //print_r($query3);
                             $proNum= mysqli_fetch_object($read->executeQuery($query3));
                             print($proNum->Num_of_Prod);
                             
                            ?>
                        </td>
                        
                       
                        <!-- Rename Category -->
                        <td>
                            <form action="../../Connector/CategoryConnector.php" method="POST">
                                    
                                <input type="hidden" name="Category_Id" value="<?php print($row->Category_Id);?>"/>
                                <label> Edit Category Name: </label>
                                <input type="text" name="Category_Name" required /><br/>
                                <button type="submit" name="submit" value="Update category">Rename category</button>
                                    
                            </form>
                        </td>   
                        <!-- Add Subcategory -->
                        <td> 
                           <form action="../../Connector/SubcategoryConnector.php" method="POST">
                        
                                <input type="hidden" name="Category_Id" value="<?php print($row->Category_Id);?>"/>
                                <label> Subcategory Name: </label>
                                <input type="text" name="Subcategory_Name" required/><br/>
                                <button type="submit" name="submit" value="Save subcategory">Add Subcategory </button>
                                
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





