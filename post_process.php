<?php

session_start();

if(!isset($SESSION_['変数名'])) {
$SESSION_['変数名'] = 0;
} else {
$SESSION_['変数名']++;
}

include('function.php');

// 入力チェック
if (
    !isset($_POST['area']) || $_POST['area']=='' ||
    !isset($_POST['rent']) || $_POST['rent']==''||
    !isset($_POST['date']) || $_POST['date']==''||
    !isset($_POST['description']) || $_POST['description']==''
    // !isset($_POST['upfile1']) || $_POST['upfile1']==''||
    // !isset($_POST['upfile2']) || $_POST['upfile2']==''
) {
    exit('ParamError');
}

//POSTデータ取得
$area = $_POST['area'];
$rent = $_POST['rent'];
$date = $_POST['date'];
$description = $_POST['description'];

// 画像１枚目
if (isset($_FILES['upfile1']) && $_FILES['upfile1']['error']==0) {
    // ファイルをアップロードしたときの処理
    // ①送信ファイルの情報取得
    $uploadedFileName = $_FILES['upfile1']['name'];
    $tmpPathName= $_FILES['upfile1']['tmp_name'];
    $fileDirectoryPath = 'upload/';

     // ②File名の準備 
$extension = pathinfo('$uploadedFileName', 'PATHINFO_EXTENSION');
$uniqueName=date('YmdHis').md5(session_id()).'.'.$extension;
$fileNameToSave = $fileDirectoryPath.$uniqueName;

if(is_uploaded_file($tmpPathName)){
if(move_uploaded_file($tmpPathName,$fileNameToSave)){
chmod($fileNameToSave, 0644);
$img = '<img src="'.$fileNameToSave.' ">';
}else{
    $img = '保存に失敗しました。';
}

}


} else {
    // ファイルをアップしていないときの処理
    $img = '画像が送信されていません';
}

// // 画像2枚目
// if (isset($_FILES['upfile2']) && $_FILES['upfile2']['error'] ==0) {
//     // ファイルをアップロードしたときの処理
//     // ①送信ファイルの情報取得
//     $uploadedFileName2 = $_FILES['upfile2']['name'];
//     $tmpPathName2= $_FILES['upfile2']['tmp_name'];
//     $fileDirectoryPath2 = 'upload/';

//      // ②File名の準備 
// $extension2 = pathinfo('$uploadedFileName2', 'PATHINFO_EXTENSION');
// $uniqueName2=date('YmdHis').md5(session_id()).'.'.$extension2;
// $fileNameToSave2 = $fileDirectoryPath2.$uniqueName2;

// if(is_uploaded_file($tmpPathName2)){
// if(move_uploaded_file($tmpPathName2,$fileNameToSave2)){
// chmod($fileNameToSave2, 0644);
// $img2 = '<img src="'.$fileNameToSave2.'">';
// }else{
//     $img2 = '保存に失敗しました。';
// }

// }

// } else {
//     // ファイルをアップしていないときの処理
//     $img2 = '';
// }

// // 画像3枚目
// if (isset($_FILES['upfile3']) && $_FILES['upfile3']['error'] ==0) {
//     // ファイルをアップロードしたときの処理
//     // ①送信ファイルの情報取得
//     $uploadedFileName3 = $_FILES['upfile3']['name'];
//     $tmpPathName3= $_FILES['upfile3']['tmp_name'];
//     $fileDirectoryPath3 = 'upload/';

//      // ②File名の準備 
// $extension3 = pathinfo('$uploadedFileName3', 'PATHINFO_EXTENSION');
// $uniqueName3=date('YmdHis').md5(session_id()).'.'.$extension3;
// $fileNameToSave3 = $fileDirectoryPath3.$uniqueName3;

// if(is_uploaded_file($tmpPathName3)){
// if(move_uploaded_file($tmpPathName3,$fileNameToSave3)){
// chmod($fileNameToSave3, 0644);
// $img3 = '<img src="'.$fileNameToSave3.'">';
// }else{
//     $img3 = '保存に失敗しました。';
// }

// }


