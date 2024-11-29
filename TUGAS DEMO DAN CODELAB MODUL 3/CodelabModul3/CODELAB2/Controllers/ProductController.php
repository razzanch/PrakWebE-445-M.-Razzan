<?php

namespace Controllers;

include "Traits\ResponseFormatter.php";
include "Controllers\Controller.php";

use Traits\ResponseFormatter;

class ProductController extends Controller {
    use ResponseFormatter;

    public function __construct() {
        $this->controllerName = "Get All Product";
        $this->controllerMethod = "GET";
    }

    public function getAllProduct(){
        // Array Dummy Data
        $dummyData = [
            "Air Mineral",
            "Kebab",
            "Spaghetti",
            "Jus Jambu"
        ];

        $response = [
            "controller_attribute" => $this->getControllerAttribute(),
            "product" => $dummyData
        ];

        return $this->ResponseFormatter(200, "Success", $response);
    }
};