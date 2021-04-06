<?php

  namespace Whoman;

  class BaseDocumentTypes extends Whoman {
    
    protected $_method = 'GetBaseDocumentTypeList';
    protected $_varname = 'EstateServiceGetBaseDocumentTypeListRequest';
    
    function __construct(Client $Client){

      parent::__construct($Client);

    }

    function get(){

      $this->setData([]);

      $response = $this->doGet();
      
      return $response->BaseDocumentTypeList;

    }

  }
