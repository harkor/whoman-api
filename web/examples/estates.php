<?php

  // Get List of Estates
  $whomanEstates = new Whoman\Estates($whomanClient);
  $items = $whomanEstates->get();

  if($isCLI):
    print_r($items);
  else:
    echo '<pre>'.print_r($items, 1).'</pre>';
  endif;