// } else {
//     // ファイルをアップしていないときの処理
//     $img3 = '';
// }

// // 画像4枚目
// if (isset($_FILES['upfile4']) && $_FILES['upfile4']['error'] ==0) {
//     // ファイルをアップロードしたときの処理
//     // ①送信ファイルの情報取得
//     $uploadedFileName4 = $_FILES['upfile4']['name'];
//     $tmpPathName4= $_FILES['upfile4']['tmp_name'];
//     $fileDirectoryPath4 = 'upload/';

//      // ②File名の準備 
// $extension4 = pathinfo('$uploadedFileName4', 'PATHINFO_EXTENSION');
// $uniqueName4=date('YmdHis').md5(session_id()).'.'.$extension4;
// $fileNameToSave4 = $fileDirectoryPath4.$uniqueName4;

// if(is_uploaded_file($tmpPathName4)){
// if(move_uploaded_file($tmpPathName4,$fileNameToSave4)){
// chmod($fileNameToSave4, 0644);
// $img4 = '<img src="'.$fileNameToSave4.'height="30%" width="30%"">';
// }else{
//     $img4 = '保存に失敗しました。';
// }

// }


// } else {
//     // ファイルをアップしていないときの処理
//     $img4 = '';
// }




//DB接続
$pdo = db_conn();

//データ登録SQL作成
$sql ='INSERT INTO infowners01 (id, area, rent, date, description, upfile1, upfile2, upfile3, upfile4, indate)
VALUES(NULL, :a1, :a2, :a3, :a4, :upfile1, :upfile2, :upfile3, :upfile4, sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $area, PDO::PARAM_STR);
$stmt->bindValue(':a2', $rent, PDO::PARAM_INT);
$stmt->bindValue(':a3', $date, PDO::PARAM_STR);
$stmt->bindValue(':a4', $description, PDO::PARAM_STR);
$stmt->bindValue(':upfile1', $fileNameToSave, PDO::PARAM_STR);
$stmt->bindValue(':upfile2', $fileNameToSave, PDO::PARAM_STR);
$stmt->bindValue(':upfile3', $fileNameToSave, PDO::PARAM_STR);
$stmt->bindValue(':upfile4', $fileNameToSave, PDO::PARAM_STR);
$status = $stmt->execute();

//データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    //index.phpへリダイレクト
    // header('Location: index.php');
$area_kakunin = $area;
$rent_kakunin = $rent;
$date_kakunin = $date;
$description_kakunin = $description;
// print ("<h2>内容の確認</h2><br>");
//     print ("エリア：$area<br>");
//     print ("レント：$rent.'ドル'.<br>");
//     print ("入居可能日：$date<br>");
//     print ("詳細説明：$description.'ドル'.<br>");


}


?>

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

.btn-gradient-radius2 {
  display: inline-block;
  padding: 7px 20px;
  border-radius: 25px;
  text-decoration: none;
  color: #FFF;
  background-image: linear-gradient(45deg, #709dff 0%, #91fdb7 100%);
  transition: .4s;
  margin-left:240px;
}

.btn-gradient-radius2:hover {
  background-image: linear-gradient(45deg, #709dff 0%, #91fdb7 70%);
}

.img{
    width:30%;
height: 30%;
}
</style>
</head>
<body>
<div id="logoarea">
<img src="img/logo.png" height="30%" width="30%" > 
</div> 

<div id="content">
<h2>内容の確認</h2>
<br>
エリア　　　　　　　　　　  <?php echo $area_kakunin; ?>

<p>レント/週　　　　　　　　　<?php echo $rent_kakunin; ?>ドル</p>
<p>入居可能日　　　　　　　　 <?php echo $date_kakunin; ?></p> 
<p>詳細説明　　　　　　　　　 <?php echo $description_kakunin; ?></p> 
<div class="img"><?=$img?></div>



<br>
<p>　　　　　　　　　　　　　　　　<a href="postdone.php"><button class="btn-gradient-radius">投稿する</button></a></p>
<p><button class="btn-gradient-radius2" onclick=history.back()>内容を修正する</button></p>

    </div>
</body>

</html>