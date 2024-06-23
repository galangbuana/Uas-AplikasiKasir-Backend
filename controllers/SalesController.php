<?php 
include_once 'models/SalesModel.php';
include_once 'services/SalesService.php';

class SalesController
{
    private $salesService;

    public function __construct($conn)
    {
        $salesModel = new SalesModel($conn);
        $this->salesService = new SalesService($salesModel);
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

    public function readSales()
    {
        $sales = $this->salesService->fetchAllSales();
        return json_encode($sales);
    }

    public function addSales()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $requiredFields = ['sales_id', 'product_id', 'member_id', 'sale_date', 'quantity', 'selling_price', 'total_price'];
        $errors = $this->validateFields($data, $requiredFields);

        if (!empty($errors)) {
            return json_encode(array("message" => "Validation errors", "errors" => $errors));
        }

        $result = $this->salesService->addSales($data);
        if ($result)
        {
            return json_encode(array("message"=>"Insert success"));
        }
        else
        {
            return json_encode(array("message"=>"Insert not success"));
        }
    }

    public function deleteSales()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $sales_id = $data['sales_id'];
         $requiredFields = ['sales_id'];
        $errors = $this->validateFields($data, $requiredFields);

        if (!empty($errors)) {
            return json_encode(array("message" => "Validation errors", "errors" => $errors));
        }
        $result = $this->salesService->deleteSales($sales_id);
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