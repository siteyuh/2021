<?php
require_once '_assets/dbselect.php';
/*
var_dump($wphoto);
var_dump($listall);
var_dump($cat);
var_dump($selectevent);
var_dump($selectcat);
*/
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
<?php if (isset($_GET['eventid'])) {
  foreach($rows6 as $row6) {
    $title = 'yuhのプロフィールサイト: '.$row6['eventname'];
  }
} elseif (isset($_GET['catid'])) {
  foreach($rows5 as $row5) {
    $title = 'yuhのプロフィールサイト: '.$row5['cat'];
  }
} else {
  $title = 'yuhのプロフィールサイト';
} ?>
  <title><?=$title?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include_once '_assets/meta.php'; ?>
  <?php include_once '_assets/link.html'; ?>

  <meta name="theme-color" content="#fafafa">
</head>

<body>
  <main>
    <?php include_once '_assets/head.html'; ?>
    <?php if (!$_SERVER['QUERY_STRING']) { // ------------------------------------------------------------------------- URL引数なし?>

    <section id="gallery">
      <div class="carousel">
        <?php foreach($rows1 as $row1) { //var_dump($row1['eventname']); ?>
        <div class="slick-slide">
          <a href="/?eventid=<?=$row1['eventid']?>"><img src="<?=$row1['carousel']?>" alt="<?=$row1['eventname']?>"></a>
          <h2 class="title"><?=$row1['eventname']?></h2>
          <!--<div class="descr"><?=strip_tags($row1['description'])?></div>-->
        </div>
        <?php } ?>
      </div>
      <?php include '_assets/slickarrow.html'; ?>
    </section>
    <aside id="announce">
      <p class="opencat">カテゴリー別に表示することができるようになりました</p>
    </aside>
    <?php include '_assets/categories.php'; ?>
    <section id="eventlist">
      <div class="wrapper">
        <h2 class="title">全てのカテゴリのアルバム</h2>
        <div class="wrapper">
          <ul>
            <?php foreach($rows2 as $row2) { ?>
            <li><a href="/?eventid=<?=$row2['eventid']?>"><?=$row2['eventname']?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </section>
    <?php }?>
    <?php if (isset($_GET['eventid'])) { // ---------------------------------------------------------------------------- 選択したイベント?>
    <?php //echo var_dump($event); ?>
    <section id="photomember">
      <div class="wrapper">
        <?php foreach($rows6 as $row6) { ?>
        <h2 class="eventname"><?=$row6['eventname']?></h2>
        <div class="small">category: <a href="/?catid=<?=$row6['categoryid']?>"><?=$row6['category']?></a></div>
        <p class="description"><?=$row6['description']?></p>

        <ul class="thumbnails">
          <?php foreach($rows3 as $row3) { ?>
          <li>
            <a href="<?=$row3['photomember']?>s800" data-lightbox="<?=$row3['eventname']?>" data-title="<?=$row3['phdesc']?>">
              <img src="<?=$row3['photomember']?>s300-c" alt="<?=$row3['eventname']?>">
            </a>
          </li>
          <?php } ?>
          <?php } ?>
        </ul>
      </div>
      <!--
      <section id="socials">
        <div class="wrapper">
          <p>お友だちにシェアしてね</p>
          <div id="share"></div>
        </div>
      </section>
-->
    </section>
    <?php }?>

<?php if (isset($_GET['catid'])) { // --------------------------------------------------------------------------------- カテゴリー抽出?>
    <section id="gallery">
      <div class="carousel">
        <?php foreach($rows7 as $row7) { //var_dump($row1['eventname']); ?>
        <div class="slick-slide">
          <a href="/?eventid=<?=$row7['eventid']?>"><img src="<?=$row7['carousel']?>" alt="<?=$row7['eventname']?>"></a>
          <h2 class="title"><?=$row7['eventname']?></h2>
          <!--<div class="descr"><?=strip_tags($row7['description'])?></div>-->
        </div>
        <?php } ?>
      </div>
      <?php include '_assets/slickarrow.html'; ?>
    </section>
    <aside id="announce">
      <p><span class="opencat">カテゴリー</span> &gt; <?=$row7['cat']?></p>
    </aside>
    <?php include '_assets/categories.php'; ?>
    <section id="catevents">
      <div class="wrapper">
        <h2 class="title"><?=$row7['cat']?>のアルバム</h2>
      </div>
      <div class="wrapper">
        <ul>
          <?php foreach($rows5 as $row5) { ?>
          <li><a href="/?eventid=<?=$row5['eventid']?>"><?=$row5['eventname']?></a></li>
          <?php } ?>
        </ul>
      </div>
    </section>
    <?php }?>
<?php if ($_GET['sent']) { // ---------------------------------------------------------------------------------------- メールを送信したとき
  if ($_GET['sent'] == 2) {
    $msg = '合言葉が間違っているか、メールアドレスの未記入です。そのためメッセージが送信できません。';
  }
  if ($_GET['sent'] == 1) {
    $msg = 'メールを送信できました。なるべく早く返信しますので、siteyuh.com からメールを受け取れるようにしておいてください。';
  }

?>
    <section id="sent">
      <div class="wrapper">
       <h2>メッセージありがとうございます</h2>
        <p><?=$msg?></p>
        <p class="centered"><a href="/">ホームページに戻る</a></p>
      </div>
    </section>
<?php } ?>

    <footer>
      <div class="wrapper">
        <small>copyright 2021 yuh</small>
        <ul class="sm">
          <li><a href="https://join.slack.com/t/siteyuhchat/shared_invite/zt-epqtt1ww-_qD1NLw5ZvwY_3Mjc0auZQ"><img src="/_assets/slack.svg" alt="slack"></a></li>
          <li><a href="https://twitter.com/intent/follow?original_referer=https%3A%2F%2Fsiteyuh.com%2F&ref_src=twsrc%5Etfw&region=follow_link&screen_name=siteyuh&tw_p=followbutton"><img src="/_assets/twitter.svg" alt="twitter"></a></li>
          <li><a href="https://www.instagram.com/siteyuh03/"><img src="/_assets/instagram.svg" alt="instagram"></a></li>
        </ul>
      </div>
    </footer>
<!-- オーバーレイメニュー -->
    <aside id="menu">
      <div class="closebtn"></div>
      <p class="title">カテゴリでフィルタ</p>
      <ul class="links">
        <?php foreach($rows4 as $row4) { ?>
        <li class="blocked"><a href="/?catid=<?=$row4['categoryid']?>"><?=$row4['jname']?></a></li>
        <?php } ?>
        <li class="inlined">
          <ul class="i-contents">
            <li><picture><source srcset="/_assets/profiledark.svg" media="(prefers-color-scheme: dark)">
              <img src="/_assets/profile.svg" alt="profile" width="36" height="36" class="profopen"></picture></li>
            <li><picture><source srcset="/_assets/infodark.svg" media="(prefers-color-scheme: dark)">
              <img src="/_assets/info.svg" alt="information" width="40" height="40" class="infoopen"></picture></li>
            <li><picture><source srcset="/_assets/maildark.svg" media="(prefers-color-scheme: dark)">
              <img src="/_assets/mail.svg" alt="contact" width="43" height="36" class="mailopen"></picture></li>
          </ul>
        </li>
      </ul>
    </aside>
<!-- プロフィールをオーバーレイ -->
    <aside id="profile">
      <div class="closedlg"></div>
      <?php include_once '_assets/csvread.php';?>
    </aside>
<!-- インフォメーションオーバーレイ -->
    <aside id="information">
      <div class="closedlg"></div>
      <?php include_once '_assets/readrss.php'; ?>
    </aside>
<!-- メールフォームオーバーレイ -->
    <aside id="mailform">
      <div class="closedlg"></div>
      <?php include_once '_assets/mailform.php'; ?>
    </aside>

<!-- -->
  </main>
<!-- scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" 
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
    integrity="sha256-NXRS8qVcmZ3dOv3LziwznUHPegFhPZ1F/4inU7uC8h0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.1/jquery-migrate.js" 
    integrity="sha256-VvnF+Zgpd00LL73P2XULYXEn6ROvoFaa/vbfoiFlZZ4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js" 
    integrity="sha256-DiHJ7hbvMejsMyP76bpVWacb5HSHQ2sQlrJV8n7KEvA=" crossorigin="anonymous"></script>
  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function() {
      ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-73445-3', 'auto');
    ga('set', 'anonymizeIp', true);
    ga('set', 'transport', 'beacon');
    ga('send', 'pageview')

  </script>
</body>

</html>
