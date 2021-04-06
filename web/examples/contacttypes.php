<?php

  // Get List of Offices
  $whomanOffices = new Whoman\Offices($whomanClient);
  $offices = $whomanOffices->get();

  $whomanContactTypes = new Whoman\ContactTypes($whomanClient);
  $whomanContactTypes->setOfficeid($offices[0]->OfficeId);
  $items = $whomanContactTypes->get();

  if($isCLI):
    print_r($items);
  else:
    echo '<pre>'.print_r($items, 1).'</pre>';
  endif;
