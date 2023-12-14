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
            $data = json_decode($json, true);
            $this->setNom($data["nom"]);
            $this->create();
            $message = ['ok'=>'Le Role a ete ajoute en BDD' ];
        }
        else{
            $code = 400;
            $message = ["error"=>"le Json est invalide"];
        }
        http_response_code($code);
        echo mb_convert_encoding(json_encode($message), "UTF-8", "UTF-8");
    }
}
?>