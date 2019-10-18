
<?php

include_once '../Class/Category.php';

extract($_POST);
print_r($_POST);

if($_POST['submit']=='Save category'){
    $cat = new Category(NULL,NULL,$Category_Name);
    $cat->SaveCategory();
    //var_dump($cat);
}

elseif($_POST['submit']=="Update category"){
    $cat = new Category($Category_Id,NULL,$Category_Name);
    $cat->UpdateCategory();
    //var_dump($cat);
}
elseif($_POST['submit']=="Filter category"){
    $Status=$_POST['Product_Status'];
    $cat = new Category($Category_Id, null, null);
    $cat->Filter_Product($Status);
    //print_r($Status);
    //var_dump($cat);
}