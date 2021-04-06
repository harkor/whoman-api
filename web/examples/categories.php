<?php

// Get List of Estate Categories
$whomanCategories = new Whoman\EstateCategories($whomanClient);
$items = $whomanCategories->get();

if($isCLI):
  print_r($items);
else:
  echo '<pre>'.print_r($items, 1).'</pre>';
endif;
