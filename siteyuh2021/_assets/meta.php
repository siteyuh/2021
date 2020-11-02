<?php

if (!$_SERVER['QUERY_STRING']) { // ------------------------------------------------------------------------- URL引数なし
?>
  <meta name="description" content="yuhの写真集のサイト。自己紹介もしています。">
  
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@siteyuh">
  <meta property="og:url" content="https://siteyuh.com/">
  <meta property="og:title" content="yuhのフォトギャラリー">
  <meta property="og:description" content="yuhの写真集のサイト。自己紹介もしています。">
  <meta property="og:image" content="https://2021.siteyuh.com/_assets/me@2x.jpg">
  <meta property="og:type" content="website">
  
<?php }
if (isset($_GET['eventid'])) { // --------------------------------------------------------------------------- 選択したイベント
  foreach($rows6 as $row6) {
?>
    <meta name="description" content="<?=$row6['description']?>">
  <!--  <meta name="twitter:image" content="<?=$row6['carousel']?>">-->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@siteyuh">
    <meta property="og:url" content="https://siteyuh.com/?eventid=<?=$_GET['eventid']?>">
    <meta property="og:title" content="yuhのフォトギャラリー: <?=$row6['eventname']?>">
    <meta property="og:description" content="<?=$row6['description']?>">
    <meta property="og:image" content="<?=$row6['carousel']?>">
    <meta property="og:type" content="artcle">
<?php
  }
}
if (isset($_GET['catid'])) { // --------------------------------------------------------------------------------- カテゴリー抽出
  foreach($rows8 as $row8) {
?>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@siteyuh">
    <meta property="og:url" content="https://siteyuh.com/?catid=<?=$_GET['catid']?>">
    <meta property="og:title" content="yuhのフォトギャラリー: <?=$row8['jname']?>">
    <meta property="og:description" content="<?=$row8['jdescribe']?>">
    <meta property="og:image" content="https://2021.siteyuh.com/_assets/me@2x.jpg">
    <meta property="og:type" content="article">
<?php
  }
} ?>
