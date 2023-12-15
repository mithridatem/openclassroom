<?php
namespace App\Manager;
use App\Manager\ManagerInterface;
use App\Model\Categorie;

class ManagerCategorie extends Categorie implements ManagerInterface{
    public function create(){
        $nom = $this->getNom();
        try {
            $req = $this->connexion()->prepare('INSERT INTO categorie(nom)VALUE(?)');
            $req->bindParam(1,$nom,\PDO::PARAM_STR);
            $req->execute();
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
    public function find(int $id):array{
        try {
            $req = $this->connexion()->prepare('SELECT id,nom FROM categorie WHERE id = ?');
            $req->bindParam(1,$id,\PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(\PDO::FETCH_OBJ);
        } 
        catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function findBy(string $param, string $value):array{
        try {
            $req = $this->connexion()->prepare('SELECT id FROM categorie WHERE '.$param.'=?');
            $req->bindParam(1,$value,\PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        } catch (\Throwable $th) {
            die("error : ".$th->getMessage());
        }
    }
    public function findAll():array{
        try {
            $req = $this->connexion()->prepare('SELECT id,nom FROM categorie');
            $req->execute();
            return $req->fetchAll(\PDO::FETCH_ASSOC);
        } 
        catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
    public function update(int $id){
    }
    public function updateByName(string $value){
        $nom = $this->getNom();
        try {
            $req = $this->connexion()->prepare('UPDATE categorie SET nom = ? WHERE nom = ?');
            $req->bindParam(1,$nom,\PDO::PARAM_STR);
            $req->bindParam(2,$value,\PDO::PARAM_STR);
            $req->execute();
        } 
        catch (\Throwable $th) {
            die($th->getCode());
        }
    }
    public function delete(int $id){}
}