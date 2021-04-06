<?php

namespace Whoman;

class Contact extends Whoman {
    
  protected $_method = 'UpdateContact';
  protected $_varname = 'estateServiceUpdateContactRequest';

  public	$__type	=	"EstateServiceUpdateContactRequest:Whoman.Estate";
  public	$Address1;
  public	$Address2;
  public	$AgreementMail;
  public	$AgreementSms;
  public	$Box;
  public	$City;
  public	$Comments;
  public	$ContactOriginID;
  public	$ContactTitleID;
  public	$ContactTypeIDList;
  public	$CountryID;
  public	$EstateID;
  public	$FirstName;
  public	$LanguageID;
  public	$Message;
  public	$Name;
  public	$Number;
  public	$OfficeID;
  public	$PrivateEmail;
  public	$PrivateMobile;
  public	$PrivateTel;
  public	$RepresentativeIDList;
  public	$SearchCriteria;
  public	$StatusID;
  public	$Zip;

  function __construct(Client $Client){

    parent::__construct($Client);

    $this->LanguageID = $this->_Client->getLanguage();

  }

  public function setData($data){

    $this->_data = $this->constructPostQuery($data);
    return $this->_data;

  }

  public function post(){

    $this->setData(get_object_vars($this));

    $response = $this->doPost();

    return $response->ContactId;

  }

}
