<?php

  namespace Whoman;

  class EstateAvailabilities extends Whoman {
    
    protected $_method = 'GetAvailabilityList';
    protected $_varname = 'estateServiceGetAvailabilityListRequest';

    function __construct(Client $Client){

      parent::__construct($Client);
      $this->pagination()->setItemsPerPage(100);

    }

    function get(){

      $data = array(
    		'Page' => $this->pagination()->getCurrentPage(),
    		'RowsPerPage' => $this->pagination()->getItemsPerPage(),
    	);
      
      $this->setData($data);

      $response = $this->doGet();

      $this->pagination()->setNumberOfItems($response->QueryInfo->RowCount);
      
      return $response->AvailabilityList;

    }

  }
