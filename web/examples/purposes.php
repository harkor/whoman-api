<?php

// Get List of Estate States
$whomanEstatePurposes = new Whoman\EstatePurposes($whomanClient);
$items = $whomanEstatePurposes->get();

if($isCLI):
  print_r($items);
else:
  echo '<pre>'.print_r($items, 1).'</pre>';
endif;
