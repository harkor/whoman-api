<?php

  namespace Whoman;

  class Client {
    
    private $_sbsid;
    private $_host;
    private $_language;

    function __construct(){

      $this->setLanguage('fr-BE');

    }

    public function setSbsid($sbsid){

      $this->_sbsid = $sbsid;

      return $this->_sbsid;

    }

    public function getSbsid(){

      return $this->_sbsid;

    }

    public function setLanguage($language){

      $this->_language = $language;

      return $this->_language;

    }

    public function getLanguage(){

      return $this->_language;

    }

    public function setHost($host){

      $this->_host = $host;

      return $this->_host;

    }

    public function getHost(){

      return $this->_host;

    }

    public function get($method, $varname, $data){

      $query = $this->getHost() . $method . '?' . $varname . '=' . $data;

      $curl = new \Curl\Curl();
      $curl->get($query);

      $response = json_decode($curl->response);
      
      if ($curl->error):
        throw new \Exception('Error '.$curl->error_code.' : '. $response->Message);
      endif;

      return $response;

    }

    public function post($method, $varname, $data){

      $query = $this->getHost() . $method;

      $body = new \StdClass;
      $body->{$varname} = $data;

      $curl = new \Curl\Curl();
      $curl->setHeader('Content-type', 'application/json');
      $curl->post($query, json_encode($body));
      
      $response = json_decode($curl->response);
      
      if ($curl->error):
        throw new \Exception('Error '.$curl->error_code.' : '. $response->Message);
      endif;

      return $response;

    }

    
    
  }
