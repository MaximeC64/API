<?php
/**
 * Created by PhpStorm.
 * User: txomi
 * Date: 16/04/2018
 * Time: 14:22
 */

namespace App\Entity\Manager;
use App\Entity\Utilisateur;
use PDO;

class UtilisateurManager
{
    private $db;
    public function __construct($mode = 'prod') {
        if($mode == 'dev'){ // permet de choisir si l'on veut inclure ou pas la gestion des erreurs
            $this->db = new PDO('mysql:host=localhost;dbname=expense_gr;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//        $this->db = new PDO('mysql:host=54.37.71.133:3306;dbname=expense_gr;charset=utf8', 'expense_gr', '123456', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } else {
            $this->db = new PDO('mysql:host=localhost;dbname=expense_gr;charset=utf8', 'root', '');
//        $this->db = new PDO('mysql:host=54.37.71.133:3306;dbname=expense_gr;charset=utf8', 'expense_gr', '123456');
        }
    }

    public function login($mail, $mdp){
        $sql = "SELECT * FROM Utilisateur WHERE Mail_Utilisateur = :mail AND Mdp_Utilisateur = :mdp";
        $req = $this->db->prepare($sql);
        $values = ['mail' => $mail,'mdp' => $mdp];
        $req->execute($values);
        $result = $req->fetch();
        $myObj = new Utilisateur($result);
        return json_encode($myObj);
    }

    public function listUtilisateur(){
        $listUtilisateur = [];
        $sql = 'SELECT * FROM Utilisateur';
        $return = $this->db->query($sql);
        while ($ligne = $return->fetch()){
            $utilisateur = new Utilisateur($ligne);
            $listUtilisateur[] = $utilisateur;
        }
        return json_encode($listUtilisateur);
    }
}