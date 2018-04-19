<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 18/04/2018
 * Time: 10:13
 */

namespace App\Entity;


class Client implements \JsonSerializable
{
    private $Id_Client;
    private $Titre_Client;
    private $Nom_Client;
    private $Prenom_Client;
    private $Adresse_Client;
    private $Cp_Client;
    private $Ville_Client;
    private $Telephone_Client;
    private $Mail_Client;
    private $Rs_Client;

    public function __construct($values)
    {
        $this->hydrate($values);
    }

    public function getId_Client()
    {
        return $this->Id_Client;}
    public function setId_Client($Id_Client)
    {
        $this->Id_Client = $Id_Client;
    }
    public function getTitre_Client()
    {
        return $this->Titre_Client;
    }
    public function setTitre_Client($Titre_Client): void
    {
        $this->Titre_Client = $Titre_Client;
    }
    public function getNom_Client()
    {
        return $this->Nom_Client;
    }
    public function setNom_Client($Nom_Client)
    {
        $this->Nom_Client = $Nom_Client;
    }
    public function getPrenom_Client()
    {
        return $this->Prenom_Client;
    }
    public function setPrenom_Client($Prenom_Client)
    {
        $this->Prenom_Client = $Prenom_Client;
    }
    public function getAdresse_Client()
    {
        return $this->Adresse_Client;
    }
    public function setAdresse_Client($Adresse_Client)
    {
        $this->Adresse_Client = $Adresse_Client;
    }
    public function getCp_Client()
    {
        return $this->Cp_Client;
    }
    function setCp_Client($Cp_Client)
    {
        $this->Cp_Client = $Cp_Client;
    }
    public function getVille_Client()
    {
        return $this->Ville_Client;
    }
    public function setVille_Client($Ville_Client)
    {
        $this->Ville_Client = $Ville_Client;
    }
    public function getTelephone_Client()
    {
        return $this->Telephone_Client;
    }
    public function setTelephone_Client($Telephone_Client)
    {
        $this->Telephone_Client = $Telephone_Client;
    }
    public function getMail_Client()
    {
        return $this->Mail_Client;
    }
    public function setMail_Client($Mail_Client)
    {
        $this->Mail_Client = $Mail_Client;
    }
    public function getRs_Client()
    {
        return $this->Rs_Client;
    }
    public function setRs_Client($Rs_Client)
    {
        $this->Rs_Client = $Rs_Client;
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