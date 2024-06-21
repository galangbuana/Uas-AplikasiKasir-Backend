<?php
class MembersModel 
{
    private $conn;
    private $table_name;

    public function __construct($db)
    {
        $this->conn =$db;
        $tables = include('config/table.php');
        $this->table_name = $tables['members'];
    }

    public function readAllMembers() 
    {
        try 
        {
        $query = "SELECT * FROM " . $this->table_name;
        // $query = "SELECT * FROM users";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        }
        catch (PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }

        return $stmt;
    }

    public function insertMembers($data)
    {
        try {
            $query = "INSERT INTO " . $this->table_name . " (member_id, member_name, phone_number, email, join_date) VALUES (?, ?, ?, ?, ?)";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $data['member_id']);
            $stmt->bindParam(2, $data['member_name']);
            $stmt->bindParam(3, $data['phone_number']);
            $stmt->bindParam(4, $data['email']);
            $stmt->bindParam(5, $data['join_date']);
            $stmt->execute();
            return $stmt->rowCount();
        } 
        catch (PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateMembers($data)
    {
        try {
            $query = "UPDATE " . $this->table_name . " SET member_name = ?, phone_number = ?, email = ?, join_date = ? WHERE member_id = ?";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $data['member_name']);
            $stmt->bindParam(2, $data['phone_number']);
            $stmt->bindParam(3, $data['email']);
            $stmt->bindParam(4, $data['join_date']);
            $stmt->bindParam(5, $data['member_id']);
            $stmt->execute();
            return $stmt->rowCount();
        } 
        catch (PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteMembers($member_id)
    {
        try {
            $query = "DELETE FROM " . $this->table_name . " WHERE member_id = ?";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $member_id);
            $stmt->execute();
            return $stmt->rowCount();
        } 
        catch (PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
    }
}