<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 13/04/2018
 * Time: 19:46
 */

namespace App\Entity;


class Utilisateur implements \JsonSerializable
{
    private $Id_Utilisateur;
    private $Mail_Utilisateur;
    private $Mdp_Utilisateur;
    private $Adresse_Utilisateur;
    private $Cp_Utilisateur;
    private $Ville_Utilisateur;
    private $Telephone_Utilisateur;
    private $Nom_Utilisateur;
    private $Prenom_Utilisateur;
    private $Statut_Utilisateur;

    public function __construct($values)
    {
        $this->hydrate($values);
    }

    /**
     * @return mixed
     */
    public function getId_Utilisateur()
    {
        return $this->Id_Utilisateur;
    }
    /**
     * @param mixed $Id_Utilisateur
     */
    public function setId_Utilisateur($Id_Utilisateur): void
    {
        $this->Id_Utilisateur = $Id_Utilisateur;
    }
    /**
     * @return mixed
     */
    public function getMail_Utilisateur()
    {
        return $this->Mail_Utilisateur;
    }
    /**
     * @param mixed $Mail_Utilisateur
     */
    public function setMail_Utilisateur($Mail_Utilisateur): void
    {
        $this->Mail_Utilisateur = $Mail_Utilisateur;
    }
    /**
     * @return mixed
     */
    public function getAdresse_Utilisateur()
    {
        return $this->Adresse_Utilisateur;
    }
    /**
     * @param mixed $Adresse_Utilisateur
     */
    public function setAdresse_Utilisateur($Adresse_Utilisateur): void
    {
        $this->Adresse_Utilisateur = $Adresse_Utilisateur;
    }
    /**
     * @return mixed
     */
    public function getCp_Utilisateur()
    {
        return $this->Cp_Utilisateur;
    }
    /**
     * @param mixed $Cp_Utilisateur
     */
    public function setCp_Utilisateur($Cp_Utilisateur): void
    {
        $this->Cp_Utilisateur = $Cp_Utilisateur;
    }
    /**
     * @return mixed
     */
    public function getVille_Utilisateur()
    {
        return $this->Ville_Utilisateur;
    }
    /**
     * @param mixed $Ville_Utilisateur
     */
    public function setVille_Utilisateur($Ville_Utilisateur): void
    {
        $this->Ville_Utilisateur = $Ville_Utilisateur;
    }
    /**
     * @return mixed
     */
    public function getTelephone_Utilisateur()
    {
        return $this->Telephone_Utilisateur;
    }
    /**
     * @param mixed $Telephone_Utilisateur
     */
    public function setTelephone_Utilisateur($Telephone_Utilisateur): void
    {
        $this->Telephone_Utilisateur = $Telephone_Utilisateur;
    }
    /**
     * @return mixed
     */
    public function getNom_Utilisateur()
    {
        return $this->Nom_Utilisateur;
    }
    /**
     * @param mixed $Nom_Utilisateur
     */
    public function setNom_Utilisateur($Nom_Utilisateur): void
    {
        $this->Nom_Utilisateur = $Nom_Utilisateur;
    }
    /**
     * @return mixed
     */
    public function getPrenom_Utilisateur()
    {
        return $this->Prenom_Utilisateur;
    }
    /**
     * @param mixed $Prenom_Utilisateur
     */
    public function setPrenom_Utilisateur($Prenom_Utilisateur): void
    {
        $this->Prenom_Utilisateur = $Prenom_Utilisateur;
    }
    /**
     * @return mixed
     */
    public function getStatut_Utilisateur()
    {
        return $this->Statut_Utilisateur;
    }
    /**
     * @param mixed $Statut_Utilisateur
     */
    public function setStatut_Utilisateur($Statut_Utilisateur): void
    {
        $this->Statut_Utilisateur = $Statut_Utilisateur;
    }

    /**
     * @return mixed
     */
    public function getMdp_Utilisateur()
    {
        return $this->Mdp_Utilisateur;
    }

    /**
     * @param mixed $Mdp_Utilisateur
     */
    public function setMdp_Utilisateur($Mdp_Utilisateur): void
    {
        $this->Mdp_Utilisateur = $Mdp_Utilisateur;
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