<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 13/04/2018
 * Time: 17:00
 */

namespace App\Controller;


use App\Entity\Manager\UtilisateurManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UtilisateurController extends Controller
{
    public function login(Request $request){
        $utilisateurManager = new UtilisateurManager('dev');
        $myJSON = $utilisateurManager->login($_POST['mail'], $_POST['mdp']);
        return new Response($myJSON);
    }
    public function list(Request $request){
        $utilisateurManager = new UtilisateurManager('dev');
        $listUtilisateurJSON = $utilisateurManager->listUtilisateur();
        return new Response($listUtilisateurJSON);
    }
}