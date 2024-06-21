<?php
class ProductsModel 
{
    private $conn;
    private $table_name;

    public function __construct($db)
    {
        $this->conn =$db;
        $tables = include('config/table.php');
        $this->table_name = $tables['products'];
    }

    public function readAllProducts() 
    {
        try 
        {
        $query = "SELECT * FROM " . $this->table_name;
        // $query = "SELECT * FROM produk";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        }
        catch (PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }

        return $stmt;
    }

    public function insertProducts($data)
    {
        try {
            $query = "INSERT INTO " . $this->table_name . " (product_id, product_name, price, stock) VALUES (?, ?, ?, ?)";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $data['product_id']);
            $stmt->bindParam(2, $data['product_name']);
            $stmt->bindParam(3, $data['price']);
            $stmt->bindParam(4, $data['stock']);
            $stmt->execute();
            return $stmt->rowCount();
        } 
        catch (PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateProducts($data)
    {
        try {
            $query = "UPDATE " . $this->table_name . " SET product_name = ?, price = ?, stock = ? WHERE product_id = ?";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $data['product_name']);
            $stmt->bindParam(2, $data['price']);
            $stmt->bindParam(3, $data['stock']);
            $stmt->bindParam(4, $data['product_id']);
            $stmt->execute();
            return $stmt->rowCount();
        } 
        catch (PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteProducts($product_id)
    {
        try {
            $query = "DELETE FROM " . $this->table_name . " WHERE product_id = ?";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $product_id);
            $stmt->execute();
            return $stmt->rowCount();
        } 
        catch (PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
    }

}