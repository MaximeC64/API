<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 19/04/2018
 * Time: 10:25
 */

namespace App\Entity\Manager;


use App\Entity\Notefrais;
use PDO;

class NotefraisManager
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

    public function listNotefrais($id){
        $listNotefrais = [];
        $sql = 'SELECT * FROM Notefrais WHERE Id_Utilisateur = :id';
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        while ($ligne = $req->fetch()){
            $notefrais = new Notefrais($ligne);
            $listNotefrais[] = $notefrais;
        }
        return json_encode($listNotefrais);
    }
    public function addNotefrais(Notefrais $notefrais, $id){
        $sql = 'INSERT INTO Notefrais (Date_Notefrais, DateSoumission_Notefrais, Id_Utilisateur, Id_Client) VALUES (:dateNote, :DateSoumNote, :idUtil, :idCli)';
        $req = $this->db->prepare($sql);
        $req->bindValue(':dateNote', $notefrais->getDate_Notefrais(), PDO::PARAM_STR);
        $req->bindValue(':DateSoumNote', $notefrais->getDateSoumission_Notefrais(), PDO::PARAM_STR);
        $req->bindValue(':idUtil', $id, PDO::PARAM_INT);
        $req->bindValue(':idCli', $notefrais->getId_Client(), PDO::PARAM_INT);
        $res = $req->execute();
        return json_encode($res);
    }

}