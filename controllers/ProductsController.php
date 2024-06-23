<?php 
include_once 'models/ProductsModel.php';
include_once 'services/ProductsService.php';

class ProductsController
{
    private $productsService;

    public function __construct($conn)
    {
        $productsModel = new ProductsModel($conn);
        $this->productsService = new ProductsService($productsModel);
    }

    private function validateFields($data, $requiredFields)
    {
        $errors = [];
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                $errors[] = ucfirst(str_replace('_', ' ', $field)) . " is required";
            }
        }
        return $errors;
    }

    public function readProducts()
    {
        $products = $this->productsService->fetchAllProducts();
        return json_encode($products);
    }

    public function addProducts()
    {
        $data = json_decode(file_get_contents("php://input"), true);
       $requiredFields = ['product_id', 'product_name', 'price', 'stock'];
        $errors = $this->validateFields($data, $requiredFields);

        if (!empty($errors)) {
            return json_encode(array("message" => "Validation errors", "errors" => $errors));
        }

        $result = $this->productsService->addProducts($data);
        if ($result)
        {
            return json_encode(array("message"=>"Insert success"));
        }
        else
        {
            return json_encode(array("message"=>"Insert not success"));
        }
    }

    public function updateProducts()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $requiredFields = ['product_id', 'product_name', 'price', 'stock'];
        $errors = $this->validateFields($data, $requiredFields);

        if (!empty($errors)) {
            return json_encode(array("message" => "Validation errors", "errors" => $errors));
        }

        $result = $this->productsService->updateProducts($data);
        if ($result)
        {
            return json_encode(array("message"=>"Update success"));
        }
        else
        {
            return json_encode(array("message"=>"Update not success"));
        }
    }

    public function deleteProducts()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $product_id = $data['product_id'];
        $requiredFields = ['product_id'];
        $errors = $this->validateFields($data, $requiredFields);

        if (!empty($errors)) {
            return json_encode(array("message" => "Validation errors", "errors" => $errors));
        }

        $result = $this->productsService->deleteProducts($product_id);
        if ($result)
        {
            return json_encode(array("message"=>"Delete success"));
        }
        else
        {
            return json_encode(array("message"=>"Delete not success"));
        }
    }
}