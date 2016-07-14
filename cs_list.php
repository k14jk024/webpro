<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
if ( isset($_SESSION['urole']) and $_SESSION['urole']==2 ) {
    //教員としてログインしているなら
    $uid   = $_SESSION['uid'];
    $uname = $_SESSION['uname']; // 認証済みのユーザ名
}else { // その以外は
    die('エラー：この機能を利用する権限がありません');
}
echo "<h2>希望一覧</h2>";
$sql = "SELECT * FROM tb_user NATURAL JOIN tb_entry NATURAL JOIN tb_course";//検索条件を適用したSQL文を作成
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());

$row = mysql_fetch_array($rs) ;
echo '<table border=1>';
echo '<tr><th>ユーザID</th><th>氏名</th><th>希望コース</th><th>自己PR</th></tr>';
while ($row) {
    echo '<tr>';
    echo '<td>' . $row['uid'] . '</td>';
    echo '<td>' . $row['uname']. '</td>';
    echo '<td>' . $row['cname'] . '</td>';
    echo '<td>' . $row['wishtext'] . '</td>';
    echo '</tr>';
    $row = mysql_fetch_array($rs) ;
}
echo '</table>';
echo '<a href="index.php">戻る</a>';
include('page_footer.php');  //画面出力終了
?>