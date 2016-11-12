<?php

require_once "Controller.php";
/**
 * Created by PhpStorm.
 * User: atellez
 * Date: 10/11/16
 * Time: 10:49
 */
class NotFoundController extends Controller
{
    public function manage(Request $req){
        $response =new Response('404',null,null,$req->getAccept());
        $response->generate();
    }
}