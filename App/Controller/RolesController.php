<?php
namespace App\Controller;
use App\Manager\ManagerRoles;
class RolesController extends ManagerRoles{
    public function addRoles(){
        header('Access-Control-Allow-Origin: *, Content-Type : application/json');
        $json = file_get_contents("php://input");
        if($json){
            $data = json_decode($json);
            $this->setNom($data["nom"]);
            var_dump($this);
            $this->create();

        }
        
    }
}
?>