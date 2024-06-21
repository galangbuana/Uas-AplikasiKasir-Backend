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

    public function readProducts()
    {
        $products = $this->productsService->fetchAllProducts();
        return json_encode($products);
    }

    public function addProducts()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $this->productsService->addProducts($data);
        if ($result)
        {
            return json_encode(array("message"=>"Insert success"));
        }
        else
        {
            return json_encode(array("message"=>"Insert not success"));
        }
        // return json_encode(["message"=>$result]);
    }

    public function updateProducts()
    {
        $data = json_decode(file_get_contents("php://input"), true);
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