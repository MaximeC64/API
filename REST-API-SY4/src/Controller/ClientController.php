<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 17/04/2018
 * Time: 16:05
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientController
{
    public function add(Request $request){
        return new Response(var_dump($_POST));
    }
}