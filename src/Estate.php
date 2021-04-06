<?php

  namespace Whoman;

  class Estate extends Estates {
    
    protected $_method = 'GetEstateList';
    protected $_varname = 'EstateServiceGetEstateListRequest';

    protected $_estateid;

    function __construct(Client $Client){

      parent::__construct($Client);

      $this->pagination()->setItemsPerPage(1);
      $this->setDetails(true);

    }

    function setEstateid($estateid){

      $this->_estateid = $estateid;

      return $this->_estateid;

    }

    function getEstateid(){

      return $this->_estateid;

    }

    function get(){

      $data = array(
        'EstateID' => $this->getEstateid(),
    		'Page' => $this->pagination()->getCurrentPage(),
    		'RowsPerPage' => $this->pagination()->getItemsPerPage(),
    		'DisplayStatusIdList' => [2, 3, 4],
    	);

      if(is_bool($this->getDetails())):
        $data['ShowDetails'] = $this->getDetails() ? '1' : '0';
      elseif(is_array($this->getDetails())):
        $data['SubDetailIdList'] = $this->getDetails();
      endif;

      $this->setData($data);

      $response = $this->doGet();

      $response = $response->EstateList;

      if(sizeof($response) <= 0):
        return null;
      else:
        return $response[0];
      endif;
      
    }

  }
