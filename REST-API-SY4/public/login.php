<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 16/04/2018
 * Time: 15:34
 */
require_once('../src/Entity/Utilisateur.php');
use App\Entity\Utilisateur;



if (isset($_POST)&&!empty($_POST)){
//        $db = new PDO('mysql:host=54.37.71.133:3306;dbname=expense_gr;charset=utf8', 'expense_gr', '123456');
    $db = new PDO('mysql:host=localhost;dbname=expense_gr;charset=utf8', 'root', '');
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $sql = "SELECT * FROM Utilisateur WHERE Mail_Utilisateur = :mail AND Mdp_Utilisateur = :mdp";
    $req = $db->prepare($sql);
    $values = [
        'mail' => $mail,
        'mdp' => $mdp
    ];
    $req->execute($values);
    $result = $req->fetch();
    $myObj = new Utilisateur($result);
    $myJSON = json_encode($myObj);
}
echo $myJSON;