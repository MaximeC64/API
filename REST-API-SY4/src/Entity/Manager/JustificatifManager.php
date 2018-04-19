<?php
/**
 * Created by PhpStorm.
 * User: txomi
 * Date: 16/04/2018
 * Time: 13:09
 */
namespace App\Entity\Manager;

use App\Entity\Justificatif;
use PDO;

class JustificatifManager
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

//    public function listJustificatif(){
//        $listJustificatif = [];
//        $sql = 'SELECT * FROM justificatif';
//        $return = $this->db->query($sql);
//        while ($ligne = $return->fetch()){
//            $justificatif = new Log($ligne);
//            $listJustificatif[] = $justificatif;
//        }
//        return json_encode($listJustificatif);
//    }

    public function readOneJustificatif ($idN, $idD){
        $sql = 'SELECT * FROM Justificatif WHERE Id_Depense = :idD AND Id_Notefrais = :idN';
        $req = $this->db->prepare($sql);
        $req->bindValue(':idD', $idD, PDO::PARAM_INT);
        $req->bindValue(':idN', $idN, PDO::PARAM_INT);
        $req->execute();
        $result = $req->fetch();
        $newJustificatif = new Justificatif($result);
        return json_encode($newJustificatif);
    }


    public function addJustificatif (Justificatif $justificatif, $idN, $idD){
        $sql = 'INSERT INTO Justificatif (Titre_Justificatif, Url_Justificatif, Id_Depense, Id_Notefrais) VALUES ( :titre, :url, :idD, :idN)';
        $req = $this->db->prepare($sql);
        $req->bindValue(':titre', $justificatif->getTitre_Justificatif(), PDO::PARAM_STR);
        $req->bindValue(':url', $justificatif->getUrl_Justificatif(), PDO::PARAM_STR);
        $req->bindValue(':idD', $idD, PDO::PARAM_INT);
        $req->bindValue(':idN', $idN, PDO::PARAM_INT);
        $res = $req->execute();
        return json_encode($res);
    }

//    public function update(Justificatif $justificatif){
//        $sql = 'UPDATE justificatif SET Titre_Justificatif = :titre, Url_Justificatif = :url, Id_Depense = :iddepense, Id_Notefrais= :idnotefrais  WHERE Id_Justificatif = :idjustificatif';
//        $req = $this->db->prepare($sql);
//        $req->bindValue(':titre', $justificatif->getTitreJustificatif(), PDO::PARAM_STR);
//        $req->bindValue(':url', $justificatif->getUrlJustificatif(), PDO::PARAM_STR);
//        $req->bindValue(':iddepense', $justificatif->getIdDepense(), PDO::PARAM_INT);
//        $req->bindValue(':idnotefrais', $justificatif->getIdNotefrais(), PDO::PARAM_INT);
//
//        $req->execute();
//    }
//    public function delete(Justificatif $justificatif){
//        $sql = 'DELETE FROM justificatif WHERE justificatif.Id_Justificatif = :idjustificatif';
//        $req = $this->db->prepare($sql);
//        $req->bindValue(':code', $justificatif->getIdJustificatif(), PDO::PARAM_INT);
//        $req->execute();
//    }
}