<?php
$result = file('https://docs.google.com/spreadsheets/d/e/2PACX-1vTKfVLlme4Bx3K6eNLEqcX-ahJwvbIdOFKJPH_q5oyAEFq3O10TCqpFKIjVcwbxPa1qEGyr378DBhil/pub?output=csv');

for ( $i = 1; $i < sizeof( $result ); $i++ ) {
  list($title, $contents) = explode( ",", $result[ $i ] );

  echo '<h2 class="title">'.$title.'</h2>';
  echo '<ul class="contents">';
  $aryCon = str_replace("\r\n", "", $contents);
  $cell = explode(" ", $aryCon);
//  var_dump($cell);
//  var_dump($aryCon);
  for ($j = 0; $j < sizeof($cell); $j++) {
    $n = 0;
    $ce = explode(" ", $cell[$j]);
//    var_dump($ce[$n]);
    echo '<li>'.$ce[$n].'</li>';
    $n++;
  }
  echo '</ul>';
}
