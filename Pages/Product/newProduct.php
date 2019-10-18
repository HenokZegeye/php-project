<?php
    $page_title = "new product";
    $base_url = "http://localhost/PhpGroupProject_marketplace_final/";

    include_once $_SERVER['DOCUMENT_ROOT'] . "/PhpGroupProject_marketplace_final/Pages/partials/header.partials.php";
    
    if($_SESSION['validated']==NULL){
        $path = $base_url.'Pages/Seller/seller_login.php';
        header("Location: $path");
    }
?>
        <style>
            img{
        margin-right: 5px;
        padding:10px;
        float: left;
        width: 180px;
        margin-bottom: 10px;
        }
            #submitbtn{
                width:30%;
                margin-top:10%;
                margin-left:1%;
            }
        </style>

        <div style="margin-top: 100px;" class="container jumbotron">
            <h1 style="text-align: center;" >Add new Product</h1>
            <form action="../../Connector/ProductConnector.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-group col-lg-5">
                        <label for="productname">Product Name</label>
                        <input class="form-control" type="text" name="Product_Name" placeholder="please enter your product name" required>
                    </div>
                    <div class="form-group col-lg-2">

                    </div>
                    <div class="form-group col-lg-5">
                        <label for="productprice">Product Price</label>
                        <input class="form-control" type="number" name="Product_Price" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group col-lg-12">
                        <label for="productdescription">Product Description</label>
                        <textarea class="form-control" rows="5" name="Product_Description"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group col-lg-12">
                        <label for="productimages">Images</label>
                        <input class="form-control" type="file" id="upload_file" onchange="preview_image();" name="upload_product_image[]" required multiple>
                    </div>
                    <div id="image_preview"></div>
                </div>
                <div id="submitbtn">
                    <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Add Product">    
                </div>
            </form>
        </div>

        <script>
            function preview_image() 
            {
                var total_file=document.getElementById("upload_file").files.length;
                for(var i=0;i<total_file;i++)
                {
                    $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' width='200px' height='200px'  ><br>");
                }
            }
        </script>
<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/PhpGroupProject_marketplace_final/Pages/partials/footer.partials.php";
?>