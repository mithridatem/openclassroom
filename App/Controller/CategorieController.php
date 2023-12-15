<?php
namespace App\Controller;
use App\Manager\ManagerCategorie;

class CategorieController extends ManagerCategorie{
    public function addCategorie(){
        header('Access-Control-Allow-Origin: *, Content-Type : application/json');
        $json = file_get_contents("php://input");
        $code = 200;
        $message = "";
        if($json){
            $data = json_decode($json, true);
            $verif  = $this->findBy("nom",$data["nom"]);
            if($verif){
                $code = 400;
                $message = ["error"=>"la Catégorie existe déja"];
            }
            else{
                $this->setNom($data["nom"]);
                $this->create();
                $message = ['ok'=>'La catégorie a été ajoute en BDD' ];
            }
        }
        else{
            $code = 400;
            $message = ["error"=>"le Json est invalide"];
        }
        http_response_code($code);
        echo json_encode($message,JSON_UNESCAPED_UNICODE);
    }
    public function findCategorieById(){
        header('Access-Control-Allow-Origin: *, Content-Type : application/json');
        $code = 200;
        $message = "";
        if(isset($_GET["id"]) AND !empty($_GET["id"])){
            $data = $this->find($_GET["id"]);
            if($data){
                $message = $data;
            }
            else{
                $message = ['error'=>'La catégorie n\'existe pas en BDD'];
                $code = 400;
            }
        }
        else{
            $message = ['error'=>'param id vide'];
            $code = 400;
        }
        http_response_code($code);
        echo json_encode($message, JSON_UNESCAPED_UNICODE);
    }
    public function findAllCategorie(){
        header('Access-Control-Allow-Origin: *, Content-Type : application/json');
        $code = 200;
        $message = "";
        $data = $this->findAll();
        if($data){
            $message = $data;
        }
        else{
            $message = ['error'=>'Il n\'y à pas de catégorie dans la BDD'];
            $code = 400;
        }
        http_response_code($code);
        echo json_encode($message,JSON_UNESCAPED_UNICODE);
    }
    public function updateCategorie(){
        header('Access-Control-Allow-Origin: *, Content-Type : application/json');
        $json = file_get_contents("php://input");
        $code = 200;
        $message = "";
        if($json){
            $data = json_decode($json, true);
            $this->setNom($data["newnom"]);
            $this->updateByName($data["oldnom"]);
            $message = ['ok'=>'La catégorie a modifié en BDD' ];
        }
        else{
            $code = 400;
            $message = ["error"=>"le Json est invalide"];
        }
        http_response_code($code);
        echo json_encode($message,JSON_UNESCAPED_UNICODE);
    }
}