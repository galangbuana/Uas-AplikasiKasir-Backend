<?php 
include_once 'models/MembersModel.php';
include_once 'services/MembersService.php';

class MembersController
{
    private $membersService;

    public function __construct($conn)
    {
        $membersModel = new MembersModel($conn);
        $this->membersService = new MembersService($membersModel);
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

    public function readMembers()
    {
        $members = $this->membersService->fetchAllMembers();
        return json_encode($members);
    }

    public function addMembers()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $requiredFields = ['member_id', 'member_name', 'phone_number', 'email', 'join_date'];
        $errors = $this->validateFields($data, $requiredFields);

        if (!empty($errors)) {
            return json_encode(array("message" => "Validation errors", "errors" => $errors));
        }

        $result = $this->membersService->addMembers($data);
        if ($result)
        {
            return json_encode(array("message"=>"Insert success"));
        }
        else
        {
            return json_encode(array("message"=>"Insert not success"));
        }
    }

    public function updateMembers()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $requiredFields = ['member_id', 'member_name', 'phone_number', 'email', 'join_date'];
        $errors = $this->validateFields($data, $requiredFields);

        if (!empty($errors)) {
            return json_encode(array("message" => "Validation errors", "errors" => $errors));
        }

        $result = $this->membersService->updateMembers($data);
        if ($result)
        {
            return json_encode(array("message"=>"Update success"));
        }
        else
        {
            return json_encode(array("message"=>"Update not success"));
        }
    }

    public function deleteMembers()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $member_id = $data['member_id'];
        $requiredFields = ['member_id'];
        $errors = $this->validateFields($data, $requiredFields);

        if (!empty($errors)) {
            return json_encode(array("message" => "Validation errors", "errors" => $errors));
        }
        $result = $this->membersService->deleteMembers($member_id);
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
