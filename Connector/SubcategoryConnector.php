<?php


include_once '../Class/Subcategory.php';

extract($_POST);
print_r($_POST);

if($_POST['submit']=='Save subcategory'){
    $cat = new Subcategory("NULL", $Category_Id, "NULL", $Subcategory_Name);
    $cat->SaveSubCategory();
    //var_dump($cat);
}

elseif($_POST['submit']=="Update subcategory"){
    $cat = new Subcategory($Subcategory_Id, NULL, NULL, $Subcategory_Name);
    $cat->UpdateSubCategory();
    //var_dump($cat);
}

elseif($_POST['submit']=="Change subcategory"){
    $cat = new Subcategory($Subcategory_Id, $Category_Id, NULL, NULL);
    $cat->ChangeSubCategory_Category();
    //var_dump($cat);
}

