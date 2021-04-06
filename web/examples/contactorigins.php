<?php

  // Get List of Offices
  $whomanOffices = new Whoman\Offices($whomanClient);
  $offices = $whomanOffices->get();

  $whomanContactOrigins = new Whoman\ContactOrigins($whomanClient);
  $whomanContactOrigins->setOfficeid($offices[0]->OfficeId);
  $items = $whomanContactOrigins->get();


  if($isCLI):
    print_r($items);
  else:
    echo '<pre>'.print_r($items, 1).'</pre>';
  endif;
