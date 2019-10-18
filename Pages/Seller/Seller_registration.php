<?php
    $page_title = "Registration";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/PhpGroupProject_marketplace_final/Pages/partials/header.partials.php";
?>    
        <div style="margin-top: 100px;" class="container jumbotron">
            <h1 style="text-align: center; color: lightblue;" >Create an account</h1>
            <form action="../../Connector/SellerConnector.php" method="POST">
                <div class="form-group">
                    <div class="form-group col-lg-4">
                        <label for="fullname">Full Name</label>
                        <input class="form-control" type="text" name="Seller_Name" placeholder="please enter your full name" required>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="email">User Email</label>
                        <input class="form-control" type="email" name="User_Email" placeholder="please enter your user email" required>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="User_Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group col-lg-4">
                        <label for="contactemail">Seller contact Email</label>
                        <input class="form-control" type="email" name="Seller_Email" required>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="contactphone">Seller contact Phone</label>
                        <input class="form-control" type="tel" name="Seller_Phone" required>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="alternatephone">Alternate Phone</label>
                        <input class="form-control" type="tel" name="Seller_Alternate_Phone">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group col-lg-4">
                        <label for="region">Region</label>
                        <input class="form-control" type="text" name="Region" required>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="city">City</label>
                        <input class="form-control" type="text" name="City" required>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="Sub_City">Sub-City</label>
                        <input class="form-control" type="text" name="Sub_City">
                    </div>
                </div>
                
                <div>
                    <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Save Seller">    
                </div>
            </form>
        </div>
        
  <?php
      include_once $_SERVER['DOCUMENT_ROOT'] . "/PhpGroupProject_marketplace_final/Pages/partials/footer.partials.php";
  ?>

