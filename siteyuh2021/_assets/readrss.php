<?php
$rss = simplexml_load_file('http://siteyuhinfo.blogspot.com/feeds/posts/default?alt=rss&redirect=false&max-results=9');
echo '<dl>'.PHP_EOL;
foreach ($rss -> channel -> item as $item) {
  $date = mb_substr($item -> pubDate, 5, 11);
//  var_dump($date);
  if ($item -> title == "") {
    $title = "NonTitle";
  } else {
    $title = $item -> title;
  }

  $tnum = mb_strlen($item -> title, "UTF-8");
//  $tnum = 44 - $tnum;

  $htmlt = $item -> description;
  $txt = mb_substr($htmlt, 0, 1000, "UTF-8");
  if ($txt!="") {
//    $txt = " - ". $txt ."...";
  }

  echo '<dt>'.$date.'</dt>'.PHP_EOL.'<dd>'.$txt.'</dd>'.PHP_EOL;
/*
  $date = split(" ", $date);
  $date = $date[1].".".$date[0].".".$date[2];

*/
}
echo '</dl>';