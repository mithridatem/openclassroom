<?php
namespace App\Manager;
use App\Manager\ManagerInterface;
use App\Model\Roles;

class ManagerRoles implements ManagerInterface{
    public function add(){}
    public function find(int $id):Roles{
        return new Roles();
    }
    public function findAll():array{
        return [];
    }
    public function update(int $id):void{}
    public function delete(int $id):void{}
}