<?php
namespace App\Manager;
interface ManagerInterface{
    public function add();
    public function find(int $id):object;
    public function findAll():array;
    public function update(int $id);
    public function delete(int $id);
}
?>