<?php
/**
 * Created by PhpStorm.
 * User: txomi
 * Date: 16/04/2018
 * Time: 12:06
 */
namespace App\Entity;

class Justificatif implements \JsonSerializable
{
    private $Id_Justificatif;
    private $Titre_Justificatif;
    private $Url_Justificatif;
    private $Id_Depense;
    private $Id_Notefrais;

    public function __construct($values)
    {
        $this->hydrate($values);
    }

    public function getId_Justificatif()
    {
        return $this->Id_Justificatif;
    }
    public function setId_Justificatif($Id_Justificatif)
    {
        $this->Id_Justificatif = $Id_Justificatif;
    }
    public function getTitre_Justificatif()
    {
        return $this->Titre_Justificatif;
    }
    public function setTitre_Justificatif($Titre_Justificatif)
    {
        $this->Titre_Justificatif = $Titre_Justificatif;
    }
    public function getUrl_Justificatif()
    {
        return $this->Url_Justificatif;
    }
    public function setUrl_Justificatif($Url_Justificatif)
    {
        $this->Url_Justificatif = $Url_Justificatif;
    }
    public function getId_Depense()
    {
        return $this->Id_Depense;
    }
    public function setId_Depense($Id_Depense)
    {
        $this->Id_Depense = $Id_Depense;
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