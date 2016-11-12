<?php

/**
 * Created by PhpStorm.
 * User: alvarotellez
 * Date: 12/11/16
 * Time: 7:59
 */
class Request
{
    private $url_elements;
    private $query_string;
    private $verb;
    private $body_parameters;
    private $format;
    private $accept;

    public function __construct($verb, $url_elemnts, $query_string, $body, $content_type, $accept)
    {
        $this->verb = $verb;
        $this->url_elements = $url_elemnts;
        $this->query_string = $query_string;
        $this->parseBody($body,$content_type);

        switch($accept){
            case 'application/json':
            case'*/*':
            case null:
                $this->accept = 'json';
                break;
            case 'application/xml':
                $this->accept ='xml';
                break;
            default:
                $this->accept = 'unsupported';
                break;
        }
    }
}