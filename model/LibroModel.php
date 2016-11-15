<?php
/**
 * Created by PhpStorm.
 * User: alvarotellez
 * Date: 15/11/16
 * Time: 19:47
 */

class LibroModel implements  JsonSerializable {
    private $ISBN;
    private $TITULO;
    private $EJEMPLARES;
    private $PRECIO;

    public function __construct($ISBN,$TITULO,$EJEMPLARES,$PRECIO)
    {
        $this->ISBN=$ISBN;
        $this->TITULO=$TITULO;
        $this->EJEMPLARES=$EJEMPLARES;
        $this->PRECIO=$PRECIO;
    }

    function jsonSerialize()
    {


        return array(
            'ISBN' => $this->ISBN,
            'TITULO'=> $this->TITULO,
            'EJEMPLARES'=> $this->EJEMPLARES,
            'PRECIO'=> $this->PRECIO
        );
    }

    public function __sleep()
    {
        return array('ISBN','TITULO','EJEMPLARES','PRECIO');
    }

    //METHOD GET
    public function getISBN()
    {
        return $this->ISBN;
    }

    public function getTITULO()
    {
        return $this->TITULO;
    }


    public function getEJEMPLARES()
    {
        return $this->EJEMPLARES;
    }


    public function getPRECIO()
    {
        return $this->PRECIO;
    }

    //METHOD SET
    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;
    }


    public function setTITULO($TITULO)
    {
        $this->TITULO = $TITULO;
    }


    public function setEJEMPLARES($EJEMPLARES)
    {
        $this->EJEMPLARES = $EJEMPLARES;
    }


    public function setPRECIO($PRECIO)
    {
        $this->PRECIO = $PRECIO;
    }
}