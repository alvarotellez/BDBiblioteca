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
        //Para decirle que tipo de datos acepta nuestro servicio
        switch($accept){
            case 'application/json':
            case'*/*':
            case null:
                $this->accept = 'json';
                break;
            default:
                $this->accept = 'unsupported';
                break;
        }
        return true;
    }
    //Cuerpo del json
    private function parseBody($body,$content_type)
    {
        $parameters = array();

        switch ($content_type) {
            case "application/json":
                $this->format = "json";
                $parameters = json_decode($body);
                $body_params = json_decode($body);
                break;
            default:
                break;
            $this->body_parameters = $parameters;
                }
        }
        /**
         * @return mixed
         */
        public function getUrlElements()
        {
            return $this->url_elements;
        }

        /**
         * @param mixed $url_elements
         */
        public function setUrlElements($url_elements)
        {
            $this->url_elements = $url_elements;
        }

        /**
         * @return mixed
         */
        public function getQueryString()
        {
            return $this->query_string;
        }

        /**
         * @param mixed $query_string
         */
        public function setQueryString($query_string)
        {
            $this->query_string = $query_string;
        }

        /**
         * @return mixed
         */
        public function getVerb()
        {
            return $this->verb;
        }

        /**
         * @param mixed $verb
         */
        public function setVerb($verb)
        {
            $this->verb = $verb;
        }

        /**
         * @return mixed
         */
        public function getBodyParameters()
        {
            return $this->body_parameters;
        }

        /**
         * @param mixed $body_parameters
         */
        public function setBodyParameters($body_parameters)
        {
            $this->body_parameters = $body_parameters;
        }

        /**
         * @return mixed
         */
        public function getFormat()
        {
            return $this->format;
        }

        /**
         * @param mixed $format
         */
        public function setFormat($format)
        {
            $this->format = $format;
        }

        /**
         * @return string
         */
        public function getAccept()
        {
            return $this->accept;
        }

        /**
         * @param string $accept
         */
        public function setAccept($accept)
        {
            $this->accept = $accept;
        }

    }