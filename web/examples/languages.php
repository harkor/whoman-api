<?php

  // Get List of Languages
  $whomanLanguages = new Whoman\Languages($whomanClient);
  $items = $whomanLanguages->get();

  if($isCLI):
    print_r($items);
  else:
    echo '<pre>'.print_r($items, 1).'</pre>';
  endif;
