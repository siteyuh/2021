<?php

//データベース接続
$server = "localhost";
$userName = "siteyuh";
$password = "42b05";
$dbName = "siteyuh";

$mysqli = new mysqli($server, $userName, $password,$dbName);

if ($mysqli->connect_error){
  echo $mysqli->connect_error;
  exit();
} else {
  $mysqli->set_charset("utf-8");
}
// カルーセルに使うイベントの抽出
$wphoto = 'SELECT * FROM event WHERE disp = 1 ORDER BY RAND() LIMIT 10';

// イベント全て
$listall = 'SELECT * FROM event WHERE disp = 1 ORDER BY eventid DESC';

// カテゴリーの一覧
$cat = 'SELECT * FROM `category`';

// 選択したイベントの写真一覧
if (isset($_GET['eventid'])){
  $selectevent  = 'SELECT eventdetail.detailid, event.eventname, event.description, eventdetail.photomember, eventdetail.phdesc ';
  $selectevent .= 'FROM `eventdetail`, event WHERE event.eventid = eventdetail.eventid AND eventdetail.eventid = '.$_GET['eventid'];
  $event  = 'SELECT event.eventid, category.categoryid,  category.jname AS "category", event.eventname, event.description, event.carousel, event.disp ';
  $event .= 'FROM associate, event, category ';
  $event .= 'WHERE event.eventid = associate.eventid ';
  $event .= 'AND category.categoryid = associate.categoryid ';
  $event .= 'AND event.eventid = '.$_GET['eventid'];
//  $event = 'SELECT * FROM `event` WHERE eventid = '.$_GET['eventid'];
}

// 選択したカテゴリのイベント一覧
if (isset($_GET['catid'])){
  $selectcat  = 'SELECT `event`.eventid, `category`.categoryid, `category`.jname AS "cat", `event`.eventname, event.carousel, `event`.disp ';
  $selectcat .= 'FROM `associate`, `event`, `category` WHERE `event`.eventid = `associate`.eventid AND `category`.categoryid = `associate`.categoryid ';
  $selectcat .= 'AND `event`.disp = 1 AND `category`.categoryid = '.$_GET['catid'];
  $wselectcat  = 'SELECT `event`.eventid, `category`.categoryid, `category`.jname AS "cat", `event`.eventname, event.carousel, `event`.disp ';
  $wselectcat .= 'FROM `associate`, `event`, `category` WHERE `event`.eventid = `associate`.eventid AND `category`.categoryid = `associate`.categoryid ';
  $wselectcat .= 'AND `event`.disp = 1 AND `category`.categoryid = '.$_GET['catid'].' ORDER BY RAND() LIMIT 10';
}

if (isset($_GET['catid'])) {
  $category = 'SELECT * FROM `category` WHERE categoryid = '.$_GET['catid'];
}

$result1 = $mysqli -> query($wphoto);
$result2 = $mysqli -> query($listall);

if (isset($_GET['eventid'])){
  $result3 = $mysqli -> query($selectevent);
  $result6 = $mysqli -> query($event);
}

$result4 = $mysqli -> query($cat);

if (isset($_GET['catid'])){
  $result5 = $mysqli -> query($selectcat);
  $result7 = $mysqli -> query($wselectcat);
  $result8 = $mysqli -> query($category);
}
//クエリー失敗
/*
if(!$result) {
  echo $mysqli->error;
  exit();
}
*/

//レコード件数
$row_count1 = $result1 -> num_rows;
$row_count2 = $result2 -> num_rows;

//連想配列で取得
while($row1 = $result1 -> fetch_array(MYSQLI_ASSOC)){
  $rows1[] = $row1;
}

//連想配列で取得
while($row2 = $result2 -> fetch_array(MYSQLI_ASSOC)){
  $rows2[] = $row2;
}

//連想配列で取得
if (isset($_GET['eventid'])){
  while($row3 = $result3 -> fetch_array(MYSQLI_ASSOC)){
    $rows3[] = $row3;
  }
  while($row6 = $result6 -> fetch_array(MYSQLI_ASSOC)){
    $rows6[] = $row6;
  }
}

//連想配列で取得
while($row4 = $result4 -> fetch_array(MYSQLI_ASSOC)){
  $rows4[] = $row4;
}

//連想配列で取得
if (isset($_GET['catid'])){
  while($row5 = $result5 -> fetch_array(MYSQLI_ASSOC)){
    $rows5[] = $row5;
  }
  while($row7 = $result7 -> fetch_array(MYSQLI_ASSOC)){
    $rows7[] = $row7;
  }
  while($row8 = $result8 -> fetch_array(MYSQLI_ASSOC)){
    $rows8[] = $row8;
  }
}

//結果セットを解放
$result1 -> free();
$result2 -> free();
if (isset($_GET['eventid'])){
  $result3 -> free();
  $result6 -> free();
}
$result4->free();
if (isset($_GET['catid'])){
  $result5 -> free();
  $result7 -> free();
}

// データベース切断
$mysqli->close();
