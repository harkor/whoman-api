<?php

// Get List of Estate Display Status
$whomanDisplayStatus = new Whoman\EstateDisplayStatus($whomanClient);
$items = $whomanDisplayStatus->get();

if($isCLI):
  print_r($items);
else:
  echo '<pre>'.print_r($items, 1).'</pre>';
endif;
