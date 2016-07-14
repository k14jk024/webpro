<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
if(isset($_SESSION['uname'])){ // 認証済みのユーザ名
  echo '<h2>コース希望登録</h2>';
  $uid = $_SESSION['uid'];
}else { // その以外は
  die('エラー：この機能を利用する権限がありません');
}
$courses = array(
  1=>'情報技術応用コース',
  2=>'情報科学総合コース'
);
//変数の初期化
$cid = 1;         //希望のコースID;
$act = 'insert';  //初回登録?（insert: 初回登録; update: 再登録）;

// ログイン中のユーザ($uid)の希望状況を検索する
$sql = "SELECT * FROM tb_entry WHERE uid='$uid'";
$rs = mysql_query($sql, $conn);
if (!$rs) {
  die ('エラー: ' . mysql_error());
}
$row = mysql_fetch_array($rs) ;
if ($row) {
  $cid = $row['cid']; // 現在登録しているコースのID
  $act = 'update';    // すでに登録したため「再登録」とする
  $wishtext = $row['wishtext'];
}
echo '<form action="cs_wish_save.php" method="post">';
echo '<input type="hidden" name="act" value="'.  $act .'">'; //非表示送信
foreach ($courses as $id => $name ){
  if ($id == $cid){  //登録状況を反映したラジオボタンを作成
    echo "<input type=\"radio\" name=\"cid\" value=\"$id\" checked>",$name;
  }else{
    echo "<input type=\"radio\" name=\"cid\" value=\"$id\">",$name;
  }
}
echo'<div class="form-group">';
echo    '<br><font>自己アピール文:</font><br>';
if($row['wishtext']){
	echo '<textarea name="wishtext" cols=60 rows=6 class="form-control">'.$wishtext.'</textarea>';
}else{
	echo '<textarea name="wishtext" cols=60 rows=6 class="form-control"placeholder="自己アピール文を入力しださい"></textarea>';
}

echo    '<br><input button class="btn btn-default"type="submit" value="送信"/>';
echo '</div>';
echo '</form>';
echo '</form>';

include('page_footer.php');//画面出力終了
?>
