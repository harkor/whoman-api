<?php

  // Get List of Estates
  $whomanEstates = new Whoman\Estates($whomanClient);
  $estates = $whomanEstates->get();

  // Get Details of an Estate
  $whomanEstate = new Whoman\Estate($whomanClient);
  $whomanEstate->setEstateid($estates[1]->EstateID);
  $estate = $whomanEstate->get();

  if($isCLI):
    print_r($estate);
  else:
    echo '<pre>'.print_r($estate, 1).'</pre>';
  endif;
