<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新規投稿</title>
    <style>

    
body {
font-family: "游ゴシック", "YuGothic", "メイリオ", meiryo, sans-serif;
/* background: #db1919; */


}

#logoarea{
    background:#db1919;
}

#content{
    margin: 80px auto;
    width:600px;
    background:#fffacd;
    padding: 40px;
}

.btn-gradient-radius {
  display: inline-block;
  padding: 7px 20px;
  border-radius: 25px;
  text-decoration: none;
  color: #FFF;
  background-image: linear-gradient(45deg, #FFC107 0%, #ff8b5f 100%);
  transition: .4s;
}

.btn-gradient-radius:hover {
  background-image: linear-gradient(45deg, #FFC107 0%, #f76a35 100%);
}
</style>
</head>
<body>
<div id="logoarea">
<img src="img/logo.png" height="30%" width="30%" > 
</div> 

<div id="content">
<h2>お部屋情報を投稿</h2>
<h5>※注意事項</h5>
<p>投稿前にオーナー様と賃借条件に変更がないか最新情報を確認してください。</p>
<form action="post_process.php" method="post" enctype="multipart/form-data">
<br>
エリア　　　　　　　　　　  <select name="area">
<option value="">選択してください</option>
<option value="ニューサウスウェールズ州（NSW）">ニューサウスウェールズ州（NSW）</option>
<option value="クイーンズランド州（QLD）">クイーンズランド州（QLD）</option>
<option value="ビクトリア州（VIC）">ビクトリア州（VIC）</option>
<option value="南オーストラリア州（SA）">南オーストラリア州（SA）</option>
<option value="タスマニア州（TAS）">タスマニア州（TAS）</option>
<option value="西オーストラリア州（WA）">西オーストラリア州（WA）</option>
</select>
<p>レント/週　　　　　　　　　<input type="text" name="rent">ドル</p>
<p>入居可能日　　　　　　　　 <input type="date" name="date"></p> 
<p>詳細説明　　　　　　　　　 <textarea name="description" id="" cols="30" rows="10"></textarea></p>
<br>
<p>画像  </p>
<input type="file" name="upfile1" accept="image/*" capture="camera">
<!-- <input type="file" name="upfile2" accept="image/*" capture="camera">
<input type="file" name="upfile3" accept="image/*" capture="camera">
<input type="file" name="upfile4" accept="image/*" capture="camera">
<br> -->
<br>
<br>
<br>
<p>　　　　　　　　　　　　　　　<input type="submit" value="投稿内容を確認する" class="btn-gradient-radius"></p>

</form>
    </div>
</body>
</html>