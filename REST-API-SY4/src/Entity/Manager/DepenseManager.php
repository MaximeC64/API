<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 09/04/2018
 * Time: 09:07
 */

namespace App\Entity\Manager;

use App\Entity\Depense;
use PDO;

class DepenseManager
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
    public function listDepense($id){
        $listDepense = [];
        $sql = 'SELECT * FROM Depense WHERE Id_Notefrais = :id';
        $req = $this->db->prepare($sql);
        $req->bindValue(':id',$id, PDO::PARAM_INT);
        $req->execute();
        while ($ligne = $req->fetch()){
            $depense = new Depense($ligne);
            $listDepense[] = $depense;
        }
        return json_encode($listDepense);
    }

//    public function readOnedepense($Id_Depense){
//        $sql = 'SELECT * FROM depense WHERE depense.Id_Depense = :$Id_Depense';
//        $req = $this->db->prepare($sql);
//        $req->bindValue(':iddepense',$Id_Depense, PDO::PARAM_INT);
//        $req->execute();
//        $result = $req->fetch();
//        $newDepense = new Depense($result);
//        return json_encode($newDepense);
//    }
//
//    public function addDepense(Depense $depense){
//        $sql = 'INSERT INTO depense (Id_Depense, DatePaiement_Depense, Libelle_Depense, Commentaire_Depense, MontantRemboursement_Depense, Id_Notefrais ) VALUES (:iddepense, :datepaiement, :libelle, :commentaire, :montantremboursement, :idnotedefrais)';
//        $req = $this->db->prepare($sql);
//        $req->bindValue(':iddepense', $depense->getIdDepense(), PDO::PARAM_INT);
//        $req->bindValue(':datepaiement', $depense->getDatePaiementDepense(), PDO::PARAM_STR);
//        $req->bindValue(':libelle', $depense->getLibelleDepense(), PDO::PARAM_STR);
//        $req->bindValue(':commentaire', $depense->getCommentaireDepense(), PDO::PARAM_STR);
//        $req->bindValue(':montantreomboursement', $depense->getMontantRemboursementDepense(), PDO::PARAM_STR);
//        $req->bindValue(':idnotedefrais', $depense->getIdNotefrais(), PDO::PARAM_STR);
//        $req->execute();
//    }
//    public function update(Depense $depense){
//        $sql = 'UPDATE depense SET DatePaiement_Depense = :datepaiement, Libelle_Depense = :libelle, Commentaire_Depense = :commentaire, MontantRemboursement_Depense = :montantreomboursement, Id_Notefrais = :idnotedefrais WHERE Id_Depense = :iddepense';
//        $req = $this->db->prepare($sql);
//        $req->bindValue(':datepaiement', $depense->getDatePaiementDepense(), PDO::PARAM_STR);
//        $req->bindValue(':libelle', $depense->getLibelleDepense(), PDO::PARAM_STR);
//        $req->bindValue(':commentaire', $depense->getCommentaireDepense(), PDO::PARAM_STR);
//        $req->bindValue(':montantremboursement', $depense->getMontantRemboursementDepense(), PDO::PARAM_STR);
//        $req->bindValue(':idnotedefrais', $depense->getIdNotefrais(), PDO::PARAM_STR);
//
//        $req->execute();
//    }
//    public function delete(Depense $depense){
//        $sql = 'DELETE FROM depense WHERE depense.Id_Depense = :iddepense';
//        $req = $this->db->prepare($sql);
//        $req->bindValue(':iddepense', $depense->getIdDepense(), PDO::PARAM_INT);
//        $req->execute();
//    }

}