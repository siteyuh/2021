    <aside id="cat">
<?php foreach($rows4 as $row4) { ?>
      <div class="catmem">
        <a href="/?catid=<?=$row4['categoryid']?>"><div class="imgcont"><img src="<?=$row4['catphotopath']?>" alt="" class="catphoto"></div></a>
        <p class="cattitle"><a href="/?catid=<?=$row4['categoryid']?>"><?=$row4['jname']?></a></p>
        <p class="catdescri"><?=$row4['jdescribe']?></p>
      </div>
<?php } ?>
    </aside>
