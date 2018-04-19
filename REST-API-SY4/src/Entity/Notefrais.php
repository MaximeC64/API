<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 19/04/2018
 * Time: 10:25
 */

namespace App\Entity;


class Notefrais implements \JsonSerializable
{
    private $Id_Notefrais;
    private $Date_Notefrais;
    private $DateSoumission_Notefrais;
    private $Id_Utilisateur;
    private $Id_Client;

    public function __construct($values)
    {
        $this->hydrate($values);
    }

    public function getId_Notefrais()
    {
        return $this->Id_Notefrais;
    }
    public function setId_Notefrais($Id_Notefrais): void
    {
        $this->Id_Notefrais = $Id_Notefrais;
    }
    public function getDate_Notefrais()
    {
        return $this->Date_Notefrais;
    }
    public function setDate_Notefrais($Date_Notefrais): void
    {
        $this->Date_Notefrais = $Date_Notefrais;
    }
    public function getDateSoumission_Notefrais()
    {
        return $this->DateSoumission_Notefrais;
    }
    public function setDateSoumission_Notefrais($DateSoumission_Notefrais): void
    {
        $this->DateSoumission_Notefrais = $DateSoumission_Notefrais;
    }
    public function getId_Utilisateur()
    {
        return $this->Id_Utilisateur;
    }
    public function setId_Utilisateur($Id_Utilisateur): void
    {
        $this->Id_Utilisateur = $Id_Utilisateur;
    }
    public function getId_Client()
    {
        return $this->Id_Client;
    }
    public function setId_Client($Id_Client): void
    {
        $this->Id_Client = $Id_Client;
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

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}