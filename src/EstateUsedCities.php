<?php

  namespace Whoman;

  class EstateUsedCities extends Whoman {
    
    protected $_method = 'GetUsedCities';
    protected $_varname = 'estateServiceGetUsedCitiesRequest';
    
    function __construct(Client $Client){

      parent::__construct($Client);
      $this->pagination()->setItemsPerPage(200);

    }

    function get(){

      $data = array(
    		'Page' => $this->pagination()->getCurrentPage(),
    		'RowsPerPage' => $this->pagination()->getItemsPerPage(),
    	);
      
      $this->setData($data);
      
      $response = $this->doGet();
      
      $this->pagination()->setNumberOfItems($response->QueryInfo->RowCount);

      return $response->Cities;

    }

  }
