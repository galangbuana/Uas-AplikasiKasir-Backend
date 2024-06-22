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

    public function readSales()
    {
        $sales = $this->salesService->fetchAllSales();
        return json_encode($sales);
    }

    public function addSales()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $this->salesService->addSales($data);
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

    public function deleteSales()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $sales_id = $data['sales_id'];
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