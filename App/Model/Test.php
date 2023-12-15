<?php
namespace App\Model;

class Test{
    private $utilisateurs;

    public function __construct(){
        $this->utilisateurs = [];
    }

    public function getUtilisateurs():array{
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $user){
        $this->utilisateurs[] = $user;
    }
    public function removeUtilisateur(Utilisateur $user)
    {
        $key = array_search($user, $this->utilisateurs, true);

        if ($key === true) {
            unset($this->utilisateurs[$key]);
        }
    }




}