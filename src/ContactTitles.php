<?php

  namespace Whoman;

  class ContactTitles extends Whoman {
    
    protected $_method = 'GetContactTitleList';
    protected $_varname = 'EstateServiceGetContactTitleListRequest';
    
    function __construct(Client $Client){

      parent::__construct($Client);

      $this->pagination()->setItemsPerPage(10);

    }
    
    function get(){

      $data = array(
    		'Page' => $this->pagination()->getCurrentPage(),
    		'RowsPerPage' => $this->pagination()->getItemsPerPage(),
    	);

      $this->setData($data);

      $response = $this->doGet();
      
      $this->pagination()->setNumberOfItems($response->QueryInfo->RowCount);

      $response = $response->ContactTitleList;

      return $response;
      
    }

  }
