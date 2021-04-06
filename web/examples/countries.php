<?php

  // Get List of Countries
  $whomanCountries = new Whoman\Countries($whomanClient);
  $items = $whomanCountries->get();

  if($isCLI):
    print_r($items);
  else:
    echo '<pre>'.print_r($items, 1).'</pre>';
  endif;
