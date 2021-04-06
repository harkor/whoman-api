<?php

  // Get List of Offices
  $whomanOffices = new Whoman\Offices($whomanClient);
  $items = $whomanOffices->get();

  if($isCLI):
    print_r($items);
  else:
    echo '<pre>'.print_r($items, 1).'</pre>';
  endif;
