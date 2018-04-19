<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 09/04/2018
 * Time: 09:07
 */
namespace App\Entity;

class Depense implements \JsonSerializable
{
    private $Id_Depense;
    private $DatePaiement_Depense;
    private $Libelle_Depense;
    private $Commentaire_Depense;
    private $MontantRemboursement_Depense;
    private $Id_Notefrais;

    public function __construct($values)
    {
        $this->hydrate($values);
    }

    public function getId_Depense()
    {
        return $this->Id_Depense;
    }
    public function setId_Depense($Id_Depense)
    {
        $this->Id_Depense = $Id_Depense;
    }
    public function getDatePaiement_Depense()
    {
        return $this->DatePaiement_Depense;
    }
    public function setDatePaiement_Depense($DatePaiement_Depense)
    {
        $this->DatePaiement_Depense = $DatePaiement_Depense;
    }
    public function getLibelle_Depense()
    {
        return $this->Libelle_Depense;
    }
    public function setLibelle_Depense($Libelle_Depense)
    {
        $this->Libelle_Depense = $Libelle_Depense;
    }
    public function getCommentaire_Depense()
    {
        return $this->Commentaire_Depense;
    }
    public function setCommentaire_Depense($Commentaire_Depense)
    {
        $this->Commentaire_Depense = $Commentaire_Depense;
    }
    public function getMontantRemboursement_Depense()
    {
        return $this->MontantRemboursement_Depense;
    }
    public function setMontantRemboursement_Depense($MontantRemboursement_Depense)
    {
        $this->MontantRemboursement_Depense = $MontantRemboursement_Depense;
    }
    public function getId_Notefrais()
    {
        return $this->Id_Notefrais;
    }
    public function setId_Notefrais($Id_Notefrais)
    {
        $this->Id_Notefrais = $Id_Notefrais;
    }

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