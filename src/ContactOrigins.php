<?php

  namespace Whoman;

  class ContactOrigins extends ContactTypes {
    
    protected $_method = 'GetContactOriginList';
    protected $_varname = 'EstateServiceGetContactOriginListRequest';
    
    function __construct(Client $Client){

      parent::__construct($Client);

      $this->pagination()->setItemsPerPage(10);

    }

    function get(){

      $datas = array(
        'OfficeId' => $this->getOfficeid(),
    		'Page' => $this->pagination()->getCurrentPage(),
    		'RowsPerPage' => $this->pagination()->getItemsPerPage(),
    	);

      $this->setData($datas);

      $response = $this->doGet();
      
      $this->pagination()->setNumberOfItems($response->QueryInfo->RowCount);

      $response = $response->ContactOriginList;

      return $response;
      
    }

  }
