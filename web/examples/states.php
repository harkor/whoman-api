<?php

// Get List of Estate States
$whomanStates = new Whoman\EstateStates($whomanClient);
$items = $whomanStates->get();

if($isCLI):
  print_r($items);
else:
  echo '<pre>'.print_r($items, 1).'</pre>';
endif;
