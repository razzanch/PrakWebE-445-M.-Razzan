<?php

include "Controllers\ProductController.php";

use Controllers\ProductController;

$productController = new ProductController;

echo $productController -> getAllProduct();