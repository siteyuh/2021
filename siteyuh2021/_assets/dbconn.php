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

$wphoto = 'SELECT * FROM event WHERE disp = 1 ORDER BY RAND() LIMIT 9';
$listall = 'SELECT * FROM event WHERE disp = 1 ORDER BY eventid DESC';
if (isset($_GET['eventid'])){
  $selectevent = 'SELECT eventdetail.detailid, event.eventname, event.description, eventdetail.photomember, eventdetail.phdesc FROM `eventdetail`, event WHERE event.eventid = eventdetail.eventid AND eventdetail.eventid = '.$_GET['eventid'];
}

$result1 = $mysqli -> query($wphoto);
$result2 = $mysqli -> query($listall);

if (isset($_GET['eventid'])){
  $result3 = $mysqli -> query($selectevent);
}
//クエリー失敗
/*
if(!$result) {
  echo $mysqli->error;
  exit();
}
*/

//レコード件数
$row_count1 = $result1->num_rows;
$row_count2 = $result2->num_rows;

//連想配列で取得
while($row1 = $result1->fetch_array(MYSQLI_ASSOC)){
  $rows1[] = $row1;
}

//連想配列で取得
while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
  $rows2[] = $row2;
}

//連想配列で取得
if (isset($_GET['eventid'])){
  while($row3 = $result3->fetch_array(MYSQLI_ASSOC)){
    $rows3[] = $row3;
  }
}

//結果セットを解放
$result1->free();
$result2->free();
if (isset($_GET['eventid'])){
  $result3->free();
}

// データベース切断
$mysqli->close();

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="A brief page description">
        <meta name="keywords" content="html,cheatsheet" />
        <title>Title</title>
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link type="text/css" rel="stylesheet" href="./styles.css">
        <script type="text/javascript" src="./index.js" defer></script>
    </head>
    <body>
        <header>
            <div id="logo">HTML</div>
            <nav>  
                <ul>
                    <li><a href="/">Home</a>
                    <li><a href="/link">Page</a>
                </ul>
            </nav>
        </header>
        <main role="main">
            <article>
                <h2>Title 1</h2>
                <p>Content 1</p>
            </article>
            <article>
                <h2>Title 2</h2>
                <p>Content 2</p>
            </article>
        </main>
        <section>
            A group of related content
        </section>
        <aside>
            Sidebar
        </aside>
        <footer>
            <p>&copy; 2019</p>
            <address>
                Contact <a href="mailto:example@mail.com">me</a>.
            </address>
        </footer>
    </body>
</html>
