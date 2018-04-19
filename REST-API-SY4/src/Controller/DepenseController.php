<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 19/04/2018
 * Time: 10:02
 */

namespace App\Controller;
use App\Entity\Manager\TrajetManager;
use App\Entity\Manager\FraisManager;
use App\Entity\Manager\DepenseManager;
use App\Entity\Trajet;
use App\Entity\Frais;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DepenseController extends Controller
{
    public function list(Request $request, $idN){
        $depenseManager = new DepenseManager('dev');
        $listDepenseJSON = $depenseManager->listDepense($idN);
        return new Response($listDepenseJSON);
    }
    public function add(Request $request, $idN){
        if ($_POST['type'] === "trajet"){
            $trajetManager = new TrajetManager('dev');
            $trajet = new Trajet($_POST);
            $json = $trajetManager->addTrajet($trajet, $idN);
            return new Response($json);
    }
        else if ($_POST['type'] === "frais"){
            $fraisManager = new FraisManager('dev');
            $frais = new Frais($_POST);
            $json = $fraisManager->addFrais($frais, $idN);
            return new Response($json);
        }
    }
}