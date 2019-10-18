<?php
    $page_title = 'Index';
    $base_url = "http://localhost/PhpGroupProject_marketplace_final/";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/PhpGroupProject_marketplace_final/Pages/partials/header.partials.php";
    include_once 'Class/Connection.php';
?>
<style>
    .box{
        width:30%;
        float: left;
        margin-left: 1%;
    }
    .price{
        font-size: 20px;
        height: 20px;
        overflow:hidden;
        color: #000;
        float: left;
        font-weight: bold;
        margin-right: 1px;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .intro {
    background: url(style/shopping-cart.jpg) no-repeat center top;
    background-attachment: fixed;
	background-position: center;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	background-size: cover;
	-o-background-size: cover;
}
</style>

        <header id="header">
                <div class="intro">
                  <div class="container">
                    <div class="row">
                      <div class="intro-text">
                        <h1 style="padding-top: 350px;">Online Market Place</h1>
                        <p style="font-weight: bold">Buyer and Seller always meet in here</p>
                      </div>
                    </div>
                  </div>
                </div>
        </header>

<div class="container" style="padding-top:100px;">
    <div>
            <h4>Latest Listing</h4>
             <?php

                    $query = "SELECT * FROM Product, Product_Image WHERE Product.Product_Id=Product_Image.Product_Id;";
                    
                    $read = new Connection();
                    $result = $read->executeQuery($query);
                    $holder = array();
                    while ($row = mysqli_fetch_object($result)) {
                        if (in_array($row->Product_Id,$holder)) {
                            $im = $row->Image_path;
                            continue;
                        }
                        array_push($holder,$row->Product_Id);
                    ?>
                    <div class=" box">
                        <div>
                                <h3><?php print($row->Product_Name); ?></h3>
                        </div>
                        <div>
                                <?php 
                                    echo "<img id='photo' src='uploads/".$row->Image_path."' width='180px' height='180px'>";
                                ?>
                        </div>
                        <div class="price">
                            ETB:<?php print($row->Product_Price); ?>
                        </div>
                        <div style="width:35%; margin-top:5px;">
                                <?php if($_SESSION['validated']==NULL){
                                    $path = $base_url.'Pages/Seller/seller_login.php';
                                }else{
                                    $path = $base_url.'Pages/Product/showProduct.php';
                                }?>
                                <p><a href="<?php echo $path?>?id=<?php echo $row->Product_Id ?>&product_name=<?php echo $row->Product_Name ?>&product_price=<?php echo $row->Product_Price ?>" class="btn btn-primary">More Info</a></p>
                        </div>
                        
                    </div>
                    
                    <?php
                }
                
                
            ?>
    </div>
</div>

<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/marketplace_final/Pages/partials/footer.partials.php";
?>  
   