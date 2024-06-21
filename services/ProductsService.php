<?php
include_once 'models/ProductsModel.php';

class ProductsService {
    
    private $conn;
    private $productsModel;

    public function __construct(ProductsModel $productsmodel)
    {
        $this->productsModel = $productsmodel;
    }

    public function fetchAllProducts()
    {
        $stmt = $this->productsModel->readAllProducts();
        $products_array = array();
        $products_array["records"] = array();
        while ($rows = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($rows);
            $products_item = array (
                "product_id" => $product_id,
                "product_name" => $product_name,
                "price" => $price,
                "stock" => $stock
            );
            array_push($products_array["records"], $products_item);
        }

        return $products_array;
    }

    public function addProducts($data)
    {
        return $this->productsModel->insertProducts($data);
    }

    public function updateProducts($data)
    {
        return $this->productsModel->updateProducts($data);
    }

    public function deleteProducts($product_id)
    {
        return $this->productsModel->deleteProducts($product_id);
    }

}