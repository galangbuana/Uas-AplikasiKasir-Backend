<?php
include_once 'models/MembersModel.php';

class MembersService {
    
    private $conn;
    private $membersModel;

    public function __construct(MembersModel $membersmodel)
    {
        $this->membersModel = $membersmodel;
    }

    public function fetchAllMembers()
    {
        // $users = new MembersModel($this->conn);
        // $stmt = $users->readAllUsers();
        $stmt = $this->membersModel->readAllMembers();
        $members_array = array();
        $members_array["records"] = array();
        while ($rows = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($rows);
            $member_item = array (
                "member_id" => $member_id,
                "member_name" => $member_name,
                "phone_number" => $phone_number,
                "email" => $email,
                "join_date" => $join_date
            );
            array_push($members_array["records"], $member_item);
        }

        return $members_array;
    }

    public function addMembers($data)
    {
        return $this->membersModel->insertMembers($data);
    }

      public function updateMembers($data)
    {
        return $this->membersModel->updateMembers($data);
    }

    public function deleteMembers($member_id)
    {
        return $this->membersModel->deleteMembers($member_id);
    }

}