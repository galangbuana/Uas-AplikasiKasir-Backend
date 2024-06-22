<?php
include_once 'models/SalesModel.php';

class SalesService {
    
    private $conn;
    private $salesModel;

    public function __construct(salesModel $salesmodel)
    {
        $this->salesModel = $salesmodel;
    }

    public function fetchAllSales()
    {
        $stmt = $this->salesModel->readAllSales();
        $sales_array = array();
        $sales_array["records"] = array();
        while ($rows = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($rows);
            $sales_item = array (
                "sales_id" => $sale_id,
                "product_id" => $product_id,
                "member_id" => $member_id,
                "sale_date" => $sale_date,
                "quantity" => $quantity,
                "selling_price" => $selling_price,
                "total_price" => $total_price
            );
            array_push($sales_array["records"], $sales_item);
        }

        return $sales_array;
    }

    public function addSales($data)
    {
        return $this->salesModel->insertSales($data);
    }

    public function deleteSales($product_id)
    {
        return $this->salesModel->deleteSales($product_id);
    }

}