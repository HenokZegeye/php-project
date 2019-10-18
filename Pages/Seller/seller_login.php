<?php
    $page_title = "Login";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/PhpGroupProject_marketplace_final/Pages/partials/header.partials.php";
?>
        <div style="margin-top: 100px;" class="container jumbotron">
            <h1 style="text-align: center" >Sign in</h1>
            <form method="POST" action="../../Connector/loginconnector.php">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" placeholder="please enter your user email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" placeholder="please enter your password" name="password" required>
                </div>
                <div>
                    <input type="submit" class="btn btn-primary btn-lg" value="Sign In" name="submit">    
                </div>
                <div>
                    <a href="#" style="text-transform: uppercase; padding-left: 45%;">forgot password</a>
                    <a href="Seller_registration.php" class="btn btn-success" style="margin-left: 45%">Create an account</a>
                </div>
            </form>
        </div>
  <?php
      include_once $_SERVER['DOCUMENT_ROOT'] . "/PhpGroupProject_marketplace_final/Pages/partials/footer.partials.php";
  ?>