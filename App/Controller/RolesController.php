<?php
namespace App\Controller;
use App\Manager\ManagerRoles;
class RolesController extends ManagerRoles{
    public function addRoles(){
        header('Access-Control-Allow-Origin: *, Content-Type : application/json');
        $json = file_get_contents("php://input");
        $code = 200;
        $message = "";
        if($json){
            $data = json_decode($json);
            $this->setNom($data["nom"]);
            $this->create();
            $message = ["ok"=>"le role a été ajouté en BDD"];
        }
        else{
            $code = 400;
            $message = ["error"=>"le Json est invalide"];
        }
        http_response_code($code);
        echo json_encode($message);
    }
}
?>