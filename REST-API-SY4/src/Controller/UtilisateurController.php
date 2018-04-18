<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 13/04/2018
 * Time: 17:00
 */

namespace App\Controller;


use App\Entity\Utilisateur;
use PDO;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UtilisateurController extends Controller
{
    public function list(Request $request){
//        $db = new PDO('mysql:host=54.37.71.133:3306;dbname=expense_gr;charset=utf8', 'expense_gr', '123456');
        $db = new PDO('mysql:host=localhost;dbname=expense_gr;charset=utf8', 'root', '');
        $sql = "SELECT * FROM Utilisateur";
        $return = $db->query($sql);
        $result = $return->fetchAll();
        $users = [];
        foreach($result as $value){
            $myObj = new Utilisateur($value);
            $users[] = $myObj;
        }
        $myJSON = json_encode($users);
        return new Response($myJSON);
    }
    public function login(Request $request, $mail, $mdp){
        //        $db = new PDO('mysql:host=54.37.71.133:3306;dbname=expense_gr;charset=utf8', 'expense_gr', '123456');
        $db = new PDO('mysql:host=localhost;dbname=expense_gr;charset=utf8', 'root', '');
        $sql = "SELECT * FROM Utilisateur WHERE Mail_Utilisateur = :login AND Mdp_Utilisateur = :password";
        $req = $db->prepare($sql);
        $values = [
            'login' => $mail,
            'password' => $mdp
        ];
        $req->execute($values);
        $result = $req->fetch();
        var_dump($result);
        $myObj = new Utilisateur($result);
        $myJSON = json_encode($myObj);
        return new Response($myJSON);
    }
}