<?php

// Get List of Offices
$whomanOffices = new Whoman\Offices($whomanClient);
$offices = $whomanOffices->get();

$whomanEstatePurposes = new Whoman\EstatePurposes($whomanClient);
$items = $whomanEstatePurposes->get();

$whomanRegions = new Whoman\Regions($whomanClient);
$whomanRegions->setOfficeid($offices[0]->OfficeId);
$items = $whomanRegions->get();

if($isCLI):
  print_r($items);
else:
  echo '<pre>'.print_r($items, 1).'</pre>';
endif;
