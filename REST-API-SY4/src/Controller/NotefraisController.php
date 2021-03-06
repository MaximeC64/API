<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 19/04/2018
 * Time: 10:02
 */

namespace App\Controller;
use App\Entity\Manager\NotefraisManager;
use App\Entity\Notefrais;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class NotefraisController extends Controller
{
    public function list(Request $request, $id){
        $notefraisManager = new NotefraisManager('dev');
        $listNofraisJSON = $notefraisManager->listNotefrais($id);
        return new Response($listNofraisJSON);
    }
    public function listByDate(Request $request, $id){
        $notefraisManager = new NotefraisManager('dev');
        $listNofraisJSON = $notefraisManager->listNotefraisByDate($id);
        return new Response($listNofraisJSON);
    }
    public function listByClient(Request $request, $id){
        $notefraisManager = new NotefraisManager('dev');
        $listNofraisJSON = $notefraisManager->listNotefraisByClient($id);
        return new Response($listNofraisJSON);
    }
    public function add(Request $request, $id){
        $notefraisManager = new NotefraisManager('dev');
        $notefrais = new Notefrais($_POST);
        $json = $notefraisManager->addNotefrais($notefrais, $id);
        return new Response($json);
    }
    public function validation(Request $request, $idN){
        $notefraisManager = new NotefraisManager('dev');
        $validateJSON = $notefraisManager->catchInfoValidation($idN);
        return new Response($validateJSON);
    }
}