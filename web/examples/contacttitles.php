<?php

// Get List of Estate Display Status
$whomaContactTitles = new Whoman\ContactTitles($whomanClient);
$items = $whomaContactTitles->get();

if($isCLI):
  print_r($items);
else:
  echo '<pre>'.print_r($items, 1).'</pre>';
endif;
