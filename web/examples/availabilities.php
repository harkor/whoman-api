<?php

// Get List of Estate Display Status
$whomanEstateAvailabilities = new Whoman\EstateAvailabilities($whomanClient);
$items = $whomanEstateAvailabilities->get();

if($isCLI):
  print_r($items);
else:
  echo '<pre>'.print_r($items, 1).'</pre>';
endif;
