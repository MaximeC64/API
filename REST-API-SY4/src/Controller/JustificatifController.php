<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 19/04/2018
 * Time: 10:02
 */

namespace App\Controller;

use App\Entity\Manager\JustificatifManager;
use App\Entity\Justificatif;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class JustificatifController extends Controller
{
    public function catch(Request $request, $idN, $idD){
        $justifManager = new JustificatifManager('dev');
        $leJustif = $justifManager->readOneJustificatif($idN, $idD);
        return new Response($leJustif);
    }
    public function add(Request $request, $idN, $idD){
        $justifManager = new JustificatifManager('dev');
        $justif = new Justificatif($_POST);
        $json = $justifManager->addJustificatif($justif, $idN, $idD);
        return new Response($json);
    }
}