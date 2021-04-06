<?php

// Get List of Estate Display Status
$whomanBaseDocumentTypes = new Whoman\BaseDocumentTypes($whomanClient);
$items = $whomanBaseDocumentTypes->get();

if($isCLI):
  print_r($items);
else:
  echo '<pre>'.print_r($items, 1).'</pre>';
endif;
