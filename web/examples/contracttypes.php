<?php

// Get List of Estate Display Status
$whomaContractTypes = new Whoman\ContractTypes($whomanClient);
$items = $whomaContractTypes->get();

if($isCLI):
  print_r($items);
else:
  echo '<pre>'.print_r($items, 1).'</pre>';
endif;
