<?php
/**
 * Created by PhpStorm.
 * User: txomi
 * Date: 16/04/2018
 * Time: 12:03
 */
namespace App\Entity;

class Trajet extends Depense implements \JsonSerializable
{
    private $Duree_Trajet;
    private $VilleDepart_Trajet;
    private $VilleArrivee_Trajet;
    private $DateAller_Trajet;
    private $DateRetour_Trajet;
    private $Kilometre_Trajet;
    private $Id_Depense;
//    private $Id_Notefrais;

    public function __construct($values)
    {
        parent::__construct($values);
        $this->hydrate($values);
    }

    public function getDuree_Trajet()
    {
        return $this->Duree_Trajet;
    }
    public function setDuree_Trajet($Duree_Trajet)
    {
        $this->Duree_Trajet = $Duree_Trajet;
    }
    public function getVilleDepart_Trajet()
    {
        return $this->VilleDepart_Trajet;
    }
    public function setVilleDepart_Trajet($VilleDepart_Trajet)
    {
        $this->VilleDepart_Trajet = $VilleDepart_Trajet;
    }
    public function getVilleArrivee_Trajet()
    {
        return $this->VilleArrivee_Trajet;
    }
    public function setVilleArrivee_Trajet($VilleArrivee_Trajet)
    {
        $this->VilleArrivee_Trajet = $VilleArrivee_Trajet;
    }
    public function getDateAller_Trajet()
    {
        return $this->DateAller_Trajet;
    }
    public function setDateAller_Trajet($DateAller_Trajet)
    {
        $this->DateAller_Trajet = $DateAller_Trajet;
    }
    public function getDateRetour_Trajet()
    {
        return $this->DateRetour_Trajet;
    }
    public function setDateRetour_Trajet($DateRetour_Trajet)
    {
        $this->DateRetour_Trajet = $DateRetour_Trajet;
    }
    public function getKilometre_Trajet()
    {
        return $this->Kilometre_Trajet;
    }
    public function setKilometre_Trajet($Kilometre_Trajet)
    {
        $this->Kilometre_Trajet = $Kilometre_Trajet;
    }
    public function getId_Depense()
    {
        return $this->Id_Depense;
    }
    public function setId_Depense($Id_Depense)
    {
        $this->Id_Depense = $Id_Depense;
    }
//    public function getId_Notefrais()
//    {
//        return $this->Id_Notefrais;
//    }
//    public function setId_Notefrais($Id_Notefrais)
//    {
//        $this->Id_Notefrais = $Id_Notefrais;
//    }

    public function hydrate($array){
        if (is_array($array)){
            foreach($array as $key => $value){
                $methodName = 'set'.ucfirst($key);
                if (method_exists($this, $methodName)){
                    $this->$methodName($value);
                } else {
                    // echo "La méthode $methodName n'existe pas !";
                }
            }
        }
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}