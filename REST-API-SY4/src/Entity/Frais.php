<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 16/04/2018
 * Time: 11:57
 */
namespace App\Entity;

class Frais extends Depense implements \JsonSerializable
{
    private $Date_Frais;
    private $Id_Depense;
//    private $Id_Notefrais;

    public function __construct($values)
    {
        parent::__construct($values);
        $this->hydrate($values);
    }
    public function getDate_Frais()
    {
        return $this->Date_Frais;
    }
    public function setDate_Frais($Date_Frais)
    {
        $this->Date_Frais = $Date_Frais;
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
