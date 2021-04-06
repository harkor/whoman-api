<?php

  namespace Whoman;

  class Estates extends Whoman {
    
    protected $_method = 'GetEstateList';
    protected $_varname = 'EstateServiceGetEstateListRequest';
    
    protected $_pagination;
    protected $_details;

    public $request;

    function __construct(Client $Client){

      parent::__construct($Client);

      $this->_pagination = new Pagination;
      $this->request = new \stdClass;

      $this->pagination()->setItemsPerPage(9);
      $this->pagination()->setCurrentPage(0);
      $this->setDetails(false);

    }

    public function setDetails($details){

      $this->_details = $details;

      return $this->_details;

    }

    public function getDetails(){

      return $this->_details;

    }

    public function get(){

      $data = array(
    		'Page' => $this->pagination()->getCurrentPage(),
    		'RowsPerPage' => $this->pagination()->getItemsPerPage(),
        'DisplayStatusIdList' => [2, 3, 4],
    	);

      if(is_bool($this->getDetails())):
        $data['ShowDetails'] = $this->getDetails();
      elseif(is_array($this->getDetails())):
        $data['SubDetailIdList'] = $this->getDetails();
      endif;

      $data = array_merge($data, (array) $this->request);

      $this->setData($data);
      
      $response = $this->doGet();

      $this->pagination()->setNumberOfItems($response->QueryInfo->RowCount);
      
      return $response->EstateList;

    }

  }
