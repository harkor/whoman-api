<?php

  namespace Whoman;

  class ContractTypes extends Whoman {
    
    protected $_method = 'GetAvailabilityList';
    protected $_varname = 'estateServiceGetAvailabilityListRequest';
    
    function __construct(Client $Client){

      parent::__construct($Client);

    }

    function get(){

      $data = array();
      
      $this->setData($data);

      $response = $this->doGet();
      
      return $response->AvailabilityList;

    }

  }
