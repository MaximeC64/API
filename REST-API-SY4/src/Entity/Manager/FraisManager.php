<?php
/**
 * Created by PhpStorm.
 * User: txomi
 * Date: 16/04/2018
 * Time: 12:52
 */
namespace App\Entity\Manager;

use App\Entity\Frais;
use PDO;

class FraisManager
{
    private $db;
    public function __construct($mode = 'prod') {
        if($mode == 'dev'){ // permet de choisir si l'on veut inclure ou pas la gestion des erreurs
//            $this->db = new PDO('mysql:host=localhost;dbname=expense_gr;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $this->db = new PDO('mysql:host=54.37.71.133:3306;dbname=expense_gr;charset=utf8', 'expense_gr', '123456', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } else {
//            $this->db = new PDO('mysql:host=localhost;dbname=expense_gr;charset=utf8', 'root', '');
        $this->db = new PDO('mysql:host=54.37.71.133:3306;dbname=expense_gr;charset=utf8', 'expense_gr', '123456');
        }
    }
//    public function listFrais(){
//        $listFrais = [];
//        $sql = 'SELECT * FROM frais';
//        $return = $this->db->query($sql);
//        while ($ligne = $return->fetch()){
//            $frais = new Frais($ligne);
//            $listFrais[] = $frais;
//        }
//        return json_encode($listFrais);
//    }
    public function catchFrais($id){
        $sql = 'SELECT * FROM Depense, Frais WHERE Depense.Id_Depense = :id AND Depense.Id_Depense = Frais.Id_Depense';
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $result = $req->fetch();
        $newFrais = new Frais($result);
        return json_encode($newFrais);
    }
    public function addFrais (Frais $frais, $idN){
        $sql = 'INSERT INTO Depense (DatePaiement_Depense, Libelle_Depense, Commentaire_Depense, MontantRemboursement_Depense, Id_Notefrais) VALUES ( :datePaie, :lib, :com, :mont, :idN)';
        $req = $this->db->prepare($sql);
        $req->bindValue(':datePaie', $frais->getDatePaiement_Depense(), PDO::PARAM_STR);
        $req->bindValue(':lib', $frais->getLibelle_Depense(), PDO::PARAM_STR);
        $req->bindValue(':com', $frais->getCommentaire_Depense(), PDO::PARAM_STR);
        $req->bindValue(':mont', $frais->getMontantRemboursement_Depense(), PDO::PARAM_STR);
        $req->bindValue(':idN', $idN, PDO::PARAM_INT);
        $req->execute();
        $idD = $this->db->lastInsertId();
        $sql = 'INSERT INTO Frais (Date_Frais, Id_Depense, Id_Notefrais) VALUES ( :dateF, :idD, :idN)';
        $req = $this->db->prepare($sql);
        $req->bindValue(':dateF', $frais->getDate_Frais(), PDO::PARAM_STR);
        $req->bindValue(':idD', $idD, PDO::PARAM_INT);
        $req->bindValue(':idN', $idN, PDO::PARAM_INT);
        $res = $req->execute();
        return json_encode($res);
    }

//    public function update(Frais $frais){
//        $sql = 'UPDATE frais SET Date_Frais = :datefrais, Id_Depense = :iddepense  WHERE Id_Notefrais = :idnotefrais';
//        $req = $this->db->prepare($sql);
//        $req->bindValue(':datefrais', $frais->getDateFrais(), PDO::PARAM_STR);
//        $req->bindValue(':iddepense', $frais->getIdDepense(), PDO::PARAM_INT);
//
//        $req->execute();
//    }
//    public function delete(Frais $frais){
//        $sql = 'DELETE FROM frais WHERE frais.Id_Notefrais = :idnotefrais';
//        $req = $this->db->prepare($sql);
//        $req->bindValue(':code', $frais->getIdNotefrais(), PDO::PARAM_INT);
//        $req->execute();
//    }

}