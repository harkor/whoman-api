<?php

  namespace Whoman;

  class Whoman {

    protected $_Client;
    
    protected $_pagination;

    protected $_method;
    protected $_varname;
    protected $_data;

    function __construct(Client $Client){

      $this->_Client = $Client;
      $this->_pagination = new Pagination;

      $this->pagination()->setItemsPerPage(9);
      $this->pagination()->setCurrentPage(0);

    }

    public function client(){
      return $this->_Client;
    }

    public function pagination(){
      return $this->_pagination;
    }

    public function setMethod($method){

      $this->_method = $method;
      return $this->_method;

    }

    public function getMethod(){

      return $this->_method;

    }

    public function setVarname($varname){

      $this->_varname = $varname;
      return $this->_varname;

    }

    public function getVarname(){

      return $this->_varname;

    }

    public function setData($data){

      $this->_data = $this->constructQuery($data);
      return $this->_data;

    }

    public function getData(){

      return $this->_data;

    }

    public function constructQuery($array){

      $array = array_merge([
        'ClientId' => $this->_Client->getSbsid(),
        'Language' => $this->_Client->getLanguage(),
        'Page' => 0,
        'RowsPerPage' => 10,
      ], $array);

      return $array;

    }

    public function constructPostQuery($array){

      $array = array_merge([
        'ClientId' => $this->_Client->getSbsid(),
      ], $array);

      return $array;

    }

    public function doGet(){

      $response = $this->_Client->get($this->getMethod(), $this->getVarname(), urlencode(json_encode($this->getData())));

      return $response->d;

    }

    public function doPost(){

      $response = $this->_Client->post( $this->getMethod(), $this->getVarname(), $this->getData() );

      return $response->d;

    }

  }
