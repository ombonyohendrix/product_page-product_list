<?php
include 'vendor/autoload.php';

if (isset($_POST['check_save_btn'])){
    $sku = $_POST['sku_id'];
    $sku_query = "SELECT * FROM products WHERE sku= '$SKU' ";
    $sku_query_run = mysqli_query($connect, $sku_query);
    if(mysqli_num_rows($sku_query_run) > 0){
        echo  "SKU already exists";
}
else{
       echo "SKU already exists";
}
}
if (isset($_POST['submit'])) {
    $typeClass = $_POST['product-type'];
    $className = "\App\Classes\\" . $typeClass;
    $product = new $className();
    try {
        $product->insertProduct($_POST);
        header("Location:index.php");
        die();
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
} else {
    echo "Error: Not submitted";
}