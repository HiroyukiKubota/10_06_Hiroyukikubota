<?php
$areaselect = array(
    'ニューサウスウェールズ州（NSW）',
    'クイーンズランド州（QLD）',
    'ビクトリア州（VIC）',
    '南オーストラリア州（SA）',
    'タスマニア州（TAS）',
    '西オーストラリア州（WA）'
);

include('function.php');

//DB接続
$pdo = db_conn();

//データ表示SQL作成
$sql = 'SELECT * FROM infowners01 ORDER BY indate DESC';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//データ表示
if ($status == false) {
  showSqlErrorMsg($stmt);
} else {
  $view = '';
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $view .= '<p>' .'エリア　　　　　　'. $result['area'] . '</p>';
    $view .= '<p>' . 'レント/週　　　　 '.$result['rent'] . 'ドル'.'</p>';
    $view .= '<p>' . '入居可能日　　　　'.$result['date'] . '</p>';
    $view .= '<img src="'.$result['upfile1'].'" alt="画像が表示できません" height="150px">';
    $view .= '<p class="des">' . '詳細説明<br>'.$result['description'] . '</p>';
    // imgタグで出力しよう！
  }
}
?>




<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Infowners.com</title>
    <style>

    
body {
font-family: "游ゴシック", "YuGothic", "メイリオ", meiryo, sans-serif;
/* background: #db1919; */
}

#logoarea{
    background:#db1919;
}

#contents{
        display:flex;
        
    }
#areaselect{
width:30%;
background: #fff5ee;

}
#posts{
width: 55%;
}
#register{
width: 15%;
margin-top:-60px; 
}

.btn-gradient-simple {
  display: inline-block;
  padding: 0.5em 1em;
  text-decoration: none;
  border-radius: 3px;
  font-weight: bold;
  color: #FFF;
  background-image: linear-gradient(45deg, #709dff 0%, #91fdb7 100%);
  transition: .4s;
}

.btn-gradient-simple:hover {
  background-image: linear-gradient(45deg, #709dff 50%, #b0c9ff 100%);
}

.btn-gradient-simple2 {
  display: inline-block;
  padding: 0.5em 1em;
  text-decoration: none;
  border-radius: 3px;
  font-weight: bold;
  color: #FFF;
  background-image: linear-gradient(45deg, #FFC107 0%, #ff8b5f 100%);
  transition: .4s;
}

.btn-gradient-simple2:hover {
  background-image: linear-gradient(45deg, #709dff 50%, #b0c9ff 100%);
}

.btn-gradient-simple3 {
  display: inline-block;
  padding: 0.5em 1em;
  text-decoration: none;
  border-radius: 3px;
  font-weight: bold;
  color: #FFF;
  background-image: linear-gradient(45deg, #ff8c00 0%, #ff8c00  100%);
  transition: .4s;
  margin-top:30px;
  padding: 15px 70px;
}

.btn-gradient-simple3:hover {
  background-image: linear-gradient(45deg, #709dff 50%, #b0c9ff 100%);
}

#areaselect{
    background:#f080800;
}

.des{
  padding:10pxß 60px;
}
    </style>
</head>
<body>
<div id="logoarea">
<a href="index.php" >
<img src="img/logo.png" height="30%" width="30%" >
</a>
</div>
<div id="contents">


<div id="areaselect">
<h4>エリア選択</h4>
<ul>
<?php foreach($areaselect as $area):?>
<li><?php echo $area;?></li>
<?php endforeach ?>

<!-- <li>ニューサウスウェールズ州（NSW）</li>
<li>クイーンズランド州（QLD）</li>
<li>ビクトリア州（VIC）</li>
<li>南オーストラリア州（SA）</li>
<li>タスマニア州（TAS）</li>
<li>西オーストラリア州（WA）</li> -->
</ul>
</div>


<div id="posts">
<h2>ニューサウスウェールズ州（NSW）</h2>
<h5>サバーブ選択</h5>
<ul>
<li>CBD</li>
<li>North Sydney</li>
<li>West Sydney</li>
<li>South Sydney</li>
</ul>
<?= $view ?>


</div>

<div id="register">
<a href="#" class="btn-gradient-simple">新規登録</a>
<a href="#" class="btn-gradient-simple2">ログイン</a>
<a href="newpost.php" class="btn-gradient-simple3">投稿する</a>

</div>
</div>
</body>
</html>