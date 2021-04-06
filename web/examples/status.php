<?php

// Get List of Estate Display Status
$whomanEstateStatus = new Whoman\EstateStatus($whomanClient);
$items = $whomanEstateStatus->get();

if($isCLI):
  print_r($items);
else:
  echo '<pre>'.print_r($items, 1).'</pre>';
endif;
