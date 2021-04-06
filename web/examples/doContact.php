<?php

  // Prepare Datas we need for example (not mandatory if you know ids)
  $offices = new Whoman\Offices($whomanClient);
  $offices = $offices->get();

  $contactOrigins = new Whoman\ContactOrigins($whomanClient);
  $contactOrigins->setOfficeid($offices[0]->OfficeId);
  $contactOrigins = $contactOrigins->get();

  $contactTypes = new Whoman\ContactTypes($whomanClient);
  $contactTypes->setOfficeid($offices[0]->OfficeId);
  $contactTypes = $contactTypes->get();

  $contactTitles = new Whoman\ContactTitles($whomanClient);
  $contactTitles = $contactTitles->get();

  $status = new Whoman\EstateStatus($whomanClient);
  $status = $status->get();

  $categories = new Whoman\EstateCategories($whomanClient);
  $categories = $categories->get();

  $purposes = new Whoman\EstatePurposes($whomanClient);
  $purposes = $purposes->get();

  $regions = new Whoman\Regions($whomanClient);
  $regions->setOfficeid($offices[0]->OfficeId);
  $regions = $regions->get();

  $states = new Whoman\EstateStates($whomanClient);
  $states = $states->get();

  // Set search Criteria
  $searchCriteria = new Whoman\ContactSearchCriteria;
  $searchCriteria->AreaRange = [1, 999];
  $searchCriteria->CategoryIdList = [$categories[0]->CategoryId];
  $searchCriteria->CountryId = 1;
  $searchCriteria->Fronts = 3;
  $searchCriteria->Furnished = 0;
  $searchCriteria->Garage = 1;
  $searchCriteria->Garden = 1;
  $searchCriteria->GardenAreaRange = [5, 400];
  $searchCriteria->GroundAreaRange = [200, 1000];
  $searchCriteria->InvestmentEstate = 0;
  $searchCriteria->MinRooms = 3;
  $searchCriteria->Parking = 1;
  $searchCriteria->PriceRange = [200000, 500000];
  $searchCriteria->PurposeIdList = [$purposes[0]->PurposeId];
  $searchCriteria->PurposeStatusIdList = [$purposes[0]->PurposeStatusList[0]->PurposeStatusId];
  $searchCriteria->RegionIDList = [];
  $searchCriteria->State = $states[0]->StateId;
  $searchCriteria->SubCategoryIdList = [$categories[0]->SubCategoryList[0]->SubCategoryId];
  $searchCriteria->Terrace = 1;
  $searchCriteria->ZipList = [1200];

  // Create contact
  $contact = new Whoman\Contact($whomanClient);
  
  $contact->AgreementMail = 1;
  $contact->AgreementSms = 1;

  $contact->FirstName = 'Julien';
  $contact->Name = 'Winant';

  $contact->Address1 = 'Rue de la gare';
  $contact->Number = '10';
  $contact->Box = 'F';
  $contact->Zip = '4217';
  $contact->City = 'Heron';
  $contact->CountryID = 1;

  $contact->PrivateEmail = 'julien@charlin.be';
  $contact->PrivateMobile = '0472706556';
  $contact->PrivateTel = '085123456';

  $contact->Comments = "Mon commentaire";
  $contact->Message = "Mon message";

  $contact->OfficeID = $offices[0]->OfficeId;
  $contact->ContactOriginID = $contactOrigins[0]->ContactOriginId;
  $contact->ContactTitleID = $contactTitles[0]->ContactTitleId;
  $contact->ContactTypeIDList = [$contactTypes[0]->ContactTypes[0]->ContactTypeId];
  $contact->StatusID = $status[0]->StatusId;

  $contact->SearchCriteria	=	get_object_vars($searchCriteria);

  $response = $contact->post(); // Go
  
  // Display Result
  if($isCLI):
    print_r($response);  
    echo "\n";
  else:
    echo '<pre>'.print_r($response, 1).'</pre>';
  endif;

