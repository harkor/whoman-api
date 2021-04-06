<?php

require __DIR__.'/../vendor/autoload.php';

$isCLI = !http_response_code();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();
$dotenv->required(['HOST', 'SBSID']);

$whomanClient = new Whoman\Client();
$whomanClient->setHost($_SERVER['HOST']);
$whomanClient->setSbsid($_SERVER['SBSID']);

if($_SERVER['LANGUAGE']):
  $whomanClient->setLanguage($_SERVER['LANGUAGE']);
endif;

if(isset($argv[1])):

  $exampleFile = __DIR__.'/examples/'.$argv[1].'.php';

  if(!file_exists($exampleFile)):
    echo 'Example file not found'."\n";
    exit;
  endif;

  include($exampleFile);
  exit;

endif;

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Whoman API Wrapper !</title>
  </head>
  <body>

    <div class="container">

    <h1>Whoman API Wrapper</h1>

    <?php
      if(isset($_GET['example'])):

        $exampleFile = __DIR__.'/examples/'.$_GET['example'].'.php';

        if(!file_exists($exampleFile)):
          echo '<div class="alert alert-info">Example file not found</div>';
        else:
          ?> <p><button class="btn btn-primary" onclick="window.history.back()">Back</button></p> <?php
          include($exampleFile);
        endif;


      else:
        $examples = scandir(__DIR__.'/examples/');
        ?>
        
        <div class="row">
          <div class="col-lg-4">
            <h2>Available examples</h2>
            <div class="list-group">
              <?php foreach($examples as $example):
                if($example == '.' || $example == '..'):
                  continue;
                endif;
                $example = str_replace('.php', '', $example);
              ?>
                <a class="list-group-item list-group-item-action" href="/?example=<?= $example ?>"><?= ucfirst($example) ?></a>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </body>
</html>
