<?php
class SalesModel 
{
    private $conn;
    private $table_name;

    public function __construct($db)
    {
        $this->conn =$db;
        $tables = include('config/table.php');
        $this->table_name = $tables['sales'];
    }

    public function readAllSales() 
    {
        try 
        {
        $query = "SELECT * FROM " . $this->table_name;
        // $query = "SELECT * FROM penjualan";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        }
        catch (PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }

        return $stmt;
    }

    public function insertSales($data)
    {
        try {
            $query = "INSERT INTO " . $this->table_name . " (sales_id, product_id, member_id, sale_date, quantity, selling_price, total_price) VALUES (?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $data['sales_id']);
            $stmt->bindParam(2, $data['product_id']);
            $stmt->bindParam(3, $data['member_id']);
            $stmt->bindParam(4, $data['sale_date']);
            $stmt->bindParam(5, $data['quantity']);
            $stmt->bindParam(6, $data['selling_price']);
            $stmt->bindParam(7, $data['total_price']);
            $stmt->execute();
            return $stmt->rowCount();
        } 
        catch (PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteSales($sales_id)
    {
        try {
            $query = "DELETE FROM " . $this->table_name . " WHERE sales_id = ?";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $sales_id);
            $stmt->execute();
            return $stmt->rowCount();
        } 
        catch (PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
    }
}