<p>
  メールフォームを作成中です。<br>
  以下のソーシャルメディアにアカウントをお持ちでしたら、メッセージを送信できます。
</p>
<ul>
  <li><a href="https://twitter.com/siteyuh" target="_blank">Twitter</a></li>
  <li><a href="https://www.instagram.com/siteyuh03/" target="_blank">Instagram</a></li>
</ul>
<form action="_assets/mail.php" method="post" id="mesform">
  <div id="name">
    <label for="name">お名前:</label>
    <input type="text" name="name" class="name" required>
  </div>
  <div id="from"> 
    <label for="from">eメール:</label>
    <input type="email" name="from" class="from" required>
  </div>
  <div id="comm">
    <label for="comm">メッセージ:</label>
    <textarea name="comm" id="mesbox" cols="30" rows="8" class="comm" required></textarea>
  </div>
  <div id="pw">
    <label for="pw">合言葉:（合言葉は“な”です）</label>
    <input name="pw" type="text" placeholder="なと入力してください" class="pw" id="pwbox">
  </div>
  <p>確認の画面は表示しませんのでじっくり確認してからボタンを押してください。</p>
  <div class="submit">
    <button name="" type="submit" class="submitbutton">メッセージを送る</button>
  </div>
</form>
