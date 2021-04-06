<?php

  namespace Whoman;

  class EstateStates extends Whoman {
    
    protected $_method = 'GetStateList';
    protected $_varname = 'estateServiceGetStateListRequest';
    
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
      
      return $response->StateList;

    }

  }
