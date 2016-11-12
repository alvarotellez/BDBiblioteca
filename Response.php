<?php

/**
 * Created by PhpStorm.
 * User: alvarotellez
 * Date: 12/11/16
 * Time: 9:37
 */
//ESTA CLASE GENERA LA RESPUESTA QUE LE ENVIAMOS AL CLIENTE
class Response
{
    private $code;
    private $headers;
    private $body;
    private $format;


    public function __construct($code='200', $headers=null, $body =null, $format='json')
    {
        $this->code = $code;
        $this->headers = $headers;
        $this->body = $body;
        $this->format=$format;
    }

    public function generate(){
        switch ($this->format){
            case 'json':
                break;
            case 'unsupported':
                if($this->body !=null){
                    $this->code = '406';
                    $this->body = null;
                }
                break;
        }
        http_response_code($this->code);
        if(isset($this->headers)){
            foreach ($this->headers as $key=>$value){
                header($key.' : '. $value);
            }
        }
        if(!empty($this->body)){
            echo $this->body;
        }
    }
}