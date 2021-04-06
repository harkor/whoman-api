<?php

  namespace Whoman;

  class Languages extends Whoman {
    
    protected $_method = 'GetLanguageList';
    protected $_varname = 'estateServiceGetLanguageListRequest';
    
    function __construct(Client $Client){

      parent::__construct($Client);

    }

    function get(){

      $data = array();

      $this->setData($data);
      
      $response = $this->doGet();
      
      return $response->LanguageList;

    }

  }
