<?php
/**
 * Created by PhpStorm.
 * User: txomi
 * Date: 16/04/2018
 * Time: 13:35
 */
namespace App\Entity\Manager;

use App\Entity\Trajet;
use PDO;

class TrajetManager
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

//    public function listTrajet(){
//        $listTrajet = [];
//        $sql = 'SELECT * FROM trajet';
//        $return = $this->db->query($sql);
//        while ($ligne = $return->fetch()){
//            $trajet = new Trajet($ligne);
//            $listTrajet[] = $trajet;
//        }
//        return json_encode($listTrajet);
//    }


    public function addTrajet (Trajet $trajet, $idN){
        $sql = 'INSERT INTO Depense (DatePaiement_Depense, Libelle_Depense, Commentaire_Depense, MontantRemboursement_Depense, Id_Notefrais) VALUES ( :datePaie, :lib, :com, :mont, :idN)';
        $req = $this->db->prepare($sql);
        $req->bindValue(':datePaie', $trajet->getDatePaiement_Depense(), PDO::PARAM_STR);
        $req->bindValue(':lib', $trajet->getLibelle_Depense(), PDO::PARAM_STR);
        $req->bindValue(':com', $trajet->getCommentaire_Depense(), PDO::PARAM_STR);
        $req->bindValue(':mont', $trajet->getMontantRemboursement_Depense(), PDO::PARAM_STR);
        $req->bindValue(':idN', $idN, PDO::PARAM_INT);
        $req->execute();
        $idD = $this->db->lastInsertId();
        $sql = 'INSERT INTO Trajet (Duree_Trajet, VilleDepart_Trajet, VilleArrivee_Trajet, DateAller_Trajet, DateRetour_Trajet, Kilometre_Trajet, Id_Depense, Id_Notefrais) VALUES ( :duree, :villeD, :villeA, :dateA, :dateR, :Km, :idD, :idN)';
        $req = $this->db->prepare($sql);
        $req->bindValue(':duree', $trajet->getDuree_Trajet(), PDO::PARAM_STR);
        $req->bindValue(':villeD', $trajet->getVilleDepart_Trajet(), PDO::PARAM_STR);
        $req->bindValue(':villeA', $trajet->getVilleArrivee_Trajet(), PDO::PARAM_STR);
        $req->bindValue(':dateA', $trajet->getDateAller_Trajet(), PDO::PARAM_STR);
        $req->bindValue(':dateR', $trajet->getDateRetour_Trajet(), PDO::PARAM_STR);
        $req->bindValue(':Km', $trajet->getKilometre_Trajet(), PDO::PARAM_STR);
        $req->bindValue(':idD', $idD, PDO::PARAM_INT);
        $req->bindValue(':idN', $idN, PDO::PARAM_INT);
        $res = $req->execute();
        return json_encode($res);
    }

//    public function update(Trajet $trajet){
//        $sql = 'UPDATE trajet SET Duree_Trajet = :duree, VilleDepart_Trajet = :villedepart, VilleArriver_Trajet = :villearrivee, DateAller_Trajet = :datealler, DateRetour_Trajet = :dateretour, Kilometre_Trajet = :kilometre   WHERE Id_Notefrais = :idnotefrais)';
//        $req = $this->db->prepare($sql);
//        $req->bindValue(':duree', $trajet->getDureeTrajet(), PDO::PARAM_STR);
//        $req->bindValue(':villedepart', $trajet->getVilleDepartTrajet(), PDO::PARAM_STR);
//        $req->bindValue(':villearrivee', $trajet->getVilleArriveeTrajet(), PDO::PARAM_STR);
//        $req->bindValue(':datealler', $trajet->getDateAllerTrajet(), PDO::PARAM_STR);
//        $req->bindValue(':dateretour', $trajet->getDateRetourTrajet(), PDO::PARAM_STR);
//        $req->bindValue(':kilometre', $trajet->getKilometreTrajet(), PDO::PARAM_STR);
//
//        $req->execute();
//    }
//    public function delete(Trajet $trajet){
//        $sql = 'DELETE FROM trajet WHERE trajet.Id_Notefrais = :idnotefrais';
//        $req = $this->db->prepare($sql);
//        $req->bindValue(':code', $trajet->getIdNotefrais(), PDO::PARAM_INT);
//        $req->execute();
//    }

}