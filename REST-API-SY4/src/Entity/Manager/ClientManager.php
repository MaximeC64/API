<?php

namespace App\Entity\Manager;
use App\Entity\Client;
use PDO;

/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 06/04/2018
 * Time: 11:57
 */
class ClientManager
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
    public function listClient(){
        $listClient = [];
        $sql = 'SELECT * FROM Client';
        $return = $this->db->query($sql);
        while ($ligne = $return->fetch()){
            $client = new Client($ligne);
            $listClient[] = $client;
        }
        var_dump($listClient);
        return json_encode($listClient);
    }
//    public function readOneClient($nomClient){
//        $sql = 'SELECT * FROM Client WHERE Client.Nom_Client = :nom';
//        $req = $this->db->prepare($sql);
//        $req->bindValue(':nom', $nomClient, PDO::PARAM_STR);
//        $req->execute();
//        $result = $req->fetch();
//        $newClient = new Client($result);
//        return json_encode($newClient);
//    }
    public function addClient(Client $client){
        $sql = 'INSERT INTO Client (Titre_Client, Nom_Client, Prenom_Client, Adresse_Client, Cp_Client, Ville_Client, Telephone_Client, Mail_Client, Rs_Client) VALUES (:titre, :nom, :prenom, :adresse, :cp, :ville, :tel, :mail, :rs)';
        $req = $this->db->prepare($sql);
        $req->bindValue(':titre', $client->getTitre_Client(), PDO::PARAM_STR);
        $req->bindValue(':nom', $client->getNom_Client(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $client->getPrenom_Client(), PDO::PARAM_STR);
        $req->bindValue(':adresse', $client->getAdresse_Client(), PDO::PARAM_STR);
        $req->bindValue(':cp', $client->getCp_Client(), PDO::PARAM_STR);
        $req->bindValue(':ville', $client->getVille_Client(), PDO::PARAM_STR);
        $req->bindValue(':tel', $client->getTelephone_Client(), PDO::PARAM_STR);
        $req->bindValue(':mail', $client->getMail_Client(), PDO::PARAM_STR);
        $req->bindValue(':rs', $client->getRs_Client(), PDO::PARAM_STR);
        $res = $req->execute();
        return json_encode($res);
    }
//    public function update(Client $client){
//        $sql = 'UPDATE Client SET Titre_Client = :titre, Nom_Client = :nom, Prenom_Client = :prenom, Adresse_Client = :adresse,Cp_Client = :cp, Ville_Client = :ville, Telephone_Client = :tel, Mail_Client = :mail, Rs_Client =:rs WHERE Id_Client = :id';
//        $req = $this->db->prepare($sql);
//        $req->bindValue(':titre', $client->getTitre_Client(), PDO::PARAM_STR);
//        $req->bindValue(':nom', $client->getNom_Client(), PDO::PARAM_STR);
//        $req->bindValue(':prenom', $client->getPrenom_Client(), PDO::PARAM_STR);
//        $req->bindValue(':adresse', $client->getAdresse_Client(), PDO::PARAM_STR);
//        $req->bindValue(':cp', $client->getAdresse_Client(), PDO::PARAM_STR);
//        $req->bindValue(':ville', $client->getVille_Client(), PDO::PARAM_STR);
//        $req->bindValue(':tel', $client->getTelephone_Client(), PDO::PARAM_STR);
//        $req->bindValue(':mail', $client->getMail_Client(), PDO::PARAM_STR);
//        $req->bindValue(':rs', $client->getAdresse_Client(), PDO::PARAM_STR);
//        $req->execute();
//    }
//    public function delete(Client $client){
//        $sql = 'DELETE FROM Client WHERE Client.Id_Client = :id';
//        $req = $this->db->prepare($sql);
//        $req->bindValue(':id', $client->getId_Client(), PDO::PARAM_INT);
//        $req->execute();
//    }
}