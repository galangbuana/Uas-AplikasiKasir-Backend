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

    public function readMembers()
    {
        $members = $this->membersService->fetchAllMembers();
        return json_encode($members);
    }

    public function addMembers()
    {
        $data = json_decode(file_get_contents("php://input"), true);
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
