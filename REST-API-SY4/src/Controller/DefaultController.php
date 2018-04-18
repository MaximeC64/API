<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 13/04/2018
 * Time: 16:48
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function index(){
        return new Response("Hello");
    }
}