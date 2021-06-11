<?php

  namespace Whoman;

  class ContactTypes extends Whoman {

    protected $_method = 'GetContactTypeList';
    protected $_varname = 'EstateServiceGetContactTypeListRequest';

    protected $_officeid;

    function __construct(Client $Client){

      parent::__construct($Client);

      $this->pagination()->setItemsPerPage(10);

    }

    function setOfficeid($office_id){

      $this->_officeid = $office_id;

      return $this->_officeid;

    }

    function getOfficeid(){

      return $this->_officeid;

    }

    function get(){

      $this->setData(array(
        'OfficeId' => $this->getOfficeid(),
        'Page' => $this->pagination()->getCurrentPage(),
        'RowsPerPage' => $this->pagination()->getItemsPerPage(),
        ));

      $response = $this->doGet();

      $this->pagination()->setNumberOfItems($response->QueryInfo->RowCount);

      $response = $response->BaseContactTypeList;

      return $response;

    }

  }
