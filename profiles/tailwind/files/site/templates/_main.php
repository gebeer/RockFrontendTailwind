<?php

namespace ProcessWire;

/** @var RockFrontend $rockfrontend */
$rockfrontend->styles()
  // you can include any custom css files as you wish
  ->add('/site/templates/assets/main.css');
$rockfrontend->scripts()
  ->add('/site/templates/assets/main.js');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?= $rockfrontend->seo() ?>
</head>

<body>
  <?= $rockfrontend->renderLayout($page) ?>
  <?php
  // this is just an example of how you could add another scripts section
  // you can safely remove this call if you don't want to add any scripts
  // at the bottom of your page body
  // echo $rockfrontend->scripts('body')
  //   ->add('site/templates/bundle/main.js')
  //   ->render();
  ?>
</body>

</html>