<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 17/04/2018
 * Time: 16:05
 */

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Manager\ClientManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    public function list(Request $request){
        $clientManager = new ClientManager('dev');
        $listClientJSON = $clientManager->listClient();
        return new Response($listClientJSON);
    }
    public function add(Request $request){
        $clientManager = new ClientManager('dev');
        $client = new Client($_POST);
        $json = $clientManager->addClient($client);
        return new Response($json);
    }
}