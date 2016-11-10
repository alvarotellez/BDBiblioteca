<?php

/**
 * Created by PhpStorm.
 * User: atellez
 * Date: 10/11/16
 * Time: 10:48
 */
class LibroController
{
    public function manageGetVerb(Request $request)
    {

        $listaLibros = null;
        $id = null;
        $response = null;
        $code = null;

        if (isset($request->getUrlElements()[2])) {
            $id = $request->getUrlElements()[2];
        }


        $listaLibros = LibroHandlerModel::getLibro($id);

        if ($listaLibros != null) {
            $code = '200';

        } else {


            if (LibroHandlerModel::isValid($id)) {
                $code = '404';
            }

        }

        $response = new Response($code, null, $listaLibros, $request->getAccept());
        $response->generate();
    }
}